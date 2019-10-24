<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ReadThreadTest extends TestCase
{
    // use DatabaseMigrations;
    /** @test */
    public function setUp(): void 
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
        $this->thread = factory('App\Thread')->create();
    }
    /**
     * @test
     */
    public function a_user_can_see_all_threads()
    {

        $this->get('/threads')->assertStatus(200)->assertSee($this->thread->title);
    }
    /**
     * @test
     */
    public function a_user_can_single_thread()
    {
        $this->get($this->thread->path())->assertStatus(200)->assertSee($this->thread->title);
    }
    /**
     * @test
     */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply', 10)->create([
                    'user_id' => $this->thread->user_id,
                    'thread_id' => $this->thread->id
                ]);

        $this->get($this->thread->path())->assertSee($reply[0]->body);
    }
}
