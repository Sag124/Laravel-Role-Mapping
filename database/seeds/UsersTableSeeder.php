<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_user = Role::where('name', 'user')->first();
        $role_author = Role::where('name', 'author')->first();
        $role_admin = Role::where('name', 'admin')->first();


        // $user = new User();
        // $user->name = 'root';
        // $user->email = 'root@gmail.com';
        // $user->password = bcrypt('rootroot');
        // $user->save();
        // $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('adminadmin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->name = 'author';
        $author->email = 'author@gmail.com';
        $author->password = bcrypt('authorauthor');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
