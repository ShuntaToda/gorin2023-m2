<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view("login");
    }
    public function login (Request $request){
        $request->validate([
            "id" => "required",
            "pass" => "required"
        ]);

        if(Auth::attempt(["email"=> $request->id, "password" => $request->pass])){
            $request->session()->regenerate();
            return redirect(route("home"));
        }
        
        return redirect(route("login"))->with(["message" => "メールアドレスまたはパスワードが正しくありません"]);
    }
    public function logout (Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect(route("login"));
    }
}
