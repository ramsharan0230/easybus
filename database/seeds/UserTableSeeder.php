<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data=new App\User([
        	'name'=>'Easy Bus',
        	'email'=>'info@easybus.com',
            'role'=>'admin',
            'publish'=>1,
            'main'=>1,  
        	'password'=>bcrypt('secret'),
        	]);
        $data->save();
    }
}
