<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Like;

class LikeRepository implements LikeRepositoryInterface
{
    /** @var Like */
    protected $eloquent;

    public function __construct(Like $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function create(array $params)
    {
        return $this->eloquent->create($params);
    }
}
