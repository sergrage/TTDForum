<?php

namespace Tests\Unit;

// use Tests\MigrateFreshSeedOnce;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ThreadTest extends TestCase
{
	// use MigrateFreshSeedOnce;

	public function setUp():  void 
	{
		parent::setUp();
        Artisan::call('migrate:refresh');
		$this->channel = factory('App\Channel')->create();
		$this->thread = factory('App\Thread')->create(['channel_id' => $this->channel->id]);
	}

    /** @test */
    public function a_thread_has_a_creater()
    {
        $this->assertInstanceOf('App\User', $this->thread->user); 
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies); 
    }

    /** @test */
    public function a_thread_can_add_reply()
    {
    	$this->thread->addReply([
    		'body' => 'TestBodeText',
    		'user_id' => 1,
    		'thread_id' =>$this->thread->id
    	]);

    	$this->assertCount(1, $this->thread->replies);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
        $this->assertInstanceOf('App\Channel', $this->thread->channel);
    }
}
