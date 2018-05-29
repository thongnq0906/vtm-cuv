<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Models\Product;

class ProductController extends Controller
{

    public function cateProductLv1()
    {
        $cate_product = Cate_product::where('status', 1)->where('parent_id', 0)->get();

        return view('frontend.products.cate_lv1', compact('cate_product'));
    }

    public function product($id)
    {
        $cate_product = Cate_product::where('parent_id', $id)->first();
        if(isset($cate_product))
        {
            $product = Product::where('status', 1)->where('cate_product_id', $cate_product->id)->orWhere('cate_product_id', $id)->get();
        }else{
            $product = Product::where('cate_product_id', $id)->get();
        }

        return view('frontend.products.cate_lv2', compact('product'));
    }

    public function detailProduct($id)
    {
        $product = Product::where('status', 1)->where('id', $id)->first();
        $involve_product = Product::where('cate_product_id', $product->id)->get();

        return view('frontend.products.detail_product', compact('product', 'involve_product'));
    }
}
