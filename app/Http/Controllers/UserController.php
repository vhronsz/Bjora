<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Melakukan login
    public function doLogin(Request $req){
        $user = User::where('email',$req->email)->where("password",$req->password)->first();
        if($user === null){
            return redirect()->back()->withErrors("invalid email or password");
        }
        if($req->remember){
            Cookie::queue("user",$user,60);
        }
        Session::put("user",$user);
        return redirect('/home');
    }

    //Melakukan register
    public function doRegister(Request $req){
        $val = Validator::make($req->all(),[
            "name" => "required|max:100",
            "email" => "required|email",
            "password" => "required|min:6|alpha_num",
            "password_confirmation" => "required",
            "gender" => "required",
            "address" => "required",
            "image" => "required",
            "dob" => "required"
        ]);

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors()->all());
        }

        if($req->password !== $req->password_confirmation){
            return redirect()->back()->withErrors("password must same");
        }

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->dob = $req->dob;
        $user->role = "user";
        $user->save();

        if($req->image){
            $user = User::where("id",$user->id)->first();
            $path = "profile".$user->id;
            $file = \request()->file("image");
            $file->storeAs('/user',$path,['disk' => 'public']);
            $user->image = $path;
            $user->save();
        }
        return redirect("/");

    }

    //Melakukan update profile atau update user data
    public function updateUser(Request $req)
    {
        $val = Validator::make($req->all(),[
            "name" => "required|max:100",
            "email" => "required|email",
            "password" => "required|min:6|alpha_num",
            "password_confirmation" => "required",
            "gender" => "required",
            "address" => "required",
            "image" => "required",
            "dob" => "required"
        ]);

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors()->all());
        }

        if($req->password !== $req->password_confirmation){
            return redirect()->back()->withErrors("password must same");
        }

        $user =User::where("id",$req->id)->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->gender = $req->gender;
        $user->address = $req->address;
        $user->dob = $req->dob;
        $user->role = "user";
        $user->save();

        if($req->image){
            $user = User::where("id",$user->id)->first();
            $path = "profile".$user->id;
            $file = \request()->file("image");
            $file->storeAs('/user',$path,['disk' => 'public']);
            $user->image = $path;
            $user->save();
        }
        return redirect()->back();
    }

    //Mengambil data user
    public function fetchUser(){
            $user = User::paginate(10);
            return view("masterUser")->with("user",$user);
    }

    //Ambil data untuk user yang ingin diupdate
    public function getUserDataUpdate(Request $req){
        $user=User::where("id",$req->id)->first();
        return view("updateUser")->with("u",$user);
    }

    //Ambil data untuk user yg akan didelete
    public function getUserDataDelete(Request $req)
    {
        $user = User::where("id", $req->id)->first();
        $user->delete();
        return redirect()->back();
    }

    //Ambil data untuk profile page
    public function getprofileData($id){
        $user = User::where("id",$id)->first();
        return view("profile")->with("user",$user);
    }
}
