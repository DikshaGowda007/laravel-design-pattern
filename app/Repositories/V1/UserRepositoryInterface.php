<?php

namespace App\Repositories\V1;

use App\services\Bo\User\Create\CreateUserBo;
use App\Services\Bo\User\Get\GetUserBo;
use App\Services\Bo\User\Update\UpdateUserBo;

interface UserRepositoryInterface{
    public function createUser(CreateUserBo $createUserBo);
    public function getUser(GetUserBo $getUserBo);
    public function updateUser(UpdateUserBo $updateUserBo);
}