<?php

namespace App\Repositories\Mysql\V1;

use App\Models\User;
use App\Repositories\V1\UserRepositoryInterface;
use App\services\Bo\User\Create\CreateUserBo;
use App\Services\Bo\User\Get\GetUserBo;
use App\Services\Bo\User\Update\UpdateUserBo;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{

    public function createUser(CreateUserBo $createUserBo)
    {
        return User::create($createUserBo->toArray());
    }

    public function getUser(GetUserBo $getUserBo){
        
        // // Eloquent
        $query = User::query()
        ->when(!is_null($getUserBo->getName()), function (Builder $query) use ($getUserBo) {
            $query->where('name', 'like', '%'.$getUserBo->getName().'%');
        })
        ->when(!is_null($getUserBo->getEmail()), function (Builder $query) use ($getUserBo) {
            $query->where('email', $getUserBo->getEmail());
        });
        $result = $query->get();
        // dd(isEmpty($result->toArray()));
        // if(isEmpty($result->toArray())){ return false; }

        // // db query buIlder
        // $query = DB::table('users');
        // if (!empty($getUserBo->getName())) {
        //     $query->where('name', 'like', '%'.$getUserBo->getName().'%');
        // }
        // if (!empty($getUserBo->getEmail())) {
        //     $query->where('email', $getUserBo->getEmail());
        // }
        // $result = $query->get();

        // return $result;
        return $result->toArray();
    }

    public function updateUser(UpdateUserBo $updateUserBo)
    {
        $user = User::find($updateUserBo->getId());
        if(!$user){ return null; }
        $user->update([
            'name' => $updateUserBo->getName(),
            'email' => $updateUserBo->getEmail()
        ]);
        return $user->toArray();
    }
}
