<?php

namespace App\Http\Controllers\frontoffice;

use \App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class NewsfeedController extends Controller
{
    public function index()
    {

        $posts = Post::orderByDesc("updated_at")->get();

        $singlePostDetail = false;
        return view('frontoffice.pages.newsfeed.newsfeed', ['posts'=>$posts, 'singlePostDetail'=> $singlePostDetail]);
    }

    public function addPost(PostRequest $request){

        $post = new Post;
        $post->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
//            dd($imageName);
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a public directory
            $post->images = 'images/' . $imageName; // Save the image path in the database
        }


        $post->save();

        return back()->withStatus('Post successfully added.');

//        Post::create(["description"=> $postRequest->description]);
//
//        return back()->withStatus(__('Skill successfully added.'));

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

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);

        // Delete related comments or perform any other cleanup as needed
        $post->comments()->delete();

        $post->delete();

        return redirect()->route('newsfeed');
    }


}
