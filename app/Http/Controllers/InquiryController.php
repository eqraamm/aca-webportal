<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\User;

class InquiryController extends Controller
{

    public function inquiry(){
        return view('inquiry');
        
        $data = array (
            'Branch' => ''
        );
        $responseBranch = APIMiddleware($data, 'SearchBranch');
    }

    
}