<?php

namespace Tests\Feature;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function a_facility_can_be_created()
    {
        Sanctum::actingAs($this->user);

        $response = $this->postJson('/api/facilities', $this->facilityData());
        
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(["message"=> "Facility created successfully."]);
        $this->assertCount(1, Facility::all());
        $this->assertEquals("Radisson Blu", Facility::first()->name);
    }

    /** @test **/
    public function validation_should_pass_while_creating_a_facility()
    {
        Sanctum::actingAs($this->user);

        $requiredFields = collect(['name', 'street', 'city', 'state', 'zip', 'phone', 'email', 'manager_id']);

        $requiredFields->map(function($field) {
            $response = $this->postJson('/api/facilities', array_merge($this->facilityData(), [
                $field => ''
            ]));
    
            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        });
    }

    public function facilityData()
    {
        return [
            "name"=>"Radisson Blu",
            "street"=>"House#14, Road#03, Block - B, Banasree",
            "city"=> "Dhaka",
            "state" => "Dhaka",
            "zip" => "1219",
            "phone" => "+8801701010101",
            "email" => "john@gmail.com",
            "manager_id" => 1
        ];
    }
}
