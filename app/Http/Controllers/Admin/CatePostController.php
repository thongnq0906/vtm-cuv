<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_post;
use App\Http\Requests\Cate_postRequest;
use Image;
use File;

class CatePostController extends Controller
{
    public function index()
    {
        $cate_post = Cate_post::paginate(5);

        return view('admin/cate_post/index', compact('cate_post'));
    }

    public function create()
    {
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();

        return view('admin/cate_post/create', compact('data'));
    }

    public function postCreate(Cate_postRequest $req)
    {
        $cate_post = new Cate_post;
        $cate_post->name = $req['name'];
        $cate_post->parent_id = $req->parent_id;
        $cate_post->slug = str_slug($cate_post->name);
        $cate_post->description = $req['description'];
        $cate_post->position = $req['position'];
        $cate_post->status = (is_null($req['status']) ? '0' : '1');
        // dd($req->hasFile('image'));
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $cate_post->image = ('/photos/'.$filename);

        } else{
            $cate_post->image = ('/photos/avatar5.png');
        }
        $cate_post->save();

        return redirect()->route('admin.cate_post.home')->with('success','Thêm thành công');
    }

    public function update($slug)
    {
        $data=Cate_post::select('id','name','parent_id')->get()->toArray();
        $cate_post = Cate_post::where('slug', $slug)->first();

        return view('admin.cate_post.edit', compact('cate_post', 'data'));
    }

    public function postUpdate($slug, Request $req)
    {
        // $cate_product = Cate_product::findOrFail($slug);
        $cate_post = Cate_post::where('slug', $slug)->first();
        $cate_post->name = $req['name'];
        $cate_post->parent_id = $req->parent_id;
        $cate_post->slug = str_slug($cate_post->name);
        $cate_post->position = $req['position'];
        $cate_post->description = $req['description'];
        $cate_post->status = (is_null($req['status']) ? '0' : '1');
        // dd($req->hasFile('image'));
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(400,225)->save(public_path('/photos/'.$filename));

            $cate_post->image = ('/photos/'.$filename);

        } else{
            $cate_post->image = ('/photos/avatar5.png');
        }
        $validatedData = $req->validate([
            'name' => 'required|unique:cate_posts,name,' .$cate_post->id,
            'position' => 'numeric|nullable|min:0|unique:cate_posts,position,' .$cate_post->id,
        ]);
        $cate_post->save();

        return redirect()->route('admin.cate_post.home')->with('success','Sửa thành công');
    }

    public function destroy(Request $req)
    {
        Cate_post::where('id', $req['id'])->first()->delete();
        Cate_post::where('parent_id', $req['id'])->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
