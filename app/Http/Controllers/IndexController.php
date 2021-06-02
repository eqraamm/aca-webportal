<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Request;
// use App\User;

class IndexController extends Controller
{

    public function index(){
        return view('dashboard');

    }
    
    public function drop(){
        //hapus data
        $data =array(
            'ID' => '',
            'OwnerID' => 'aca_mo_1',
        );
        $response = APIMiddleware($data , 'DropProfile');
        return view('dashboard')->with('data', $response); 
    }

}

