<?php

namespace Tests;
use App\Http\Resources\Products as ProductResource;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create(string $model, array $attribute = []){
        $product = factory("App\\$model")->create($attribute);
        return new ProductResource($product);
    }
}
