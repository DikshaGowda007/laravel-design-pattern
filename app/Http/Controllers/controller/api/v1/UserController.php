<?php

namespace App\Http\Controllers\controller\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\FindUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\V1\User\Create\CreateUserService;
use App\Services\V1\User\Delete\DeleteUserService;
use App\Services\V1\User\Get\GetUserService;
use App\Services\V1\User\Update\UpdateUserService;

class UserController extends Controller
{
    public function __construct(private CreateUserService $createUserService, private GetUserService $getUserService, private UpdateUserService $updateUserService, private DeleteUserService $deleteUserService) {}
    public function createUser(RegisterUserRequest $request)
    {
        try {
            $bo = $this->createUserService->createBo($request);
            return $this->createUserService->createUser($bo);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function getUser(FindUserRequest $request)
    {
        try {
            $bo = $this->getUserService->getBo($request);
            return response()->json($this->getUserService->getUser($bo));
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function updateUser(UpdateUserRequest $request)
    {
        try {
            $bo = $this->updateUserService->updateBo($request);
            return response()->json($this->updateUserService->updateUser($bo));
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function deleteUser(DeleteUserRequest $request){
        try {
            $bo = $this->deleteUserService->deleteBo($request);
            return response()->json($this->deleteUserService->deleteUser($bo));
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
