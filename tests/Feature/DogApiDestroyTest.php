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
        $dogs = Dog::factory()->count(2)->create();
        
        //When
        $response = $this->deleteJson('/api/dogs/{id}');
        
        //Then
        $response->assertStatus(200);
       
        

            
    }
}
