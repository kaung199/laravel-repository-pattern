<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Repository\Usecases\UserInterface;
use Illuminate\Http\Request;

class NewController extends Controller
{   
    public $user;
    
    /**
     * user repository and service
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * user lists
     */
    public function index()
    {
        $users = $this->user->getAllUsers();

        return $users;
    }

    /**
     * user create and edit
     */
    public function create(User $user=null)
    {
        $user = $this->user->getUser($user);
        
        return $user;
    }

    /**
     * user save and update 
     */
    public function store(StoreRequest $request, User $user=null)
    {   
        $user = $this->user->createOrUpdate($request, $user);
        
        return $user;
    }

    /**
     * user delete
     */
    public function delete(User $user)
    {
        $user = $this->user->deleteUser($user);

        return $user;
    }
}
