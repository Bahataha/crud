<?php

namespace Duke\CrudGenerator\Commands;

use Illuminate\Console\Command;

class CrudTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promo:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promo project command';


    public function handle()
    {
        $this->call('crud:generate', ['name' => 'Faq', '--fields_from_file' => 'duke/faq.json', '--view-path' => 'admin', '--controller-namespace' => 'Admin', '--route-group' => 'admin', '--form-helper' => 'html']);
        $this->call('crud:generate', ['name' => 'Checks', '--fields_from_file' => 'duke/checks.json', '--view-path' => 'admin', '--controller-namespace' => 'Admin', '--route-group' => 'admin', '--form-helper' => 'html']);
        $this->call('crud:generate', ['name' => 'Questions', '--fields_from_file' => 'duke/questions.json', '--view-path' => 'admin', '--controller-namespace' => 'Admin', '--route-group' => 'admin', '--form-helper' => 'html']);
        $this->call('crud:generate', ['name' => 'Winners', '--fields_from_file' => 'duke/winners.json', '--view-path' => 'admin', '--controller-namespace' => 'Admin', '--route-group' => 'admin', '--form-helper' => 'html']);
        $this->call('crud:controller', ['name' => 'Admin\UsersController', '--crud-name' => 'Users', '--model-name' => 'User', '--view-path' => 'admin', '--route-group' => 'admin', '--pagination' => '25', '--fields' => 'name#string;email#string']);
        $this->call('crud:export', ['name' => 'UsersExport', '--model' => 'User', '--fillable' => "['name', 'email']"]);
        $this->call('crud:import', ['name' => 'UsersImport', '--model' => 'User', '--fillable' => "['name', 'email']"]);
        $this->call('crud:view', ['name' => 'Users', '--fields' => 'name#string;email#string;type#string', '--view-path' => 'admin', '--route-group' => 'admin', '--localize' => 'no', '--pk' => 'id', '--form-helper' => 'html']);
    }
}
