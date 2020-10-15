<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Value;

class showValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show values data from the database in terminal';

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
        $values= \DB::table('values')->latest('id')->orderBy('id', 'desc')->take(5)->get();    
        echo $values ;
            
    }
}
