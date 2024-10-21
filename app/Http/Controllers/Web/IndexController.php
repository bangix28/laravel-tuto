<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
   public function show()
   {

       $postList = Post::all();
       return view('posts/listPost', ['posts' => $postList]);
   }

}
