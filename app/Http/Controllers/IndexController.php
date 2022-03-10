<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
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

        session(['sidebar' => 'dashboard']);

        $responseSearchPolicy = APIMiddleware($data, 'SearchPolicy');
        //  dd($responseSearchPolicy);
        if (session('Role') == 'AGENT'){
            return view('dashboard.dashboardAgent')->with('data', $responseSearchPolicy); 
        }else{
            return view('dashboard')->with('data', $responseSearchPolicy); 
        }
    }

    public function modalWidget(Request $request){
        // dd($request);
        // $status = $request->get('status');
        // $pstatus = '';

        // switch ($status){
        //     case 'waiting':
        //         $pstatus = 'R';
        //         break;
        //     case ($status == 'submit' || $status == 'approved'):
        //         $pstatus = 'P';
        //         break;
        //     case 'cancel':
        //         $pstatus = 'C';
        //         break;
        // }
        // $data = array(
        //     'ID' => session('ID'),
        //     'RefNo' => '',
        //     'PStatus' => $pstatus,
        //     'Insured' => ''
        // );
        // $responseWidget = APIMiddleware($data, "SearchPolicy");
        // dd($responseWidget);
        // return $responseWidget;
        // return view('widgetmodal',array('dataWidget' => $responseWidget));
        return view('widgetmodal');
    }

    public function modalDetailPolicy($PID){
        $dataPolicy = array(
            'PID' => $PID
        );  

        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        // dd($responsePolicy);

        $dataProduct = array(
            'ProductID' => $responsePolicy['Data'][0]['ProductID']
        );
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');

        $dataCoverage = array(
            'CoverageID' => $responsePolicy['Data'][0]['CoverageID']
        );
        $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');
        // dd($responseCoverage);
        return view ('Dashboard.modalDetailPolicy', array('data' => $responsePolicy, 'dataproduct' => $responseProduct, 'datacoverage' => $responseCoverage));
    }
}

