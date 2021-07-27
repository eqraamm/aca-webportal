<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Request;
// use App\User;

class IndexController extends Controller
{

    public function index(){
        $data =array(
            'ID' => 'aca_mo_1',
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => ''
        );
        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        // dd($responsePolicy);
         return view('dashboard')->with('data', $responseSearchPolicy); 
    }
}

