<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_employee(): void
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();

        $this->assertDatabaseMissing('employees', [
            Employee::EMAIL => 'test@test.com',
        ]);

        $response = $this->actingAs($user)
            ->putJson(route('employees.update', ['employee' => $employee->{Employee::ID}]), [
                Employee::NAME => $employee->{Employee::NAME},
                Employee::EMAIL => 'test@test.com',
                Employee::DESIGNATION_ID => $employee->{Employee::DESIGNATION_ID},
                Employee::DEPARTMENT_ID => $employee->{Employee::DEPARTMENT_ID},
            ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('employees', [
            Employee::EMAIL => 'test@test.com',
        ]);
    }
}
