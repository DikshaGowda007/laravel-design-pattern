<?php

namespace App\Services\V1\User\Delete;

use App\Repositories\V1\UserRepositoryInterface;
use App\Services\Bo\User\Delete\DeleteUserBo;

class DeleteUserService
{
    public function  __construct(private UserRepositoryInterface $userRepositoryInterface, private DeleteUserBo $deleteUserBo) {}

    public function deleteUser(DeleteUserBo $deleteUserBo)
    {
        try {
            $user =  $this->userRepositoryInterface->deleteUser($deleteUserBo);
            if (!$user) {
                return [
                    'status' => 'success',
                    'message' => 'User doesnt exist'
                ];
            }
            return [
                'status' => 'success',
                'message' => 'User deleted successfully',
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
    public function deleteBo($request)
    {
        return $this->deleteUserBo->setId($request->id);
    }
}
