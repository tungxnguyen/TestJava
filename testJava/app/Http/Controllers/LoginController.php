<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
class LoginController  extends Controller
{
	public function getLogin(){
		return view('login');
	}
	public function postLogin(Request $request){
		$check = array('email'=>$request->email,'password'=>$request->password);
			if(Auth::attempt($check)){
			return redirect("/");
			}
				
			else{
				return redirect("/login");	
			}
		
		
	}
	public function postLogout(){
		Auth::logout();
		return redirect("/");
	}
	public function getAdd()
	{
		return view('personal');
	}
	public function postAdd(Request $request)
	{
		$data = $request->all();
		$this->validate($request,[
			'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'name' => 'required|min:3|max:255',
			'noidung' =>'required|min:10',
			
			
			
			
		],[
			'avatar.image' => 'Chọn avartar sản phẩm với định dạng ảnh',
			'avatar.mimes' => 'ảnh đại diện sản phẩm phải có 1 trong các định dạng jpeg,png,jpg,gif,svg',
			'avatar.max' => 'Dung lượng tối đa của ảnh là 2048 kb',
			'name.required' => 'Bạn chưa nhập tên sản phẩm',
			'name.min' => 'Tên sản phẩm phải có ít nhất 3 ký tự',
			'name.max' => 'Tên sản phẩm có tối đa 255 ký tự',
			
			
		]);	
		$user = new User;		
		if ($request->hasFile('avatar')) {
			$file = Input::file('avatar');
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$timestamp = str_replace([' ', ':', '-'], '', Carbon::now()->toDateTimeString());
			$name = $timestamp . '.' . $extension;
			$file->move(public_path($this->destinationPath), $name);
			$user->user_img = $this->destinationPath . $name;
		}
		else{
			$user->user_img = '/uploads/product/newproduct.jpg';
		}
		
		$user->fist_name = $data['name'];
		$user->last_name = $data['name_field'];
		$user->number_phone = $data['phone'];
			
		$user->save();
		return redirect()->route('home')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thành công']);
	}
}
