<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::firstOrCreate([Department::NAME => 'Marketing']);
        Department::firstOrCreate([Department::NAME => 'IT']);
        Department::firstOrCreate([Department::NAME => 'Operations']);
    }
}
