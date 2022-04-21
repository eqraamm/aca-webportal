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

        $data = array(
            'ID' => session('ID')
        );
        //$responseSearchStoredData_GWP = APIMiddleware($data, 'SearchStoredData_GWP');
        //$responseSearchStoredData_LossRatio = APIMiddleware($data, 'SearchStoredData_LossRatio');
        // dd($responseSearchStoredData_GWP);
        return view('dashboard')->with('data', $responseSearchPolicy); 
        // if (session('Role') == 'AGENT'){
        //     return view('dashboard.dashboardAgent')->with(array('data_gwp' => $responseSearchStoredData_GWP,'data_lossratio' => $responseSearchStoredData_LossRatio)); 
        // }else{
        //     return view('dashboard')->with('data', $responseSearchPolicy); 
        // }
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

    public function getDataGWP(){
        $data = array(
            'ID' => session('ID')
        );
        $responseSearchStoredData_GWP = APIMiddleware($data, 'SearchStoredData_GWP');

        return $responseSearchStoredData_GWP;
    }

    public function getDataLossRatio(){
        $data = array(
            'ID' => session('ID')
        );
        $responseSearchStoredData_LossRatio = APIMiddleware($data, 'SearchStoredData_LossRatio');

        return $responseSearchStoredData_LossRatio;
    }

    public function refreshStoredData(){
        $data = array(
            'ID' => session('ID')
        );
        $responseStoredData = APIMiddleware($data, 'AsyncSearchStoredData');

        return $responseStoredData;
    }
}

