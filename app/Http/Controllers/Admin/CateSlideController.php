<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_slide;
use App\Http\Requests\Cate_slideRequest;
use File;

class CateSlideController extends Controller
{
    public function index()
    {
        $cate_slide = Cate_slide::paginate(5);

        return view('admin/cate_slide/index', compact('cate_slide'));
    }

    public function create()
    {
        $data=Cate_slide::select('id','name','parent_id')->get()->toArray();

        return view('admin/cate_slide/create', compact('data'));
    }

    public function postCreate(Cate_slideRequest $req)
    {
        $cate_slide = new Cate_slide;
        $cate_slide->name = $req['name'];
        $cate_slide->save();

        return redirect()->route('admin.cate_slide.home')->with('success','Thêm thành công');
    }

    public function update($id)
    {
        $data=Cate_slide::select('id','name','parent_id')->get()->toArray();
        $cate_slide = Cate_slide::where('id', $id)->first();

        return view('admin.cate_slide.edit', compact('cate_slide', 'data'));
    }

    public function postUpdate($id, Request $req)
    {
        // $cate_product = Cate_product::findOrFail($slug);
        $cate_slide = Cate_slide::where('id', $id)->first();
        $cate_slide->name = $req['name'];
        $validatedData = $req->validate([
            'name' => 'required|unique:cate_slides,name,' .$cate_slide->id,
        ]);
        $cate_slide->save();

        return redirect()->route('admin.cate_slide.home')->with('success','Sửa thành công');
    }

    public function destroy(Request $req)
    {
        Cate_slide::where('id', $req['id'])->first()->delete();
        Cate_slide::where('parent_id', $req['id'])->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}