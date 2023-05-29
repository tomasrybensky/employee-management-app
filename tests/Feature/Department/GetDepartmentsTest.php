<?php

namespace Tests\Feature\Department;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetDepartmentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_departments_unauthorized(): void
    {
        $response = $this->getJson(route('departments.index'));
        $response->assertUnauthorized();
    }

    public function test_get_departments(): void
    {
        $user = User::factory()->create();
        $department = Department::factory()->create([Department::NAME => 'Sales']);

        $response = $this->actingAs($user)->getJson(route('departments.index'));
        $response->assertSuccessful();
        $response->assertExactJson([
            'data' => [
                [
                    Department::ID => $department->{Department::ID},
                    Department::NAME => $department->{Department::NAME}
                ]
            ]
        ]);
    }
}
