<?php

namespace App\service;

use App\Entity\User;

class UserService
{

    public function generateToken(User $user)
    {
        $token = bin2hex(random_bytes(64));
        $expire = new \DateTime('1 day');

        $user->setToken($token);
        $user->setTokenExpire($expire);
    }
}