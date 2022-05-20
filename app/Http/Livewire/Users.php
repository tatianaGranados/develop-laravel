<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Users extends Component
{
    public $users, $id_user;

    public function render()
    {
        $this->users= DB::table('view_users_data')->orderBy('paterno','asc')->get();
        return view('users.list');
    }
}