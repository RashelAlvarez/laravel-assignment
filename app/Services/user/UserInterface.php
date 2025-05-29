<?php

namespace App\Services\user;

interface UserInterface
{
    public function getUsers();
    public function getUserById(int $id);
}
