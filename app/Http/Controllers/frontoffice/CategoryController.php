<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categoryForm($id = null)
    {
        $category= Category::find($id);
        return view('backoffice.pages.categories.category_form',compact('category'));
    }
}
