<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware; 
use App\User;
Use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class FormTest extends TestCase
{
    
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    
    public function test_create_new_post(){

        $user = factory(User::class)->create();
        $post = factory(Post::class)->create([
            'title' => 'Title hola',
            'body' => 'Body hola',
            'user_id' => $user->id,
        ]);

        $response = $this->post('/store', [
            'title' => $post->title,
            'body' => $post->boby,
            'user_id' => $post->user_id,
        ]);

        $this->assertDatabaseHas('posts', ['title' => "Title hola"]);
        
    }
}
