<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use App\Http\User;
class AuthController extends Controller
{
    //
    public function login(Request $request){
    	$email = $request['email'];
    	$password = $request['password'];
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    // The user is active, not suspended, and exists.
    		return 'Đăng nhập thành công';
}
    	else
    	{
    		return view('auth.login');
    	}
    }
}
