<?php

use Mockery as m;

/**
 * Class CommentRepositoryTest
 *
 * @see \App\Repositories\CommentRepository
 */
class CommentRepositoryTest extends \TestCase
{
    public function testCreateComment()
    {
        $commentAliasMock = m::mock('alias:App\DataAccess\Eloquent\Comment');

        $comment = new stdClass;
        $comment->id       = 1;
        $comment->user_id  = 1;
        $comment->topic_id = 1;
        $comment->body     = 'Test Body';
        $comment->status   = 1;

        $commentAliasMock->shouldReceive('create')->andReturn($comment);
        $repository = new \App\Repositories\CommentRepository(
            $commentAliasMock
        );
        $result = $repository->create([
            'user_id'  => 1,
            'topic_id' => 1,
            'body'     => 'Test Body',
            'status'   => 1,
        ]);
        $this->assertEquals(1, $result->id);
        $this->assertEquals(1, $result->user_id);
        $this->assertEquals(1, $result->topic_id);
        $this->assertEquals('Test Body', $result->body);
        $this->assertEquals(1, $result->status);
    }
}