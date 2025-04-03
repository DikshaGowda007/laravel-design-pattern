<?php

namespace App\Services\V1\User\Create;

use App\Repositories\V1\UserRepositoryInterface;
use App\services\Bo\User\Create\CreateUserBo;

class CreateUserService
{
    // Using Constructor dependency injection to automatically inject dependencies
    public function __construct(private UserRepositoryInterface $userRepositoryInterface, private CreateUserBo $createUserBo){}

    public function createUser(CreateUserBo $createUserBo)
    {
        try {
            $user = $this->userRepositoryInterface->createUser($createUserBo);
            return [
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $user
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
    public function createBo($request)
    {
        return $this->createUserBo->setName($request->name)->setEmail($request->email)->setPassword($request->password);
    }
}
