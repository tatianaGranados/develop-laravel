<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $model)
    {
    //    $user = User:: 
        return view('users.index', ['users' => $model->paginate(15)]);
    }
}
