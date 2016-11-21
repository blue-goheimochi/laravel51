<?php

namespace App\Repositories;

interface LikeRepositoryInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);
}
