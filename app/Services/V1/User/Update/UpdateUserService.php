<?php

namespace App\Services\V1\User\Update;

use App\Repositories\V1\UserRepositoryInterface;
use App\Services\Bo\User\Update\UpdateUserBo;

class UpdateUserService
{
    public function __construct(private UserRepositoryInterface $userRepositoryInterface, private UpdateUserBo $updateUserBo) {}

    public function updateUser(UpdateUserBo $updateUserBo)
    {
        try {
            $user = $this->userRepositoryInterface->updateUser($updateUserBo);
            if (!$user) {
                return [
                    'status' => 'success',
                    'message' => 'User doesnt exist'
                ];
            }
            return [
                'status' => 'success',
                'message' => 'User updated successfully',
                'data' => $user
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
    public function updateBo($request)
    {
        return $this->updateUserBo->setId($request->id)->setName($request->name)->setEmail($request->email);
    }
}
