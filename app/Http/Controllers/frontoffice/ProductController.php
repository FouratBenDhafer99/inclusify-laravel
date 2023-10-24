<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function productForm($id = null)
    {
        $product= Product::find($id);
        $categories = Category::all();
        
        return view('frontoffice.pages.market.product_form',compact('product', 'categories'));
    }
    public function addProduct(ProductRequest $request)
    {
        $category = Category::find($request->category_id);
        $category->products()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
        ]);
        return back()->withStatus(__('Product successfully added.'));
    }
    public function updateProduct($id, ProductRequest $request)
    {
        Product::where('id',$id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'image'=>$request->image ?? Product::find($id)->image,
            'category_id' => $request->category_id
        ]);
        return back()->withStatus(__('Product successfully updated. '));
    }

    public function deleteProduct($id)
    {
        Product::where('id',$id)->delete();
        return back()->withStatus(__('Product successfully deleted. '));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return view('frontoffice.pages.market.shop');
        }
        return view('frontoffice.pages.market.product', compact('product'));
    }
    
    public function session($id)
    {
        $product = Product::find($id);
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount'  => $product->quantity,
                    ],
                    'quantity'   =>  1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('product.list'),
            'cancel_url'  => route('product.list'),
        ]);

        return redirect()->away($session->url);
    }

}