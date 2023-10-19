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
    public function addCategory(CategoryRequest $request)
    {
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        return back()->withStatus(__('Category successfully added.'));
    }
    public function updateCategory($id, CategoryRequest $request)
    {
        Category::where('id',$id)->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        return back()->withStatus(__('Category successfully updated. '));
    }

    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        return back()->withStatus(__('Category successfully deleted. '));
    }
}