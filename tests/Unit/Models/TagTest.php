<?php

namespace Tests\Unit\Models;

use App\Models\Tag;
use Tests\TestCase;
use Faker\Factory;

class TagTest extends TestCase
{
    public function testCreateSuccess()
    {
        $tag = Tag::factory()->create();

        $this->assertTrue(Tag::find($tag->id) != null);
    }

    public function testCreateFailed()
    {
        $this->expectException(\Exception::class);

        Tag::factory()->create([
            'title' => null
        ]);
    }

    public function testUpdateSuccess()
    {
        $originalTag = Tag::factory()->create();
        $modifyTag = Tag::find($originalTag->id);
        $faker = Factory::create();
        $newTitle = $faker->unique()->word."_".$faker->unique()->name;
        $modifyTag->update(['title' => $newTitle]);

        $this->assertTrue($originalTag->title != $modifyTag->title);
    }

    public function testUpdateFailed()
    {
        $this->expectException(\Exception::class);

        $originalTag = Tag::factory()->create();
        $modifyTag = Tag::find($originalTag->id);
        $modifyTag->update(['title' => null]);
    }

    public function testDeleteSuccess()
    {
        $tag = Tag::factory()->create();
        $tag->delete();

        $this->assertEmpty(Tag::find($tag->id));
    }
}
