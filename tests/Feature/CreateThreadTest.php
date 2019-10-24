<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CreateThreadTest extends TestCase
{
    public function setUp():  void 
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }

    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());
        $this->get('threads/create')->assertRedirect('/login');
    }


    /** @test */
    public function an_auth_user_can_create_forum_thread()
    {
        $this->be($user = create('App\User'));

        $channel = create('App\Channel');
        $thread = create('App\Thread', ['user_id' => $user->id, 'channel_id' => $channel->id]);
        
  
        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())->assertSee($thread->title)->assertSee($thread->body);

    }
}
