<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{

    /**$comment = Comment::orderBy('created_at','desc')->paginate(25);
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]); 
        
        //Check if verified
        if(auth()->user()->verified() === false)
        {
           return redirect('/')->with('error', 'You account is not verified! Check Your inbox');
        }

        //Create post
        $id = $request->input('post_id');
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $id;
        $comment->save();

        return redirect("/posts/$id")->with('success', 'You have successfully commented this post');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        //Check for correct user
        if(auth() -> user()->id !== $comment->user_id){
            return redirect("/posts/$comment->post_id")->with('error', 'Unauthorized Page');
        }
        //Check if verified
        if(auth()->user()->verified() == false)
        {
            return redirect('/')->with('error', 'You account is not verified! Check Your inbox');
        }

        return view('comments.edit')->with('comment', $comment);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required'
        ]); 

        $comment = Comment::find($id);
        $comment->body = $request->input('body');
        $comment->save();

        return redirect("/posts/$comment->post_id")->with('success', 'Comment Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        //Check for correct user
        if(auth() -> user()->id !== $comment->user_id){
            return redirect("/posts/$comment->post_id")->with('error', 'Unauthorized Action');
        }

        $comment->delete();
        return redirect("/posts/$comment->post_id")->with('success', "Comment Deleted");
    }

}
