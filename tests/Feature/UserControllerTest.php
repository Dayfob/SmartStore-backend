<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testRegister(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/register', [
            'name' => 'Alexander Pushkin',
            'email' => 'semembaevalihan19@gmail.com',
            'password' => 'password',
            'device_name' => 'Test'
        ]);

        $response->assertStatus(200);
    }

    public function testLogin(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/register', [
            'email' => 'semembaevalihan19@gmail.com',
            'password' => 'password',
            'device_name' => 'Test'
        ]);

        $response->assertStatus(200);
    }

    public function testLogout(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/register', [
            'email' => 'semembaevalihan19@gmail.com',
            'password' => 'password',
            'device_name' => 'Test'
        ]);

        $response->assertStatus(200);
    }

    public function testGetUser(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/user/me');

        $response->assertStatus(200);
    }
}
