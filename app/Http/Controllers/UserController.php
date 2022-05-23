<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\UserUnidad;
use App\Models\Unidad;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index');
    }
       
    // public function show($id)
    // {
    //     $user = User::find($id); 
    //     $rol  = DB::table('view_users_data')->where('id_usuario', $id)->get();
    //     return view('users.show',compact('user','rol'));
    // }

    
    // public function destroy($id)
    // {
    //     if(Auth::User()->id == $id){
    //         return redirect()->back();
    //     }else{
    //         $user = User::find($id);
    //         $user->delete();
    //         return redirect()->back();
    //     }
    // }
}
