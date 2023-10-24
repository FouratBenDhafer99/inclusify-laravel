<?php

namespace App\Http\Controllers\frontoffice;
use App\Http\Controllers\Controller;
class UtilPagesController extends Controller
{

    public function unauthorized(){
        return view('frontoffice.pages.unauthorized' );
    }

}
