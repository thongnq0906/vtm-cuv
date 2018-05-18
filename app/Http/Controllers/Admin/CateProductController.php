<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Http\Requests\Cate_productRequest;
use App\Http\Requests\UpdateCate_productRequest;
use Image;
use File;

class CateProductController extends Controller
{
    public function index()
    {
    	$cate_product = Cate_product::paginate(5);
    	// dd($cate_product);
    	return view('admin/cate_product/index', compact('cate_product'));
    }

    public function create()
    {
    	return view('admin/cate_product/create');
    }

    public function postCreate(Cate_productRequest $req)
    {
    	$cate_product = new Cate_product;
    	$cate_product->name = $req['name'];
    	$cate_product->slug = str_slug($cate_product->name);
    	$cate_product->description = $req['description'];
    	$cate_product->status = (is_null($req['status']) ? '0' : '1');
    	// dd($req->hasFile('image'));
    	if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $cate_product->image = ('/photos/'.$filename);

        } else{
            $cate_product->image = ('/photos/avatar5.png');
        }
    	$cate_product->save();
    	return redirect()->route('admin.cate_product.home')->with('success','Thêm thành công');
    }

    public function update($slug)
    {
    	$cate_product = Cate_product::where('slug', $slug)->first();
    	return view('admin.cate_product.edit', compact('cate_product'));
    }

    public function postUpdate($slug, UpdateCate_productRequest $req)
    {
    	// $cate_product = Cate_product::findOrFail($slug);
    	$cate_product = Cate_product::where('slug', $slug)->first();
    	$cate_product->name = $req['name'];
    	$cate_product->slug = str_slug($cate_product->name);
    	$cate_product->description = $req['description'];
    	$cate_product->status = (is_null($req['status']) ? '0' : '1');
    	// dd($req->hasFile('image'));
    	if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $cate_product->image = ('/photos/'.$filename);

        } else{
            $cate_product->image = ('/photos/avatar5.png');
        }
    	$cate_product->save();
    	return redirect()->route('admin.cate_product.home')->with('success','Sửa thành công');
    }

    public function destroy(Request $req)
    {
    	Cate_product::where('slug', $req['slug'])->first()->delete();

    	return redirect()->back()->with('success', 'Xóa thành công');
    }
}
