<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Time;

class AddUserController extends Controller
{
    public function user_add_form(){
        $times_data = Time::all();

        return view('adduser_form', ['times_data' => $times_data]);
  }
}
