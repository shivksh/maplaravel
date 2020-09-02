<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DrivenTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    //  this is the inserting the data into database table for result check the log file in storage/logs/laravel.log file  
     public function testExample()
    {
        $faker = Factory::create();      
       $response = $this->json('POST','/api/products',[                          //assingn that api type & id of that fake array's url to json method            
        'name' => $name = $faker->company,                                       //assigning some random values in table field which is futher request by controller function
        'slug' => str_slug($name),
        'price'=> $price = random_int(10,100), 
       ]);
       $response->assertJsonStructure([                                           //describing the fields we want in log file this should be ame as resource file
           'id','created_at','name','slug','price'
       ])
       ->assertStatus(201);
       \Log::info( [$response->getContent()]);
       $this->assertDatabaseHas('products',[                                      //checking by assertDatabseHas method that data is resent or not if yes it give 201 status 
           'name' => $name,
           'slug' => str_slug($name),
           'price' => $price,
       ]);
    }

    public function testOutput(){
           $product = $this->create('Products');                                  //inserting the a fake data array to  $product 
           $response = $this->json('GET' , "/api/fetch/$product->id");            //assingn that api type & id of that fake array's url to json method
           $response->assertStatus(200)                                           //if assert run it means 
           ->assertExactJson([                                                    //this is the exactly fields we want in return in log file which should be same in resource file
               'id' => $product->id,
               'name'=> $product->name,
               'slug'=> $product->slug,
               'price'=> $product->price,
               'created_at'=> (string)$product->created_at,      
                    ]);
             \Log::info( [$response->getContent()]);                             //this will give that array data in log/laravel.log file

    }

    public function testUpdate(){                                                  //this method is for update testing
        $product = $this->create('Products');                                      //inserting the a fake data array to  $product 
        $response = $this->json('PUT', "api/update/$product->id",[                 //assingn that api type & id of that fake array's url to json method
            'name' => $product->name."updated",                                    //updating the fields data by adding some random suffice like here 'update'
            'slug'=> $product->slug.'updated',
            'price'=> $product->price+10,
            ]);
            $response->assertStatus(201)
            ->assertExactJson([
                'id' => $product->id,
               'slug'=> $product->slug.'updated',
               'name' => $product->name."updated",
               'price'=> $product->price+10,
                'created_at'=> (string)$product->created_at,  
                     ]);
                     \Log::info( [$response->getContent()]);                        //this will give the updated data in log file.

    }

    public function testDelete(){                                                   //this is for delete the data from the db table
        $product = $this->create('Products');                                       //inserting the a fake data array to  $product 
        $response = $this->json('DELETE' , "api/delete/$product->id");              //assingn that api type & id of that fake array's url to json method
        \Log::info( [$response->getContent()]);
        $response->assertStatus(204)                                                 //if successfull delete it will give 204 which is the delete code.
        ->assertSee(null);
    }
}
