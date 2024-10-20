<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function show()
   {

       $postList = Post::all();
       return view('posts/listPost', ['posts' => $postList]);
   }

}
