<?php

namespace App\service;

use App\Entity\User;
use DateTime;
use Exception;

class UserService
{

    public function generateToken(User $user)
    {
        try {
            $token = bin2hex(random_bytes(64));
        } catch (Exception $e) {
        }
        $expire = new DateTime('2 day');

        if (!empty($token)) {
            $user->setToken($token);
        }
        $user->setTokenExpire($expire);
    }

    public function resetToken( User $user)
    {
        $user->setToken(bin2hex(random_bytes(64)));
        $user->setTokenExpire(null);
    }
}