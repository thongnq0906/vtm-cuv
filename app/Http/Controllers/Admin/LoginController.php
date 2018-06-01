<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class LoginController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin';

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    public function index()
    {
        $administrator = User::all();

        return view('admin.administrator.index', compact('administrator'));
    }

    public function create()
    {
        return view('admin.administrator.create');
    }

    public function postCreate(UserRequest $data)
    {
        $administrator = new User;
        $administrator->name = $data['name'];
        $administrator->password = Hash::make($data['password']);
        $administrator->email = $data['email'];
        $administrator->status = (is_null($data['status']) ? '0' : '1');
        $administrator->save();

        return redirect()->route('admin.administrator.home');

    }
    public function getLogin()
    {
        return view('admin.administrator.login');
    }
    public function postLogin(Request $req)
    {
        $login = [
            'name' => $req->name,
            'password' => $req->password,
            'role' => 1,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('admin.index');
        }else {
            return redirect()->back()->with('message', 'Email hoặc mật khẩu không đúng');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.administrator.home');
    }
}
