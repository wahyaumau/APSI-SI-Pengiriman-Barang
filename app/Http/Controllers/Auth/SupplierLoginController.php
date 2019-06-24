<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SupplierLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:supplier', ['except' => ['logout']]);
	}


    public function showLoginForm(){
    	return view('supplier.login_form');
    }

    public function login(Request $request){
    	$this->validate($request, [
    		'kode_supplier' => 'required|string',
    		'password' => 'required|min:6'
    	]);

    	if (Auth::guard('supplier')->attempt(['kode_supplier' => $request->kode_supplier, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('supplier.dashboard'));    		
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout(){
        Auth::guard('supplier')->logout();
        return redirect('/');
    }
}
