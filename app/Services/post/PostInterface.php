<?php

namespace App\Services\post;

interface PostInterface
{
    public function getPosts();

    public function getPostById(int $id): mixed;

    public function getPostsByUserId(int $userId): mixed;
}
