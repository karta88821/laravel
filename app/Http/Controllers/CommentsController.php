<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, $post_id) {

        $post = Posts::select('id')->where('id', $post_id);

        if (is_null($post)) {
            return response()->json([
                'message' => "Post does not exist."
            ], 404);
        }

        $request->validate([
            'messages' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $data['post_id'] = $post_id;

        $comment = Comments::create($data);

        return response()->json([
            'message' => "Comment created.",
            'data' => [
                'comment_id' => $comment->id,
                'messages' => $request->get('messages')
            ]
        ], 201);
    }

    public function retrieveAll(Request $request, $post_id) {

        $post = Posts::select('id')->where('id', $post_id);

        if (is_null($post)) {
            return response()->json([
                'message' => "Post does not exist."
            ], 404);
        }

        $comments = Comments::select('id', 'messages', 'created_at')->where('post_id', $post_id)->get();

        return response()->json([
            'message' => "Comments retrieved.",
            'data' => $comments
        ], 200);
    }
}
