<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function table()
    {
        $posts = Post::all();
        return view('table/index', ['posts' => $posts]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));
        $post->update($request->all());
        uploadPicture(Input::file('file'), $post->id, "post");

        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');

        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'content' => 'required'
        ));

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        uploadPicture(Input::file('file_0'), $post->id, "post");


        Session::flash('success', 'Der Eintrag wurde erfolgreich gespeichert!');
        return back();

    }

    public function destroy(Post $post)
    {
        deletePicture($post->id, "post");
        $post->delete();
        Session::flash('success', 'Der Eintrag wurde erfolgreich gelöscht!');
        return back();
    }
}
