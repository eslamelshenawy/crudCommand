<?php

namespace App\Console\Commands;

use App\Models\Value;
use Illuminate\Console\Command;

class valuesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add values data to the database';

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
        
        for ($i = 0; $i < 5; $i ++){
            $number1 =rand(0,100);
            $number2 =rand(0,100);
            $sum=$number1+$number2;
            $count=2;
            $average=$sum/$count;
            $area=$number1 * $number2;
            $squared=$number1*$number1 + $number2*$number2;
            
           $values= new  Value ;
           $values->average =$average;
           $values->area =$area;
           $values->squared =$squared;
           $values->save();

        }
        echo "Values data added successfully"."\n";
    }
}
