<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;
use App\Post;

class ReplyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\VerifyCsrfToken'); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:140',
            'user_id' => 'required|exists:users,id',
        ]);
        Reply::create($params);
        $replies = Reply::where('post_id', $params['post_id'])->get();
        $post = Post::findOrFail($params['post_id']);
        $user = Auth::user();

        return redirect()->action('PostController@show', $post);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
