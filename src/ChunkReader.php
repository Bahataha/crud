<?php

namespace Duke\CrudGenerator;

use Throwable;
use Illuminate\Support\Collection;
use Duke\CrudGenerator\Jobs\ReadChunk;
use Duke\CrudGenerator\Jobs\QueueImport;
use Duke\CrudGenerator\Concerns\WithLimit;
use Duke\CrudGenerator\Concerns\WithEvents;
use Duke\CrudGenerator\Events\BeforeImport;
use Duke\CrudGenerator\Files\TemporaryFile;
use Duke\CrudGenerator\Jobs\AfterImportJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Duke\CrudGenerator\Concerns\WithProgressBar;
use Duke\CrudGenerator\Concerns\WithChunkReading;
use Duke\CrudGenerator\Imports\HeadingRowExtractor;

class ChunkReader
{
    /**
     * @param  WithChunkReading  $import
     * @param  Reader  $reader
     * @param  TemporaryFile  $temporaryFile
     *
     * @return \Illuminate\Foundation\Bus\PendingDispatch|null
     */
    public function read(WithChunkReading $import, Reader $reader, TemporaryFile $temporaryFile)
    {
        if ($import instanceof WithEvents && isset($import->registerEvents()[BeforeImport::class])) {
            $reader->beforeImport($import);
        }

        $chunkSize  = $import->chunkSize();
        $totalRows  = $reader->getTotalRows();
        $worksheets = $reader->getWorksheets($import);

        if ($import instanceof WithProgressBar) {
            $import->getConsoleOutput()->progressStart(array_sum($totalRows));
        }

        $jobs = new Collection();
        foreach ($worksheets as $name => $sheetImport) {
            $startRow         = HeadingRowExtractor::determineStartRow($sheetImport);
            $totalRows[$name] = $sheetImport instanceof WithLimit ? $sheetImport->limit() : $totalRows[$name];

            for ($currentRow = $startRow; $currentRow <= $totalRows[$name]; $currentRow += $chunkSize) {
                $jobs->push(new ReadChunk(
                    $import,
                    $reader->getPhpSpreadsheetReader(),
                    $temporaryFile,
                    $name,
                    $sheetImport,
                    $currentRow,
                    $chunkSize
                ));
            }
        }

        $jobs->push(new AfterImportJob($import, $reader));

        if ($import instanceof ShouldQueue) {
            return QueueImport::withChain($jobs->toArray())->dispatch();
        }

        $jobs->each(function ($job) {
            try {
                dispatch_now($job);
            } catch (Throwable $e) {
                if (method_exists($job, 'failed')) {
                    $job->failed($e);
                }
                throw $e;
            }
        });

        if ($import instanceof WithProgressBar) {
            $import->getConsoleOutput()->progressFinish();
        }

        unset($jobs);

        return null;
    }
}
