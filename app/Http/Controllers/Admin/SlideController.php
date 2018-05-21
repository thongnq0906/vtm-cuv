<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Cate_slide;
use App\Http\Requests\SlideRequest;
use Image;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function index()
    {
        $slide = Slide::paginate(10);

        return view('admin.slide.index', compact('slide'));
    }

    public function create()
    {
        $data=Cate_slide::select('id','name','parent_id')->get()->toArray();
        return view('admin.slide.create', compact('data'));
    }

    public function postCreate(SlideRequest $req)
    {
        $slide = new Slide;
        $slide->name = $req['name'];
        $slide->cate_slide_id = $req['cate_slide_id'];
        $slide->position = $req['position'];
        $slide->status = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/photos/'.$filename));

            $slide->image = ('/photos/'.$filename);

        } else{
            $slide->image = ('/photos/avatar5.png');
        }
        $slide->save();

        return redirect()->route('admin.slide.index');
    }

    public function update($id)
    {
        $data=Cate_slide::select('id','name','parent_id')->get()->toArray();
        $slide = Slide::where('id', $id)->first();

        return view('admin.slide.edit', compact('data', 'slide'));
    }

    public function postUpdate($id, Request $req)
    {
        $slide = Slide::where('id', $id)->first();
        $slide->name = $req['name'];
        $slide->cate_slide_id = $req['cate_slide_id'];
        $slide->position = $req['position'];
        $slide->status = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/photos/'.$filename));

            $slide->image = ('/photos/'.$filename);

        } else{
            $slide->image = ('/photos/avatar5.png');
        }
        $validatedData = $req->validate([
            'name' => 'required|unique:slides,name,' .$slide->id,
            'position' => 'numeric|nullable|min:0|unique:slides,position,' .$slide->id,
        ]);
        $slide->save();

        return redirect()->route('admin.slide.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Slide::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}

