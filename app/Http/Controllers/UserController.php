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

    public function index(User $model)
    {
        $users    = DB::table('view_users_data')->orderBy('paterno','asc')->get();
        $unidades = Unidad::all()->pluck('nombre_unidad','id');

        return view('users.index',compact('users','unidades') ,['users' => $model->paginate(15)]);
    }
    
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user ->password = bcrypt($request->password);
        $user->save();

        $user_unid = new UserUnidad($request->all());
        $user_unid -> id_usuario = $user->id;
        $user_unid -> id_unidad  = $request->unidad;
        $user_unid -> save();

        return redirect::route('user.index');
    }

   
    public function show($id)
    {
        $user = User::find($id); 
        $rol  = DB::table('view_users_data')->where('id_usuario', $id)->get();
        return view('users.show',compact('user','rol'));
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        if(Auth::User()->id == $id){
            return redirect()->back();
        }else{
            $user = User::find($id);
            $user->delete();
            return redirect()->back();
        }
    }
}
