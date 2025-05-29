<?php

namespace App\Services\comment;

interface CommentInterface
{
    public function getComments();

    public function getCommentsById(int $id);
}
