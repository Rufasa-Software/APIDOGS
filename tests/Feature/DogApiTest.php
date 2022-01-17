<?php

namespace Tests\Feature;

use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertJson;

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

    public function test_api_dogs_show()
    {   //Given
        $dogs = Dog::factory()->count(2)->create();
        //When
        $response = $this->json('GET','/api/dogs/2');
        //Then
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['id'=>$dogs[1]['id'],'name'=>$dogs[1]['name']]);
    }

    public function test_create_dog() {
        
        $data = [
            'name' => 'Snoopy',
            'image' => 'https://google.com'
        ];

        $response = $this->postJson('/api/dogs',$data);

        $response->assertStatus(201);
    }

    public function test_update_dog() {

        $dogs = Dog::factory()->count(2)->create();
        
        $data = [
            'name' => 'Snoopy',
            'image' => 'Snoopy url'
        ];

        $response = $this->putJson('/api/dogs/1',$data);
        $response->assertStatus(201);
    }
};
