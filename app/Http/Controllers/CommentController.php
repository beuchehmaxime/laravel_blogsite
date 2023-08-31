<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $post_id){
        if(auth()->check()){
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = null;
            $request->validate([
                'comment_name' => 'required',
                'comment_email' => 'required'
            ]);
        }
        $request->validate([
            'comment_message' => 'required'
        ]);
        Comment::insert([
            'username' => $request->comment_name,
            'email' => $request->comment_email,
            'message' => $request->comment_message,
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
        return redirect()->back();
    }
    public function comment(){
        $comments = Comment::latest('id')->get();
        return view('admin.comment.comment', compact('comments'));
    }
    
    public function editComment($id){
        $comment = Comment::findOrFail($id);
        return view('admin.comment.editcomment', compact('comment'));
    }

    public function updateComment(Request $request, $id){
        $request->validate([
            'comment_message' => 'required'
        ]);
        Comment::whereId($id)->update([
            'message' => $request->comment_message
        ]);
        return redirect()->back()->with('successmessage','Comment message updated successfully');
    }
    public function deleteComment($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('successmessage','Comment deleted successfully');
    }
}
