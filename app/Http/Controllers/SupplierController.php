<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(){
		$this->middleware('auth:supplier');
	}
	
    public function dashboard(){
    	return view('supplier.dashboard');
    }
}
