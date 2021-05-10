<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\First;

class HomeController extends Controller
{
    public function index(){
        
        $posts=Post::with(["user"])->paginate(1);
        return view("home",["posts"=>$posts]);
    }
    
}
