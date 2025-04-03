<?php

namespace App\Repositories\V1;

use App\services\Bo\User\Create\CreateUserBo;

interface UserRepositoryInterface{
    public function createUser(CreateUserBo $createUserBo);
}