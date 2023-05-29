<?php

namespace Tests\Feature\Designation;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetDesignationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_designations_unauthorized(): void
    {
        $response = $this->getJson(route('designations.index'));
        $response->assertUnauthorized();
    }

    public function test_get_designations(): void
    {
        $user = User::factory()->create();
        $designation = Designation::factory()->create([Designation::NAME => 'CEO']);

        $response = $this->actingAs($user)->getJson(route('designations.index'));
        $response->assertSuccessful();
        $response->assertExactJson([
            'data' => [
                [
                    Designation::ID => $designation->{Designation::ID},
                    Designation::NAME => $designation->{Designation::NAME}
                ]
            ]
        ]);
    }
}
