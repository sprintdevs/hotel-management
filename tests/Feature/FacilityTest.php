<?php

namespace Tests\Feature;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FacilityTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setup();

        $this->user = User::factory()->create();
    }

    /** @test **/
    public function a_list_of_facilities_can_be_fetched_for_the_authenticated_user()
    {
        Sanctum::actingAs($this->user);

        $facility = Facility::factory()->create();

        $response = $this->getJson('/api/facilities');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                [
                    'type' => 'facility',
                    'id' => $facility->id,
                    'attributes' => [
                        'name' => $facility->name,
                        'address' => $facility->address,
                        'phone' => $facility->phone,
                        'email' => $facility->email,
                        'manager' => $facility->manager->name,
                    ],
                    'links' => [
                        'self' => $facility->path
                    ]
                ]
            ],
            'links' => [
                'self' => '/facilities',
            ],
            'meta' => [],
        ]);
    }

    /** @test **/
    public function a_facility_can_be_created()
    {
        Sanctum::actingAs($this->user);

        $response = $this->postJson('/api/facilities', $this->facilityData());

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(['message' => 'Facility created successfully.']);
        $this->assertCount(1, Facility::all());
        $this->assertEquals('Radisson Blu', Facility::first()->name);
    }

    /** @test **/
    public function validation_should_pass_while_creating_a_facility()
    {
        Sanctum::actingAs($this->user);

        $requiredFields = collect(['name', 'street', 'city', 'state', 'zip', 'phone', 'email', 'manager_id']);

        $requiredFields->map(function ($field) {
            $response = $this->postJson('/api/facilities', array_merge($this->facilityData(), [
                $field => ''
            ]));

            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        });
    }

    /** @test **/
    public function a_facility_can_be_fetched()
    {
        Sanctum::actingAs($this->user);

        $facility = Facility::factory()->create();

        $response = $this->getJson('/api/facilities/' . $facility->id);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'type' => 'facility',
                'id' => $facility->id,
                'attributes' => [
                    'name' => $facility->name,
                    'address' => $facility->address,
                    'phone' => $facility->phone,
                    'email' => $facility->email,
                    'manager' => $facility->manager->name,
                ],
                'links' => [
                    'self' => $facility->path
                ]
            ]
        ]);
    }

    /** @test **/
    public function a_facility_can_be_fetched_for_patching()
    {
        Sanctum::actingAs($this->user);

        $facility = Facility::factory()->create();

        $response = $this->getJson('/api/facilities/' . $facility->id . '/edit');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'id' => $facility->id,
            'name' => $facility->name,
            'street' => $facility->street,
            'city' => $facility->city,
            'state' => $facility->state,
            'zip' => $facility->zip,
            'phone' => $facility->phone,
            'email' => $facility->email,
            'manager_id' => $facility->manager_id
        ]);
    }

    /** @test **/
    public function a_facility_can_be_patched()
    {
        Sanctum::actingAs($this->user);

        $facility = Facility::factory()->create();

        $response = $this->patchJson('/api/facilities/' . $facility->id, $this->facilityData());

        $facility = $facility->fresh();

        $this->assertEquals('Radisson Blu', $facility->name);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['message' => 'Facility updated successfully.']);
    }

    /** @test **/
    public function a_facility_can_be_deleted()
    {
        Sanctum::actingAs($this->user);

        $facility = Facility::factory()->create();

        $response = $this->delete('/api/facilities/' . $facility->id);

        $this->assertCount(0, Facility::all());
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function facilityData()
    {
        return [
            'name' => 'Radisson Blu',
            'street' => 'House#14, Road#03, Block - B, Banasree',
            'city' => 'Dhaka',
            'state' => 'Dhaka',
            'zip' => '1219',
            'phone' => '+8801701010101',
            'email' => 'radisson@email.com',
            'manager_id' => 1
        ];
    }
}
