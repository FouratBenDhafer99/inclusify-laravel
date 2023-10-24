<?php

namespace App\Http\Controllers\frontoffice;

use \App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class NewsfeedController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc("updated_at")->get();
//        dd($posts);
        $singlePostDetail = false;
        return view('frontoffice.pages.newsfeed.newsfeed', ['posts'=>$posts, 'singlePostDetail'=> $singlePostDetail]);
    }

    public function addPost(PostRequest $postRequest){
        Post::create(["description"=> $postRequest->description]);

        return back()->withStatus(__('Skill successfully added.'));

    }

    public function postdetails($postId){
        $post = Post::find($postId);
//        Post::create(["description"=> $postRequest->description]);
//
        $singlePostDetail = true;
        return view('frontoffice.pages.newsfeed.postdetails', ['post'=>$post, 'singlePostDetail'=> $singlePostDetail]);

    }

    public function addComment(CommentRequest $commentRequest, $id){
        $post  = Post::find($id);

        $post->comments()->create(["comment"=>$commentRequest->comment]);

        return back()->withStatus(__('Skill successfully added.'));

    }

    public function updatePost(PostRequest $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $post->update([
            'description' => $request->description,
        ]);

        return redirect()->route('newsfeed.detail', $postId);
    }


}
