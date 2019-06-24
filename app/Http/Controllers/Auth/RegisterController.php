<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'kode_pelanggan' => ['required', 'string', 'min:4', 'max:10', 'unique:pelanggan,kode_pelanggan'],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telepon' => ['required', 'string', 'min:8', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pelanggan,email'],
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
        return Pelanggan::create([
            'kode_pelanggan' => $data['kode_pelanggan'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
