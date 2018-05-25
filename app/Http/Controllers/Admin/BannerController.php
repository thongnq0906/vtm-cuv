<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Image;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::paginate(10);

        return view('admin.banner.index', compact('banner'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function postCreate(BannerRequest $req)
    {
        $banner = new Banner;
        $banner->name = $req['name'];
        $banner->status = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('photos/'.$filename));

            $banner->image = ('photos/'.$filename);

        } else{
            $banner->image = ('photos/avatar5.png');
        }
        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    public function update($id)
    {
        $banner = Banner::where('id', $id)->first();

        return view('admin.banner.edit', compact('banner'));
    }

    public function postUpdate($id, Request $req)
    {
        $banner = Banner::where('id', $id)->first();
        $banner->name = $req['name'];
        $banner->status = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $abc = $banner->image;
            Storage::delete($abc);
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('photos/'.$filename));
            $banner->image = ('photos/'.$filename);
        }
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Banner::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
