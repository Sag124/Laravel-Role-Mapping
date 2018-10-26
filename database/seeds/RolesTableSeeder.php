<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'user';
        // $role_user->description = 'A normal user';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        // $role_admin->description = 'Admin';
        $role_admin->save();

        $role_author = new Role();
        $role_author->name = 'author';
        // $role_author->description = 'An Author';
        $role_author->save(); 
    }
}
