<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = factory(Thread::class)->create();

        $this->get('/threads')
            ->assertStatus(200)
            ->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $thread = factory(Thread::class)->create();

        $this->get('/threads/' . $thread->id)
            ->assertStatus(200)
            ->assertSee($thread->title);
    }
}
