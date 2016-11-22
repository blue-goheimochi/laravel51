<?php

use Mockery as m;

/**
 * Class LikeRepositoryTest
 *
 * @see \App\Repositories\LikeRepository
 */
class LikeRepositoryTest extends \TestCase
{
    public function testCreateLike()
    {
        $likeAliasMock = m::mock('alias:App\DataAccess\Eloquent\Like');

        $like = new stdClass;
        $like->id       = 1;
        $like->user_id  = 1;
        $like->topic_id = 1;

        $likeAliasMock->shouldReceive('create')->andReturn($like);
        $repository = new \App\Repositories\LikeRepository(
            $likeAliasMock
        );
        $result = $repository->create([
            'user_id'  => 1,
            'topic_id' => 1,
        ]);
        $this->assertEquals(1, $result->id);
        $this->assertEquals(1, $result->user_id);
        $this->assertEquals(1, $result->topic_id);
    }
    
    public function testDeleteLike()
    {
        $user_id  = 1;
        $topic_id = 1;

        $likeAliasMock = m::mock('alias:App\DataAccess\Eloquent\Like');
        $likeAliasMock
            ->shouldReceive('where')->with('user_id', $user_id)->once()->andReturn(m::self())->getMock()
            ->shouldReceive('where')->with('topic_id', $topic_id)->once()->andReturn(m::self())->getMock()
            ->shouldReceive('delete')
            ->andReturn(1);
        
        $repository = new \App\Repositories\LikeRepository(
            $likeAliasMock
        );
        $result = $repository->delete($user_id, $topic_id);
        
        $this->assertInternalType('int', $result);
        $this->assertEquals(1, $result);
    }
}