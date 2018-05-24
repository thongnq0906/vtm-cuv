<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cate_Slide;
use App\Models\Slide;
use App\Models\Cate_post;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::where('status', 1)->first();
        $slide = Slide::where('status', 1)->where('dislay', 1)->get();
        $doitac = Slide::where('status', 1)->where('dislay', 2)->get();
        $sp_hoptac = Slide::where('status', 1)->where('dislay', 3)->get();
        $product = Product::where('status', 1)->where('is_home', 1)->get();
        return view('frontend.index', compact('banner', 'slide', 'product', 'doitac', 'sp_hoptac'));
    }
}
