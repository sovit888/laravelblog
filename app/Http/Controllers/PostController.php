<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class PostController extends Controller
{
public function index(){
    return view("post");
}
public function create(Request $req){
    $validator = Validator::make($req->all(), [
        'header'=>'required|min:20',
        'body' => 'required|min:40',
    ],[
        "required"=>":attribute cannot be empty",
        "min"=>":attribute should have at least :min characters"
    ]);
    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

  Auth::user()->posts()->create([
      "header"=>$req->header,
      "body"=>$req->body
  ]);
  return redirect("/");
}
}
