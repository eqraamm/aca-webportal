<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Mail\EmailWebSurvey;
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

        session(['sidebar' => 'survey']);

        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        //  dd($responseSearchPolicy);
         return view('survey')->with('data', $responseSearchPolicy); 
    }

    public function SubmitSurvey(Request $request){
        // dd($request);
        $datasurvey = array(
            "PID" => $request->input('PID'),
            'SurveyDate' => date_format(date_create($request->input('SurveyDate')),"Y-m-d"),
            'SurveyTime' => $request->input('SurveyTime')
        );
        // dd($datasurvey);
        
        $responseSendSurvey = APIMiddleware($datasurvey, 'SubmitSurvey');
        // dd($responseSendSurvey);
        
        return response()->json(['code' => $responseSendSurvey['code'],'message'=>$responseSendSurvey['message'],'data' => $responseSendSurvey['Data']]);
    }

    public function SurveyOnline(){
        return view('Survey.VideoCall');
    }

    public function SaveSurveyDocument(Request $request){
        // dd($request);
        $policypic[] = $request->input('PolicyPIC');

        $datapic = array(
            'PID'=> $request->input('PID'),
            'PolicyPIC'=> $policypic
        );

        $responseSavePolicyDocument = APIMiddleware($datapic, 'SavePolicyDocument');

        // dd($responseSavePolicyDocument);
    }

    public function FinishSurvey(Request $request){
        dd($request);

        $survey = array(
            'PID'=> $request->input('PID'),
            'ActualDate'=> $request->input('ActualDate'),

        );

        $responseSavePolicyDocument = APIMiddleware($datapic, 'SavePolicyDocument');

    }
}

