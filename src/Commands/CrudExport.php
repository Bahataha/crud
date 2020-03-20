<?php

namespace Duke\CrudGenerator\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class CrudExport extends GeneratorCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'crud:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new export class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Export';
    protected $formHeading = '';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('model') && $this->option('query')) {
            $stub = '/../stubs/export.query-model.stub';
        } elseif ($this->option('model')) {
            $stub = '/../stubs/export.model.stub';
        } elseif ($this->option('query')) {
            $stub = '/../stubs/export.query.stub';
        }

        $stub = $stub ?? '/../stubs/export.plain.stub';

        return __DIR__ . $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Exports';
    }

    /**
     * Build the class with the given name.
     * Remove the base controller import if we are already in base namespace.
     *
     * @param  string $name
     *
     * @return string
     */
    protected function parseModel($model): string
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        $model = trim(str_replace('/', '\\', $model), '\\');

        if (!Str::startsWith($model, $rootNamespace = $this->laravel->getNamespace())) {
            $model = $rootNamespace . $model;
        }

        return $model;
    }
    protected function buildModelReplacements(array $replace): array
    {
        $modelClass = $this->parseModel($this->option('model'));

        return array_merge($replace, [
            'DummyFullModelClass' => $modelClass,
            'DummyModelClass'     => class_basename($modelClass),
        ]);
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $fillable = $this->option('fillable');
        $fillable = str_replace('[', "['ID', 'created_at', 'updated_at', ", $fillable);
        $replace = [];
        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        $new =  str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );

        $new = str_replace('{{fillable}}', $fillable, $new);
        return $new;

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Generate an export for the given model.'],
            ['fillable', 'f', InputOption::VALUE_OPTIONAL, 'Generate an export for the given model.'],
            ['query', '', InputOption::VALUE_NONE, 'Generate an export for a query.'],
        ];
    }
}
