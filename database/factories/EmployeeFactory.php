<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            Employee::NAME => $this->faker->name,
            Employee::EMAIL => $this->faker->email,
            Employee::DEPARTMENT_ID => Department::factory()->create(),
            Employee::DESIGNATION_ID => Designation::factory()->create(),
        ];
    }
}
