<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('user_id');

        if ($userId) {
            $user = User::find($userId);
            $posts = $user ? $user->posts : [];
        } else {
            $posts = Post::all();
        }

        return response()->json($posts);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'is_published' => 'boolean',
            'user_id'      => 'required|exists:users,id',
        ]);

        $user = User::find($request->user_id);

        $post = $user->posts()->create([
            'title'        => $request->title,
            'content'      => $request->content,
            'is_published' => $request->is_published ?? false,
        ]);

        return response()->json($post, 201);

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
