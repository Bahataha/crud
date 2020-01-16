<?php

namespace Duke\CrudGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ImportMakeCommand extends GeneratorCommand
{
    use WithModelStub;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new import class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Import';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('model')) {
            $stub = '/../stubs/import.model.stub';
        }

        $stub = $stub ?? '/../stubs/import.collection.stub';

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
        return $rootNamespace . '\Imports';
    }

    /**
     * Build the class with the given name.
     * Remove the base controller import if we are already in base namespace.
     *
     * @param  string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $fillable = str_replace(']', '', str_replace('[', '', $this->option('fillable')));
        $replace = [];
        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        $fillable = explode(', ', $fillable);
        foreach ($fillable as $id => $fill){
            $fillable[$id] = $fill . ' => row['. $id .'],';
        }
        $fillable = implode('\n', $fillable);
        $new = str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
        $new = str_replace('{{fillable}}', $fillable, $new);
        dd($new);
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
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Generate an import for the given model.'],
            ['fillable', '', InputOption::VALUE_OPTIONAL, 'Generate an import for the given model.'],
            ['query', '', InputOption::VALUE_NONE, 'Generate an import for a query.'],
        ];
    }
}
