<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admins')->insert([
        //  	'name' => 'admin',
        // 	'email' => 'admin@gmail.com',
        // 	'job_title' => 'admin',
        // 	'password' => '123456',
        // 	]);

        $admin = new Admin();
        $admin->name = 'igenero';
        $admin->email = 'igenero@gmail.com';
        $admin->job_title = 'company';
        $admin->password = bcrypt('123456');
        $admin->save();

    }
}
