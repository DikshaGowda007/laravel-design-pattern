<?php

namespace App\Services\V1\User\Get;
use App\Repositories\V1\UserRepositoryInterface;
use App\Services\Bo\User\Get\GetUserBo;

class GetUserService{
// constructor dependency injection to automatically inject dependencies
    public function __construct(private UserRepositoryInterface $userRepositoryInterface, private GetUserBo $getUserBo){}

// passing bo request
    public function getUser(GetUserBo $getUserBo){
        // dd($getUserBo->name);
        try {
            // $user = $this->userRepositoryInterface->getUser($getUserBo);
            $user = $this->userRepositoryInterface->getUser($getUserBo);
            // dd($user);
            if (!$user) {
                return [
                    'status' => 'success',
                    'message' => 'No Users found'
                ];
            }
                return [
                    'status' => 'success',
                    'message' => 'User fetched successfully',
                    'data' => $user
                ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getBo($request)
    {
        return $this->getUserBo->setName($request->name)->setEmail($request->email);
    }
    
}