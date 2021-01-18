<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function like_post(Request $request)
    {
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $like_value = $request->like_value;

        if(!$user_id) throw new \Exception('User should be logged in');
        if(!$post_id) throw new \Exception('Post id should be provided');

        $exists = Like::where([
            'post_id' => $post_id,
            'user_id' => $user_id
        ])->get();

        if(sizeof($exists) > 0) {
            Like::where([
                'post_id' => $post_id,
                'user_id' => $user_id
            ])->update(['value' => $like_value]);
        } else {
            $like = new Like([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'value' => $like_value
            ]);

            $like->save();
        }

        return response()->json(['status' => 200, 'message' => 'Success']);
    }

    public function like_comment(Request $request)
    {
        $user_id = Auth::id();
        $comment_id = $request->comment_id;
        $like_value = $request->like_value;

        if(!$user_id) throw new \Exception('User should be logged in');
        if(!$comment_id) throw new \Exception('Post id should be provided');

        $exists = Like::where([
            'comment_id' => $comment_id,
            'user_id' => $user_id
        ])->get();

        if(sizeof($exists) > 0) {
            Like::where([
                'comment_id' => $comment_id,
                'user_id' => $user_id
            ])->update(['value' => $like_value]);
        } else {
            $like = new Like([
                'user_id' => $user_id,
                'comment_id' => $comment_id,
                'value' => $like_value
            ]);

            $like->save();
        }

        return response()->json(['status' => 200, 'message' => 'Success']);
    }
}
