<?php

namespace App\Repositories;

interface LikeRepositoryInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);

    /**
     * @param int $user_id
     * @param int $topic_id
     * @return mixed
     */
    public function delete(array $params);
}
