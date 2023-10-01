<?php

namespace App\Http\Controllers\frontoffice;
use \App\Http\Controllers\Controller;
class TestController extends Controller
{

    public function friends()
    {
        return view('frontoffice.components.friends');
    }
}
