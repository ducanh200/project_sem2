<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->domainName;
        return [
            "name"=>$name,
            "slug"=>Str::slug($name),
            "thumbnail"=>"images/category-".random_int(1,4).".jpg",
        ];
    }
}
