<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
public function index(){
    return view("auth.login");
}
public function login(Request $req){
    $validator = Validator::make($req->all(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ],[
        "required"=>":attribute cannot be empty",
        "email"=>"Enter a valid email",
        "min"=>":attribute should have at least :min characters"
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }
    if(!Auth::attempt($req->only("email","password"))){
        $this->incrementLoginAttempts($request);
        return redirect()->back()
                    ->withErrors(["login"=>"credentials do not match"])->withInput();
                    
    }
    return redirect("/");
}
public function logoutUser(){
    Auth::logout();
    return redirect()->route("login");
}
}
