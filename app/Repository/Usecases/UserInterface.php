<?php

namespace App\Repository\Usecases;

interface UserInterface
{
    /**
     * get all user
     */
    public function getAllUsers();

    /**
     * get one user by id
     */
    public function getUser($id);

    /**
     * user create and update
     */
    public function createOrUpdate($request, $user);

    /**
     * delete user
     */
    public function deleteUser($user);
}