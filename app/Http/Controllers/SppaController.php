<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\User;

class SppaController extends Controller
{
    
    public function Sppa(){
        // API branch
        $data = array (
            'Branch' => ''
        );
        $responseBranch = APIMiddleware($data, 'SearchBranch');

        // API CT
        $data = array(
            'CT' => ''
        );
        $responseCT = APIMiddleware($data, 'searchCT');

        // API Product
        $data = array(
            'CoverageID' => ''
        );
        $responseProduct = APIMiddleware($data, 'SearchCoverage');

        // API COB
        $data = array(
            'ProductID' => ''
        );
        $responseClass = APIMiddleware($data, 'SearchProduct');

        // API SEGMENT
        $data = array(
            'Segment' => ''
        );
        $responseSegment = APIMiddleware($data, 'SearchSegment');

        // API PolicyHolder and Insured
        $data = array(
            'ID' => ''
        );
        $responseProfile = APIMiddleware($data, 'SearchProfile');

        return view('sppa', array('Branch' => $responseBranch, 'CT' => $responseCT, 
            'Product' => $responseProduct, 'Profile' => $responseProfile, 'Segment' => $responseSegment,
            'Class' => $responseClass));
    }
       
        }




