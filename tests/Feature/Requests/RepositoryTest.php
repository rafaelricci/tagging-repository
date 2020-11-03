<?php

namespace Tests\Feature\Requests;

use VCR\VCR; 
use App\Models\Repository;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @vcr repository_index_test.yml
    */
    public function testIndexSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('repositories');

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

     /**
     * @vcr repository_search_test.yml
    */
    public function testSearchSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('repositories', [
                            'term' => 'tetris',
                            'language' => 'assembly',
                            'order' => 'desc',
                            'stars' => 'on'
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testStoreSuccess()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->post('repositories', [
                             'tag_id' => $tag->id,
                             'repository_id' => random_int(50, 1000),
                             'user_id' => $tag->user_id
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(302);
    }

    public function testStoreFailed()
    {
        $repository_id = random_int(50, 1000);
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        Repository::factory()->create([
            'repository_id' => $repository_id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
                         ->post('repositories', [
                             'tag_id' => $tag->id,
                             'repository_id' => $repository_id,
                             'user_id' => $tag->user_id
                         ]);

        $this->assertNotNull($response->exception);
        $response->assertStatus(302);
    }

    /**
     * @vcr repository_view_test.yml
    */
    public function testShow()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('repositories', [
                            'id' => random_int(1, 105929055)
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $repository_id = random_int(50, 1000);
        $user = User::factory()->create();
        $tag = Tag::factory()->create(['user_id' => $user->id]);

        $repository = Repository::factory()->create([
            'repository_id' => $repository_id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        $uri = 'repositories/'.$repository->repository_id.'/'.$tag->id.'/'.$user->id;
        $response = $this->actingAs($user)->delete($uri);

        $assert = Repository::where('user_id', $repository->user_id)
                            ->where('repository_id', $repository->repository_id)
                            ->where('tag_id', $repository->tag_id)
                            ->first();

        $this->assertNull($response->exception);
        $this->assertEmpty($assert);
        $response->assertStatus(302);
    }
}
