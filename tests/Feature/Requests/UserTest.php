<?php

namespace Tests\Feature\Requests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function testShowSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('users/'.$user->id);

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testEditSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get('users/'.$user->id.'/edit');

        $this->assertNull($response->exception);
        $response->assertStatus(200);
    }

    public function testUpdateSuccess()
    {
        $user = User::factory()->create();
        $newName = 'Test User';
        $response = $this->actingAs($user)
                         ->put('users/'.$user->id,[
                            'name' => $newName,
                            'email' => $user->email
                         ]);

        $this->assertNull($response->exception);
        $response->assertStatus(302);
    }

    public function testUpdateFailed()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->put('users/'.$user->id,[
                            'email' => ''
                         ]);

        $this->assertNotNull($response->exception);
        $response->assertStatus(302);
    }

    public function testDestroySuccess()
    {
        $user = User::factory()->create();
       
        $response = $this->actingAs($user)
                         ->delete('users/'.$user->id);

        $this->assertNull($response->exception);
        $this->assertNull(User::find($user->id));
        $response->assertStatus(302);
    }
}
