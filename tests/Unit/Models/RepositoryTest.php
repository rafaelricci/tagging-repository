<?php

namespace Tests\Unit\Models;

use App\Models\Repository;
use App\Models\User;
use Tests\TestCase;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateSuccess()
    {
        $repository = Repository::factory()->create();
        $findedRepository = Repository::where('user_id', $repository->user_id)
                                      ->where('repository_id', $repository->repository_id)
                                      ->where('tag_id', $repository->tag_id)
                                      ->first();

        $this->assertNotNull($findedRepository);
    }

    public function testCreateFailed()
    {
        $this->expectException(\Exception::class);

        Repository::factory()->count(2)->create([
            'repository_id' => 99999,
            'tag_id' => 1
        ]);
    }

    public function testDeleteSuccess()
    {
        $repository = Repository::factory()->create();
        $findedRepository = Repository::where('user_id', $repository->user_id)
                                      ->where('repository_id', $repository->repository_id)
                                      ->where('tag_id', $repository->tag_id);

        $findedRepository->delete();

        $assert = Repository::where('user_id', $repository->user_id)
                            ->where('repository_id', $repository->repository_id)
                            ->where('tag_id', $repository->tag_id)
                            ->first();

        $this->assertEmpty($assert);
    }

    public function testGetTagsRegistered()
    {
        $user = User::factory()->create();
        $repository_id = 5858;

        $repository = Repository::factory(4)->create([
            'user_id' => $user->id,
            'repository_id' => $repository_id 
        ]);

        $repositoryModel = new Repository();
        $tags = $repositoryModel->getTagsRegistered($user->id, $repository_id);

        $this->assertEquals(4, count($tags));
    }
}
