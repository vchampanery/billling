<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     * php artisan deploy migrate : only run migration, this is required for aws
     * php artisan deploy clear : only clears and generate language file
     * @var string
     */
    protected $signature = 'deploy {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all data and run migration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $is_composer = (string)$this->argument('iscomposer');//not required so commented
         $deploy_type = (string)$this->argument('type');

         echo "Deployment start:\n";
        //cache directory creation for newer version.
        $dir_name = storage_path('framework/cache/data');

        //Check if the directory with the name already exists
        if (!is_dir($dir_name)) {
            //Create directory if it does not exist
            mkdir($dir_name,0777);
            if(config("app.env") == "production"){
                chown($dir_name, "webapp");//for aws ec2
                chgrp($dir_name, "webapp");//for aws ec2
            }
            echo "storage/framework/cache/data Directory created";
        }

        /*if($is_composer) {
            //composer update
            if($is_composer == "composer") {
                echo "Deployment composer start:\n";
                $os = strtoupper(substr(PHP_OS, 0, 3));
                if ($os != "WIN") {// && env('production') || env('development')) {
                    system('php -d memory_limit=-1 /usr/local/bin/composer update');
                } else {
                    system('composer update');
                }
                system('composer dump-autoload');

                echo "Deployment composer end\n";
            } else {
                echo "Invalid options.";
            }
        } */
        if($deploy_type && $deploy_type == "migrate") {
            //run only migrations
            $this->runMigrationOnly();

        } else if($deploy_type && $deploy_type == "clear") {
            //clear cache and enerate lang file
            $this->runClearCache();

        }  else {//run all
            $this->runMigrationOnly();
            $this->runClearCache();
        }
        
        $dir_name = storage_path('fonts/');

        //Check if the directory with the name already exists
        if (!is_dir($dir_name)) {
            //Create our directory if it does not exist
            mkdir($dir_name,0777);
            if(config("app.env") == "production"){
                chown($dir_name, "webapp");//for aws ec2
                chgrp($dir_name, "webapp");//for aws ec2
            }
            echo "storage/fonts Directory created";
        }
        echo "Deployment end\n";

        die;

    }

    /* migration run
    */
    private  function runMigrationOnly() {
        $this->call('migrate', ['--force' => true]);

//        $this->call('migrate', ['--force' => true, '--database' => 'hap_monitoring', '--path' => 'database/migrations/monitoring_migration']);
    }

    /* clear cache and generate lang file
    */
    private  function runClearCache() {
        $this->call('cache:clear');

        $this->call('view:clear');

        $this->call('route:clear');

        $this->call('config:clear');

        $this->call('lang:js');
    }
}
