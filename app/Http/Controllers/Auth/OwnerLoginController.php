<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OwnerLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:owner', ['except' => ['logout']]);
	}


    public function showLoginForm(){
    	return view('owner.login_form');
    }

    public function login(Request $request){
    	$this->validate($request, [
    		'kode_owner' => 'required|string',
    		'password' => 'required|min:6'
    	]);

    	if (Auth::guard('owner')->attempt(['kode_owner' => $request->kode_owner, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('owner.dashboard'));    		
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout(){
        Auth::guard('owner')->logout();
        return redirect('/');
    }
}
