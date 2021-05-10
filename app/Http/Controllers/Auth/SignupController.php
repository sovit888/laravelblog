<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class SignupController extends Controller
{
    public function index(){
        return view("auth.signup");
    }
    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'username'=>'required|min:6',
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
User::create([
    "username"=>$req->username,
    "email"=>$req->email,
    "password"=>Hash::make($req->password)
]);
        $credentials = $req->only('email', 'password');
        Auth::attempt($credentials);
        return redirect("/");
    }
}
