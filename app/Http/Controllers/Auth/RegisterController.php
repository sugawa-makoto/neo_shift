<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Time;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); //元は $this->middleware('guest');
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'youbi[]' => ['required', 'string', 'max:255'],
            'shift1' => ['required', 'string'],
            'shift2' => ['required', 'string'],
            'shift3' => ['required', 'string'],
            'shift4' => ['required', 'string'],
            'shift5' => ['required', 'string'],
            'midnight' => ['required', 'string'],
            'continuous_midnight' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'youbi[]' => $data['youbi[]'],
            'shift1' => $data['shift1'],
            'shift2' => $data['shift2'],
            'shift3' => $data['shift3'],
            'shift4' => $data['shift4'],
            'shift5' => $data['shift5'],
            'midnight' => $data['midnight'],
            'continuous_midnight' => $data['continuous_midnight'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistrationForm(){
        $times_data = Time::all();

        return view('auth.register', ['times_data' => $times_data]);
    }
}
