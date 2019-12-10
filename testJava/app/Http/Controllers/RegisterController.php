<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Http\Request;
class RegisterController  extends Controller
{
	public function getRegister(){
		return view('dangky');
	}
	public function postRegister(Request $request){
	
		
		$data = $request->all();
		$passAgain = $data['passwordAgain'];
		$this->validate($request,[
			'name' => 'required',	
			'password' => 'required|min:8|max:32',
			'passwordAgain' => 'required|same:password',
			'email' => 'required|email|unique:users,email',
		],[
			
			'name.required' => 'Bạn chưa nhập tên người dùng',
			'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
			'name.max' => 'Tên người dùng chỉ được tối đa 255 ký tự',
			'password.required' => 'Bạn chưa nhập mật khẩu',
			'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
			'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
			'passwordAgain.same' => 'Mật khẩu nhập lại không đúng',
			'email.required' => 'Bạn chưa nhập Email',
			'email.email' => 'Bạn chưa nhập đúng định dạng Email', 
			'email.unique' => 'Email đã tồn tại',
		]);
		if($passAgain !== ""){
			$this->validate($request,[
			
				'passwordAgain' => 'required',
			
			],[
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu'
			]);
			
		}
		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']); 
		$user->save();
		
		return redirect()->route('getLogin')->with('thongbao','Ban da dang ki thanh cong');
	}
}
