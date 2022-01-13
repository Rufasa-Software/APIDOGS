<?php

namespace Tests\Feature;

use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DogApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_dogs()
    {   //Given
        $dogs = Dog::factory()->count(2)->create();
        //When
        $response = $this->json('GET', '/api/dogs');
        //Then
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertExactJson($dogs->toArray());
    }
}
