<?php

namespace Database\Seeders;

use App\Models\UserChildModels\AdminUser;
use App\Models\UserChildModels\EmployeeUser;
use App\Models\UserChildModels\ManagerUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Admin*/
        $admin = new AdminUser([
            'name'     => 'System Admin',
            'email'    => 'admin@tailadmin.dev',
            'password' => Hash::make('tailadmin'),
        ]);
        $admin->save();

        /*Manager*/
        $manager = new ManagerUser([
            'name'     => 'Department Manager',
            'email'    => 'manager@tailadmin.dev',
            'password' => Hash::make('tailadmin'),
        ]);
        $manager->save();

        /*Employee*/
        $employee = new EmployeeUser([
            'name'     => 'Employee',
            'email'    => 'employee@tailadmin.dev',
            'password' => Hash::make('tailadmin')
        ]);
        $employee->save();
    }
}
