<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
	public function __construct(){
		$this->middleware('auth:owner');
	}
	
    public function dashboard(){
    	
    }
}
