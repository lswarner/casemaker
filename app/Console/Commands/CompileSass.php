<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompileSass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compile:sass {env=dev}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'execute "npm run dev" to compile the SASS stylesheets';

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
        $env = $this->argument('env');

        $output= [];
        exec('npm run '.$env, $output);

        dd($output);


        if($output ){
          return $output;
        }
    }
}
