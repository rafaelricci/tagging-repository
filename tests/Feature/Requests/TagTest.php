<?php

namespace Tests\Feature\Requests;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;

class TagTest extends TestCase
{
    public function testIndexSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('tags');

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testCreateSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('tags/create');

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testStoreSuccess()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->post('tags', [
                             'title' => $tag->title,
                             'user_id' => $tag->user_id
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(302);
    }

    public function testStoreFailed()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->post('tags', [
                             'title' => null,
                             'user_id' => $tag->user_id
                         ]);

        $this->assertNotNull($response->exception);
        $response->assertStatus(302);
    }

    public function testEditSuccess()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->get('tags/'.$tag->id.'/edit');

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testEditFailed()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->make();

        $response = $this->actingAs($user)
                         ->get('tags/'.$tag->id.'/edit');

        $this->assertNotNull($response->exception);
        $response->assertStatus(404);
    }

    public function testUpdateSuccess()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);
        $faker = Factory::create();
        $newTitle = $faker->unique()->word."_".$faker->unique()->name;
        $response = $this->actingAs($user)
                         ->put('tags/'.$tag->id,[
                            'title' => $newTitle,
                            'user_id' => $tag->user_id
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(302);
    }

    public function testUpdateFailed()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->put('tags/'.$tag->id,[
                            'title' => '',
                            'user_id' => $tag->user_id
                         ]);

        $this->assertNotNull($response->exception);
        $response->assertStatus(302);
    }

    public function testDestroySuccess()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)
                         ->delete('tags/'.$tag->id);

        $this->assertNull($response->exception);
        $this->assertNull(Tag::find($tag->id));
        $response->assertStatus(302);
    }
}
