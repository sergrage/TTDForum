<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    public function setUp():  void 
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $user = create('App\User');
        $channel = create('App\Channel');
        $thread = create('App\Thread', ['user_id' => $user->id, 'channel_id'=>$channel->id]);
        $reply = create('App\Reply', [
            'user_id' => $user->id,
            'thread_id' => $thread->id,
        ]);

        // dd($thread->path().'/replies');

        $this->post($thread->path() .'/replies', [$reply->toArray(), $thread]);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = create('App\User'));
        // $user = factory('App\User')->create();
        // устанавливает $user аутентифицированным в настоящее время
        $thread = create('App\Thread', ['user_id' => $user->id]);
        $reply = create('App\Reply', [
            'user_id' => $user->id,
            'thread_id' => $thread->id,
        ]);
        dd($thread);

        $this->post($thread->path() .'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }
    
}
