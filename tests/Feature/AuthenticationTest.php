<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_task3()
    {
        $newData = [
            'name' => 'Ashish Dake',
            'email' => 'dakeashish1997@gmail.com',
            'mobile' => '8149940153',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];
        $response = $this->post('/register', $newData);
        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', ['mobile' => '8149940153']);

        $logoutResponse = $this->get('/logout');
        $logoutResponse->assertSeeText('Logged out');
    }

    public function test_task4()
    {
        $response = $this->get('/profile');
        $response->assertRedirectContains('/login');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');
        $response->assertOk();

        $logoutResponse = $this->get('/logout');
        $logoutResponse->assertSeeText('Logged out');
    }

    public function test_task5()
    {
        $response = $this->get('/profile');
        $response->assertRedirectContains('/login');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');
        $response->assertOk();

        $newData = [
            'name' => 'New name',
        ];
        $this->actingAs($user)->put('/profile/update', $newData);
        $this->assertDatabaseHas('users', $newData);

        $logoutResponse = $this->get('/logout');
        $logoutResponse->assertSeeText('Logged out');
    }
}
