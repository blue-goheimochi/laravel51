<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    /** @var Comment */
    protected $eloquent;

    public function __construct(Comment $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function create(array $params)
    {
        return $this->eloquent->create($params);
    }
}
