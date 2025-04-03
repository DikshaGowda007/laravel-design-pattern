<?php

namespace App\Http\Controllers\controller\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\V1\User\Create\CreateUserService;

class UserController extends Controller
{
    public function __construct(private CreateUserService $createUserService) {}
    public function createUser(RegisterUserRequest $request)
    {
        try {
            $bo = $this->createUserService->createBo($request);
            return $this->createUserService->createUser($bo);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
    }
}
