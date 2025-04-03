<?php

namespace App\Repositories\Mysql\V1;

use App\Models\User;
use App\Repositories\V1\UserRepositoryInterface;
use App\services\Bo\User\Create\CreateUserBo;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(CreateUserBo $createUserBo)
    {
        return User::create($createUserBo->toArray());
    }
}