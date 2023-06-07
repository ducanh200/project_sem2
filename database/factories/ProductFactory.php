<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            "name"=> $name,
            "slug"=>Str::slug($name),
            "price"=> random_int(10,100),
            "discount"=> random_int(0,30),
            "thumbnail"=>"images/product-".random_int(1,12).".jpg",
            "qty"=>random_int(5,100),
            "description"=>$this->faker->text(1000),
            "category_id"=>random_int(1,4)
        ];
    }
}
