<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setup();

        $this->user = User::factory()->create();
    }

    /** @test **/
    public function a_list_of_managers_should_be_fetched()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs($this->user);

        $manager = User::factory()->create();

        $response = $this->getJson('/api/managers');

        $response->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'data' => [
                [
                    'type' => 'user',
                    'id' => $this->user->id,
                    'attributes' => [
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'verified' => $this->user->verified,
                    ],
                    'links' => [
                        'self' => $this->user->path
                    ]
                ],
                [
                    'type' => 'user',
                    'id' => $manager->id,
                    'attributes' => [
                        'name' => $manager->name,
                        'email' => $manager->email,
                        'verified' => $manager->verified,
                    ],
                    'links' => [
                        'self' => $manager->path
                    ]
                ]
            ],
            'links' => [
                'self' => "/api/managers",
            ],
            'meta' => [],
        ]);
    }
}
