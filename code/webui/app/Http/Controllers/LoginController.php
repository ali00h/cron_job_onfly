<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login',['error' => false]);
    }

    public function auth(Request $request)
    {   
        $messages = [
            'username.*'    => 'Username can not be empty!',
            'password.*'     => 'Password can not be empty!'
        ];
        $validator = Validator::make($request->all(), [
            'username'    => 'required|string|min:3',
            'password'     => 'required|string|min:3'
        ], $messages);


        if ($validator->fails()) {
            return view('login',['error'=>$validator->errors()->first()]);          
        }        

        $LOGIN_USERNAME = env('LOGIN_USERNAME', '');
        $LOGIN_PASSWORD = env('LOGIN_PASSWORD', '');

        if($LOGIN_USERNAME == '' || $LOGIN_PASSWORD == ''){
            return view('login',['error'=>'Username or password has not been set in ENV!']);
        }

        if($request->input('username') == $LOGIN_USERNAME && $request->input('password') == $LOGIN_PASSWORD){

            $request->session()->put('authenticated', time());
            return redirect()->route('dashboard.index');
        }else{
            return view('login',['error'=>'Username and password are wrong!']);
        }

    }

    public function signout(Request $request){
        $request->session()->forget('authenticated'); 
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
