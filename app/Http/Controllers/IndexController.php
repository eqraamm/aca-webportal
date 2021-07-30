<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Request;
// use App\User;

class IndexController extends Controller
{

    public function index(){
        $data =array(
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => ''
        );
        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        //  dd($responseSearchPolicy);
         return view('dashboard')->with('data', $responseSearchPolicy); 
    }
}

