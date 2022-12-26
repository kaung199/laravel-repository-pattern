<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * get all users
     */
    public function getAllUsers()
    {
        $users = User::all();

        return $users;
    }

    /**
     * user save and update
     */
    public function store($param, $user)
    {
        if($user) {
            $user->update($param);

            return $user;
        }

        $user = User::create($param);

        return $user;
    }

    /**
     * user delete
     */
    public function delete($user)
    {
        $user->delete();

        return 'Successfully Deleted!';
    }

    
}

?>