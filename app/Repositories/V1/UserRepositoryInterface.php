<?php

namespace App\Repositories\V1;

use App\services\Bo\User\Create\CreateUserBo;
use App\Services\Bo\User\Get\GetUserBo;

interface UserRepositoryInterface{
    public function getAllUsers();
    public function getUserById($id);
    public function createUser(CreateUserBo $createUserBo);
    public function getUser(GetUserBo $getUserBo);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}