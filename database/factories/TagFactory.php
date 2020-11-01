<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $title = $this->faker->unique()->word."-".$this->faker->unique()->name;
        return [
            'title' => $title,
            'user_id' => User::factory()
        ];
    }
}
