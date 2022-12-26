<?php

namespace App\Repository\Interactors;

use App\Repository\Usecases\UserInterface;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{   
    protected $service;

    /**
     * user service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * user lists
     */
    public function getAllUsers()
    {
        $users = $this->service->getAllUsers();

        return $users;
    }

    /**
     * user edit and crate
     */
    public function getUser($user)
    {
        $data = $user ? 'This is edit page for '.$user->name : 'This is create page';

        return $data;
    }

    public function createOrUpdate($request, $user)
    {   
        $param = $request->except('password', '_token') + [
            'password' => Hash::make($request->password)
        ];
        
        $user = $this->service->store($param, $user);

        return $user;
    }
    
    public function deleteUser($user)
    {
        $user = $this->service->delete($user);

        return $user;
    }
}