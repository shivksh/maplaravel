<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DrivenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker = Factory::create();
       $response = $this->json('POST','/api/products',[

        'name' => $name = $faker->company,
        'slug' => str_slug($name),
        'price'=> $price = random_int(10,100), 


       ]);
       $response->assertStatus(201);

       $this-> assertDatabaseHas('products',[
           'name' => $name,
           'slug' => str_slug($name),
           'price' => $price,
       ]);
    }
}
