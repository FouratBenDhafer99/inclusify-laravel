<?php

namespace App\Http\Controllers\frontoffice;

use \App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function newsfeed()
    {
        $posts = [
            (object)["id" => "33", "postvideo" => "", "postimage" => "post.png", "avater" => "user.png", 'user' => "Anthony Daugloi", 'time' => "2 hour ago", "des" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
            (object)["id" => "33", "postvideo" => "", "postimage" => "post.png", "avater" => "user.png", 'user' => "Anthony Daugloi", 'time' => "2 hour ago", "des" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
            (object)["id" => "33", "postvideo" => "", "postimage" => "post.png", "avater" => "user.png", 'user' => "Anthony Daugloi", 'time' => "2 hour ago", "des" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus."],
        ];

        return view('frontoffice.pages.base.newsfeed', ['posts' => $posts]);
    }

    public function friends()
    {
        return view('frontoffice.components.friends');
    }

    public function jobs()
    {
        $jobList = [
            (object)["imageUrl" => 'download7.png', "title" => 'Python Developer', "location" => 'support@gmail.com', "employment" => 'London, United Kingdom', "salary" => 'Part Time', "following" => '12000 -45000', "date" => '3 days ago',],
            (object)["imageUrl" => 'download4.png', "title" => 'Sass Developer', "location" => 'support@gmail.com', "employment" => 'London, United Kingdom', "salary" => 'Part Time', "following" => '44000 - 45000', "date" => '4 days ago',],
            (object)["imageUrl" => 'download6.png', "title" => 'Java Developer', "location" => 'support@gmail.com', "employment" => 'London, United Kingdom', "salary" => 'Part Time', "following" => '12000 -45000', "date" => '6 days ago',],
            (object)["imageUrl" => 'download5.png', "title" => 'React Developer', "location" => 'support@gmail.com', "employment" => 'London, United Kingdom', "salary" => 'Part Time', "following" => '12000 -45000', "date" => '9 days ago']
        ];
        return view('frontoffice.pages.base.job_list', compact('jobList'));
    }

    public function shop()
    {
        $productList = [
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
            (object)["imageUrl" => 'product.png', "name" => 'Textured Sleeveless Camisole', "price" => '449'],
        ];
        return view('frontoffice.pages.base.shop', compact('productList'));
    }

    public function product()
    {
        return view('frontoffice.pages.base.product',
            //['product'=>(object)['name'=>"Watch"]]
        );
    }
}
