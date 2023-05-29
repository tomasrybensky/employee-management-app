<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetEmployeesTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_employees_unauthorized(): void
    {
        $response = $this->getJson(route('employees.get'));
        $response->assertUnauthorized();
    }

    public function test_get_employees(): void
    {
        $user = User::factory()->create();
        Employee::factory()->create();

        $response = $this->actingAs($user)->getJson(route('employees.get'));
        $response->assertSuccessful();
    }
}
