<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function getlogin(){
    	return view('auth.login');
    }
    public function postlogin(Request $request){
    	//echo "<pre>";print_r($request->email);exit;
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, ])) {
    		return Redirect('/admin/bf/test');
    	}else{        
       		return 'failed';

    	}
    	return view('auth.login');
    }
}
