<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productForm($id = null)
    {
        $product= Product::find($id);
        return view('backoffice.pages.products.product_form',compact('product'));
    }
    public function deleteProduct($id)
    {
        Product::where('id',$id)->delete();
        return back()->withStatus(__('Product successfully deleted. '));
    }
}