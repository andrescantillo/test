<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
Use App\Post;
use Session;
use Illuminate\Support\Facades\Auth;

class UserTest extends TestCase
{
    
    use RefreshDatabase;

     /**
     * @test
     */
    public function test_login()
    {

        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
            
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('i-love-laravel'),
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    public function test_register()
    {

        $user = factory(User::class)->create([
            'name' => "Andrew Cantillo",
            'email' => "andrescantillona@gmail.com')",
            'password' => bcrypt('Hellop_2580'),
        ]);
        $response = $this->actingAs($user)->get('/register');
        $response->assertRedirect('/home');
            
    }
}
