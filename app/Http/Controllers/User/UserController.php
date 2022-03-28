<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class UserController extends Controller
{
    public function getUsers()
    {
        return User::get()->toArray();

//        return $users;
    }
}
