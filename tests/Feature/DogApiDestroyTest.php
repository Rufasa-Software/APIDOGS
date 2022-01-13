<?php

namespace Tests\Feature;

use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class DogApiDestroyTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_destroy_dogs()
    {   //Given
        $dogs = Dog::factory()->count(2)->destroy();
        //When
        $response = $this->json('GET', '/api/dogs');
        //Then
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertExactJson($dogs->toArray());
    }
}
