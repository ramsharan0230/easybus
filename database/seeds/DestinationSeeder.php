<?php

use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinations')->delete();
        $data = [
        	['name'=>'kathmandu'],
        	['name'=>'Pokhara'],
        	['name'=>'Dharan'],
        	['name'=>'Biratnagar'],
            
        	];
        \App\Models\Destination::insert($data);
    }
}
