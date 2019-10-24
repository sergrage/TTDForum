<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $threads = factory(App\Thread::class, 50)->create();
        $threads->each(
        	function($thread){
        	 	factory(App\Reply::class, 10)->create([
        	 		'user_id' => $thread->user_id,
					'thread_id' => $thread->id
        	 	]);
    	});
    }
}
