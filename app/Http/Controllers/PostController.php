<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;   
use App\Community;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $community_id = $request->query('community_id');
        $user = Auth::User();
        $community = Community::findOrFail($community_id);
        return view('post.create', compact('user', 'community'));

        //
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
            'user_id' => 'required|exists:users,id',
            'community_id' => 'required|exists:communities,id',
            'pic_name' => 'required|image',
            'content' => 'required|max:200',
        ]);
        // storage/app/public/pictures下にランダムなファイル名で保存
        $pic_path = $request->file('pic_name')->store('public/pictures');
        $params['picture_path'] = basename($pic_path);
        Post::create($params);
        $posts = Post::where('community_id', $params['community_id'])->get();
        $community = Community::findOrFail($params['community_id']);
        return redirect()->action('CommunityController@show', $community);
      
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $replies = $post->replies()->get();
        return view('post.show', compact('post', 'replies', 'user'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
        //
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
        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'community_id' => 'required|exists:communities,id',
            'content' => 'required|max:200',
        ]);
        // storage/app/public/pictures下にランダムなファイル名で保存
        $post = Post::findOrFail($id);
        $post->fill($params)->save();
        $user = Auth::user();
        $replies = $post->replies()->get();
        return redirect()->action('PostController@show', $post->id);
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
        $post = Post::findOrFail($id);
        $community = Community::findOrFail($post->community_id);
        $post->replies()->delete();
        $post->delete();
        $posts = $community->posts()->get();
        return redirect()->action('CommunityController@show', $community);
    }
}
