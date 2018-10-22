<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'manager')->first();

        $manager = new User();
        $manager->username = 'admin';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('admin1234');
        $manager->save();
        $manager->roles()->attach($role_manager);

    }
}
