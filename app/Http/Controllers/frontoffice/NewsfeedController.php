<?php

namespace App\Http\Controllers\frontoffice;

use \App\Http\Controllers\Controller;
use App\Models\Post;

class NewsfeedController extends Controller
{
    public function index()
    {
//        $posts=[
//            (object)["id"=>"33", "postvideo"=>"", "postimage"=>"post.png", "avater"=>"user.png", 'user'=>"Anthony Daugloi", 'time'=>"2 hour ago", "des"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
//            (object)["id"=>"33", "postvideo"=>"", "postimage"=>"post.png", "avater"=>"user.png", 'user'=>"Anthony Daugloi", 'time'=>"2 hour ago", "des"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
//            (object)["id"=>"33", "postvideo"=>"", "postimage"=>"post.png", "avater"=>"user.png", 'user'=>"Anthony Daugloi", 'time'=>"2 hour ago", "des"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
//        ];
        $posts = Post::all();
//        dd($posts);

        return view('frontoffice.pages.base.newsfeed', ['posts'=>$posts]);
    }
}
