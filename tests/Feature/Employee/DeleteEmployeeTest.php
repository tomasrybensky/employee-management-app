<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteEmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_employee(): void
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();

        $this->assertDatabaseHas('employees', [
            Employee::EMAIL => $employee->{Employee::EMAIL},
        ]);

        $response = $this->actingAs($user)
            ->deleteJson(route('employees.delete', ['employee' => $employee->{Employee::ID}]));

        $response->assertSuccessful();

        $this->assertDatabaseMissing('employees', [
            Employee::EMAIL => $employee->{Employee::EMAIL},
        ]);
    }
}
