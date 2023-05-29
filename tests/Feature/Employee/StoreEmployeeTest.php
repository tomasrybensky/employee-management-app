<?php

namespace Tests\Feature\Employee;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_employee_unauthorized(): void
    {
        $response = $this->postJson(route('employees.store'));
        $response->assertUnauthorized();
    }

    public function test_store_employee(): void
    {
        $user = User::factory()->create();
        $department = Department::factory()->create();
        $designation = Designation::factory()->create();

        $this->assertDatabaseMissing('employees', [
            Employee::EMAIL => 'test@test.com',
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('employees.store'), [
                Employee::NAME => 'Test Test',
                Employee::EMAIL => 'test@test.com',
                Employee::DESIGNATION_ID => $department->{Department::ID},
                Employee::DEPARTMENT_ID => $designation->{Designation::ID},
            ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('employees', [
            Employee::EMAIL => 'test@test.com',
        ]);
    }
}
