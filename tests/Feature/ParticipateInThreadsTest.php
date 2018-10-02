<?php

namespace Tests\Feature;

use App\User;
use App\Reply;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory(User::class)->create());

        $thread = factory(Thread::class)->create();
        $reply = factory(Reply::class)->make();

        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertStatus(200)
            ->assertSee($reply->body);
    }
}
