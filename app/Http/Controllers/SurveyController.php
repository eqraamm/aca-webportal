<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Request;
// use App\User;

class SurveyController extends Controller
{

    public function showsurvey(){
        $data =array(
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => ''
        );
        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        //  dd($responseSearchPolicy);
         return view('survey')->with('data', $responseSearchPolicy); 
    }
}

