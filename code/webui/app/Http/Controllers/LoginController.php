<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
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

        if($request->input('username') == 'ali' && $request->input('password') == 'test'){
            $user = new User;
            $user->name = 'admin';
            Auth::login($user);
            
        }else{
            return view('login',['error'=>'Username and password are wrong!']);
        }

    }
}
