<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, $post_id) {

        // Check whether the post exists or not
        $post = Posts::select('id')->where('id', $post_id);

        if (is_null($post)) {
            return response()->json([
                'message' => "Post does not exist."
            ], 404);
        }

        // Check whether the input is valid or not
        $request->validate([
            'messages' => 'required|string|max:255'
        ]);

        // Add post_id
        $data = $request->all();
        $data['post_id'] = $post_id;

        // Insert the new comment into the database
        $comment = Comments::create($data);

        return response()->json([
            'message' => "Comment created.",
            'data' => [
                'comment_id' => $comment->id,
                'messages' => $comment->messages
            ]
        ], 201);
    }

    public function retrieveAll(Request $request, $post_id) {

        // Check whether the post exists or not
        $post = Posts::select('id')->where('id', $post_id);

        if (is_null($post)) {
            return response()->json([
                'message' => "Post does not exist."
            ], 404);
        }

        // select all comments having the post_id = $post_id
        $comments = Comments::select('id', 'messages', 'created_at')->where('post_id', $post_id)->get();

        return response()->json([
            'message' => "Comments retrieved.",
            'data' => $comments
        ], 200);
    }
}
