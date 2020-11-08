<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id)->latest();
        return view('blog-post', ['post' => $post]);
    }


    public function create(Request $request)
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {

        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        Session::flash('post-created-message', 'Post with was created successfully');
        return redirect()->route('post.index');


    }

    public function index()
    {
       $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts' => $posts,]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('message', 'Post with id ' . $post->id . ' was deleted');
        return back();
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $input = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $input['post_image'] = request('post_image')->store('images');
            $post->post_image = $input['post_image'];
        }
        $post->title = $input['title'];
        $post->body = $input['body'];

        $this->authorize('update', $post);

        $post->update();
        return redirect()->route('post.index');


    }
}
