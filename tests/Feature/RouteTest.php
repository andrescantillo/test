<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
Use App\Post;
use WithoutMiddleware; 


class RouteTest extends TestCase
{
    use RefreshDatabase;
     /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_routes()
    {
        $appURL = env('APP_URL');

        $urls = [
            '/',
            'login',
            'register',
            '/home' 
        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo  $appURL . $url . ' (FAILED) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $appURL . $url . ' (success ?)';
                $this->assertTrue(true);
            }
            echo  PHP_EOL;
        }
    }

    /** @test */
    public function login_displays_the_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function register_displays_the_register_page()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    /** @test */
    public function post_list_displays_the_post_list_page()
    {
        $response = $this->get(url('/posts'));

        $response->assertStatus(200);
    }
}
