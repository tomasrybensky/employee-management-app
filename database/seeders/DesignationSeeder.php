<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::firstOrCreate([Designation::NAME => 'Administrative Assistant']);
        Designation::firstOrCreate([Designation::NAME => 'Software Engineer']);
        Designation::firstOrCreate([Designation::NAME => 'Sales Manager']);
    }
}
