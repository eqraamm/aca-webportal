<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;

class AuthController extends Controller
{
    //
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function showFormWelcome(){
        return view("dashboard");
    }
 
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
        ];
 
        $messages = [
            'username.required' => 'Username wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = array (
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        );

        $response  = APIMiddleware($data, 'Login');

        dd($response);
        
        if ($response['code'] == '200'){
            return redirect()->route('profile');
        }else{
            Session::flash('error', $response['message']);
            return redirect()->route('login');
        }
    }
        
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
