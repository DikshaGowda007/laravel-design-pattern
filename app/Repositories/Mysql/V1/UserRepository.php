<?php

namespace App\Repositories\Mysql\V1;

use App\Models\User;
use App\Repositories\V1\UserRepositoryInterface;
use App\services\Bo\User\Create\CreateUserBo;
use App\Services\Bo\User\Get\GetUserBo;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class UserRepository implements UserRepositoryInterface
{
    
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

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

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        // dd($user->toArray());
        if(!$user) return false;
        return $user->delete();
    }
}
