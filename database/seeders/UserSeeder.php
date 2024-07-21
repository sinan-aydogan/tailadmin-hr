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
            'name'     => 'Sistem Sorumlusu',
            'email'    => 'admin@tailadmin.dev',
            'password' => Hash::make('tailadmin'),
        ]);
        $admin->save();

        /*Manager*/
        $manager = new ManagerUser([
            'name'     => 'Sinan AYDOĞAN',
            'email'    => 'manager@tailadmin.dev',
            'password' => Hash::make('tailadmin'),
        ]);
        $manager->save();

        /*Employee accounts of the manager*/
        $employee = new EmployeeUser([
            'name'     => 'Hamdi KAYA',
            'email'    => 'supervisor@tailadmin.dev',
            'password' => Hash::make('tailadmin')
        ]);
        $employee->save();

        /*Employee account of simple employee*/
        $employee = new EmployeeUser([
            'name'     => 'Zuhal TAŞÇI',
            'email'    => 'worker@tailadmin.dev',
            'password' => Hash::make('tailadmin')
        ]);
        $employee->save();
    }
}
