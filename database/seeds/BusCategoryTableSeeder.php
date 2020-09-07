<?php

use Illuminate\Database\Seeder;

class BusCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus_categories')->delete();
        $data = [
        	['name'=>'Hiace'],
        	['name'=>'Deluxe'],
        	['name'=>'Ac'],
        	['name'=>'Normal'],
            
        	];
        \App\Models\BusCategory::insert($data);
    }
}
