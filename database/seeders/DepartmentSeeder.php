<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\UserChildModels\EmployeeUser;
use App\Models\UserChildModels\ManagerUser;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name'        => 'Üretim',
                'description' => 'Üretim departmanı, ürünlerin üretim sürecini yönetir.',
                'manager_id'  => EmployeeUser::where('email', 'supervisor@tailadmin.dev')->first()->id,
                'is_active'   => 1,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
