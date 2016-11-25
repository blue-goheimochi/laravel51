<?php

namespace App\Repositories;

interface CommentRepositoryInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);
}
