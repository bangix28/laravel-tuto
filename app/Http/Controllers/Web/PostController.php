<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getPostsUser()
    {
        $user = Auth::user();
        $listPost = Post::where('user_id', $user->getAuthIdentifier())->get();
        return view('posts.listPostUser', ['listPost' => $listPost]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create',['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request)
    {
        $data = $request->validated();
        $post = new Post($data);
        $post->user()->associate(Auth::user());
        $post->save();

        return redirect()->route('post.show', ['post' => $post->id])->with('success', 'Le post a bien été sauvegardé!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.view', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('post.show', ['post' => $post->id])->with('success', 'Le post a bien été modifier!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $isDeleted = $post->delete();
        if (!$isDeleted){
            return redirect()->route('dashboard')->with('error', 'Le post n\'a pas pu être supprimé !');
        }
        return redirect()->route('dashboard')->with('success', 'Le post a bien été supprimer !');
    }
}
