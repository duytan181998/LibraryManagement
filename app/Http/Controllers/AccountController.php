<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getLoginAdmin()
    {
        return view('admin.account.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $centificate=array(
            'username'=>$request['username'],
            'password'=>$request['password'],
        );
        if (Auth::attempt($centificate)){
            return redirect()->route('admin.getdashboard');
        }else{
            return redirect()->back()->with(['flash_status'=>'danger','flash_title'=>'Thất Bại','flash_mess'=>'Tên tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function getLogoutAdmin()
    {
        if (Auth::check()){
            Auth::logout();
            return redirect()->route('admin.getloginadmin')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Đăng Xuất Thành Công']);
        }
    }

    public function getProFileAdmin($id)
    {
        $user=User::findOrFail($id);
        return view('admin.account.profile',compact('user'));
    }
}
