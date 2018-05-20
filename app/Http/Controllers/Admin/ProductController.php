<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Cate_product;
use Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);

        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.create', compact('data'));
    }

    public function postCreate(ProductRequest $req)
    {
        $product = new Product;
        $product->name = $req['name'];
        $product->slug = str_slug($req['name']);
        $product->price = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position = $req['position'];
        $product->status = (is_null($req['status']) ? '0' : '1');
        $product->is_home = (is_null($req['is_home']) ? '0' : '1');
        $product->title = $req['title'];
        $product->description = $req['description'];
        $product->content = $req['content'];
        $product->content2 = $req['content2'];
        $product->title_seo = $req['title_seo'];
        $product->meta_key = $req['meta_key'];
        $product->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $product->image = ('/photos/'.$filename);

        } else{
            $product->image = ('/photos/avatar5.png');
        }
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function update($slug)
    {
        $data=Cate_product::select('id','name','parent_id')->get()->toArray();
        $product = Product::where('slug', $slug)->first();

        return view('admin.product.edit', compact('data', 'product'));
    }

    public function postUpdate($slug, Request $req)
    {
        $product = Product::where('slug', $slug)->first();
        $product->name = $req['name'];
        $product->slug = str_slug($req['name']);
        $product->price = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position = $req['position'];
        $product->status = (is_null($req['status']) ? '0' : '1');
        $product->is_home = (is_null($req['is_home']) ? '0' : '1');
        $product->title = $req['title'];
        $product->description = $req['description'];
        $product->content = $req['content'];
        $product->content2 = $req['content2'];
        $product->title_seo = $req['title_seo'];
        $product->meta_key = $req['meta_key'];
        $product->meta_des = $req['meta_des'];
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $product->image = ('/photos/'.$filename);

        } else{
            $product->image = ('/photos/avatar5.png');
        }
        $validatedData = $req->validate([
            'name' => 'required|unique:products,name,' .$product->id,
            'price' => 'numeric|nullable|min:0',
            'position' => 'numeric|nullable|min:0|unique:products,position,' .$product->id,
        ]);
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
