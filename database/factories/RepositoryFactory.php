<?php

namespace Database\Factories;

use App\Models\Repository;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepositoryFactory extends Factory
{
    protected $model = Repository::class;

    public function definition()
    {
        return [
            'tag_id' => Tag::factory(),
            'user_id' => User::factory(),
            'repository_id' => random_int(1, 105929055)
        ];
    }
}
