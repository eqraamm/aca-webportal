<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\User;

class SppaController extends Controller
{
    public function showFormPolicy(){
        $dataPolicy = array(
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => '',
        );   
        $dataProduct = array(
            'ProductID' => ''
        );
        $dataCoverage = array(
            'CoverageID' => ''
        );
        $dataMO = array(
            'ID' => ''
        );
        $dataBranch = array(
            'Branch' => ''
        );
        $dataCurrency = array(
            'Currency' => ''
        );
        $dataProfile = array(
            'OwnerID' => session('ID')
        );
        $dataSegment = array(
            'Segment' => ''
        );
        $dataCT = array(
            'CT' => ''
        );

        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
        // dd($responseProduct);
        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
        // dd($responsePolicy);
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
        $dataProduct = $responseProduct['Data'];

        $dataProductgendtab = array(
            'ProductID' => ''
        );
        $fixarrProduct = APIMiddleware($dataProductgendtab, 'SearchGENDTABByProduct');

        $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');
        $responseMO = APIMiddleware($dataMO, 'SearchMO');
        $responseBranch = APIMiddleware($dataBranch, 'SearchBranch');
        $responseCurrency = APIMiddleware($dataCurrency, 'SearchCurrency');
        $responseProfile = APIMiddleware($dataProfile, 'SearchProfile');
        $responseSegment = APIMiddleware($dataSegment, 'SearchSegment');
        $responseCT = APIMiddleware($dataSegment, 'SearchCT');

        session(['sidebar' => 'sppa']);

        return view('Transaction.policy')
            ->with([
                'Policy' => $responsePolicy,
                'product' => $responseProduct,
                'coverage' => $responseCoverage,
                'mo' => $responseMO,
                'branch' => $responseBranch,
                'currency' => $responseCurrency,
                'profile' => $responseProfile,
                'gendtab' => $fixarrProduct,
                'segment' => $responseSegment,
                'ct' => $responseCT,
            ]);
    }

    // api save profile 
    public function PremiumSimulation(Request $request)
    {
        // dd($request);
        $dataPremiumSimulation = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'CoverageID' => ($request->input('LstCoverage') == null) ? '' : $request->input('LstCoverage'),
            'IncludeExtCovF' => true,
            'InceptionDate' => ($request->input('TxtSDate') == null) ? '' : $request->input('TxtSDate'),
            'ExpiryDate' => ($request->input('TxtEDate') == null) ? '' : $request->input('TxtEDate'),
            'NotApplyRateLoadingF' => ($request->input('CbxNotApplyRateLoading') == null) ? false : true,
            'PHolder' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'Currency' => ($request->input('LstCurrency') == null) ? '' : $request->input('LstCurrency'),
        );
        //Object Info
        $dataProduct = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct')
        );
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
        for ($i = 1; $i <= 15; ++$i) {
            $dataPremiumSimulation['FLDID'.$i] = $responseProduct['Data'][0]['FLDID'. $i];
            $dataPremiumSimulation['ValueID'.$i] = ($request->input('FLDID'.$i) == null) ? '' : $request->input('FLDID'.$i);
        }
        //Coverage Code
        for ($i = 0; $i < count($request->input('CoverageCode')); ++$i) {
            $dataPremiumSimulation['CoverageCode'.($i + 1)] = ($request->input('CoverageCode')[$i] == null) ? '' : $request->input('CoverageCode')[$i];
        }
        //Sum Insured
        for ($i = 1; $i <= 5; ++$i) {
            $dataPremiumSimulation['SI_'.$i] = ($request->input('SI'.$i) == null) ? 0 : $request->input('SI'.$i);
        }
        //Rate
        for ($i = 1; $i <= 10; ++$i) {
            $dataPremiumSimulation['Rate_'.$i] = 0;
        }
        //PCTLOSS
        for ($i = 1; $i <= 3; ++$i) {
            $dataPremiumSimulation['PCTLOSS_'.$i] = 0;
        }
        // dd($dataPremiumSimulation);
        $responsePremiumSimulation = APIMiddleware($dataPremiumSimulation, 'PremiumSimulation');

        return response()->json(['code' => $responsePremiumSimulation['code'],'message'=>$responsePremiumSimulation['message'],'data' => $responsePremiumSimulation['Data']]);
    }

    public function SavePoicyDocument(Request $request){
        // dd($request);
        $policypic = array();

        for ($i=0; $i < count($request->file('file')); $i++){
            $file = $request->file('file')[$i];
            $title = $file->getClientOriginalName();
            $image = base64_encode(file_get_contents($file));
            // dd($file);

            $temppolicypic = array(
                'ImageID' => '0',
                'TmpFile' => $image,
                'Title' => $title,
                'Remark' => '',
                'FileType' => ''
            );   
            $policypic[] = $temppolicypic;
        }
        
        // $policypic = array();
        // $policypic['ImageID'] = '0';
        // $policypic['TmpFile'] = 'tempfile';
        // $policypic['Title'] = 'title';
        // $policypic['Remark'] = 'Remark';
        // $policypic['FileType'] = 'FileType';

        $datapic = array(
            'PID'=> $request->input('PID'),
            'PolicyPIC'=> $policypic
        );
        // dd($datapic);
        // dd(response()->json($datapic));

        $responsePolicyDoc = APIMiddleware($datapic, 'SavePolicyDocument');

        return response()->json(['code' => $responsePolicyDoc['code'],'message'=>$responsePolicyDoc['message'],'data' => $responsePolicyDoc['Data']]);

    }

    public function showModalUpload(){
        return view('Transaction.modalupload');

    }

    public function GetNewPolicyNo(Request $request){
        dd($request);
    }

    public function SavePolicy(Request $request){
        $datapolicy = array(
            'PID' => ($request->input('TxtPID') == null) ? '' : $request->input('TxtPID'),
            'RefNo' => ($request->input('TxtRefNo') == null) ? '' : $request->input('TxtRefNo'),
            'PolicyHolder' => ($request->input('LstPHolder') == null) ? '' : $request->input('LstPHolder'),
            'InsuredName' => ($request->input('TxtName') == null) ? '' : $request->input('TxtName'),
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'CoverageID' => ($request->input('LstCoverage') == null) ? '' : $request->input('LstCoverage'),
            'InceptionDate' => ($request->input('TxtSDate') == null) ? '' : $request->input('TxtSDate'),
            'ExpiryDate' => ($request->input('TxtEDate') == null) ? '' : $request->input('TxtEDate'),
            'Currency' => ($request->input('LstCurrency') == null) ? '' : $request->input('LstCurrency'),
            'AID' => session('ID'),
            'BSTYPE' => ($request->input('LstBSTYPE') == null) ? '' : $request->input('LstBSTYPE'),
            'Fee' => ($request->input('TxtFee') == null) ? 0 : $request->input('TxtFee'),
            'FeeAmount' => ($request->input('TxtFeeAmount') == null) ? 0 : $request->input('TxtFeeAmount'),
            'Segment' => ($request->input('LstSegment') == null) ? '' : $request->input('LstSegment'),
            'Branch' => ($request->input('LstBranch') == null) ? '' : $request->input('LstBranch'),
            'WPC' => ($request->input('TxtWPC') == null) ? 0 : $request->input('TxtWPC'),
            'MO' => ($request->input('LstMO') == null) ? '' : $request->input('LstMO'),
            'Grace' => ($request->input('TxtGrace') == null) ? 0 : $request->input('TxtGrace'),
            'PolicyYearF' => ($request->input('cbxPolicyYearF') == null) ? false : true,
            'PolicyYearF' => ($request->input('CbxNeedEsignF') == null) ? false : true,
            'DefaultPayor' => ($request->input('LstPayor') == null) ? '' : $request->input('LstPayor'),
            'PPeriod' => ($request->input('TxtPPeriod') == null) ? 0 : $request->input('TxtPPeriod'),
            'CREFNO' => ($request->input('TxtQuotationNo') == null) ? '' : $request->input('TxtQuotationNo'),
            'Discount' => ($request->input('TxtDiscount') == null) ? 0 : $request->input('TxtDiscount'),
            'DisctPCT' => ($request->input('TxtDiscountPCT') == null) ? 0 : $request->input('TxtDiscountPCT'),
            'ADMFee' => ($request->input('TxtAdmFee') == null) ? 0 : $request->input('TxtAdmFee'),
            'StampDuty' => ($request->input('TxtStampDuty') == null) ? 0 : $request->input('TxtStampDuty'),
            'LPID' => '-1',
            'AType' => '',
            'PPID' => '-1',
            'CPID' => '-1',
            'ANO' => '-1',
            'RANO' => '-1',
            'NeedEmailF' => ($request->input('cbxAutoEmail') == null) ? false : true,
            'SType' => ($request->input('LstSType') == null) ? '' : $request->input('LstSType'),
            'PolicyNo' => ($request->input('TxtPolicyNo') == null) ? '' : $request->input('TxtPolicyNo'),
            'CertificateNo' => '',
            'TRANSHIPMENT' => ($request->input('CbxTranshipment') == null) ? false : true,
            'ATANDFROM' => ($request->input('TxtTransAtAndFrom') == null) ? '' : $request->input('TxtTransAtAndFrom'),
            'TRANSTO' => ($request->input('TRANSTO') == null) ? '' : $request->input('TRANSTO'),
            'CONVEYANCE' => ($request->input('TxtTransConveyence') == null) ? '' : $request->input('TxtTransConveyence'),
            'DEPARTDATE' => ($request->input('TxtDepartDate') == null) ? '' : $request->input('TxtDepartDate'),
            'VESSEL' => '',
            'VOYAGEFROM' => ($request->input('TxtVoyageFromID') == null) ? '' : $request->input('TxtVoyageFromID'),
            'VOYAGETO' => ($request->input('TxtVoyageToID') == null) ? '' : $request->input('TxtVoyageToID'),
            'Attention' => '',
            'Email' => '',
            'TRANSDATE' => '',
            'ARRIVALDATE' => '',
            'NotApplyRateLoadingF' => ($request->input('CbxNotApplyRateLoading') == null) ? false : true,
            'NCDATE' => '',
            'Payment_IRate' => 0,
            'Payment_DecreaseF' => 0,
            'Premium' => ($request->input('TxtPremium') == null) ? 0 : $request->input('TxtPremium'),
            'SPremium' => ($request->input('TxtSPremium') == null) ? '' : $request->input('TxtSPremium'),
            'PType' => '',
            'InsuredID' => ($request->input('LstInsured') == null) ? '' : $request->input('LstInsured')
        );

        //Additional Business Source
        for ($i = 1; $i <= 4; ++$i) {
            $datapolicy['AID'.$i] = ($request->input('LstAID'.$i) == null) ? '' : $request->input('LstAID'.$i);
            $datapolicy['BSTYPE'.$i] = ($request->input('LstBSTYPE'.$i) == null) ? '' : $request->input('LstBSTYPE'.$i);
            $datapolicy['Fee'.$i] = ($request->input('TxtFee'.$i) == null) ? '' : $request->input('TxtFee'.$i);
            $datapolicy['FeeAmount'.$i] = ($request->input('TxtFeeAmount'.$i) == null) ? '' : $request->input('TxtFeeAmount'.$i);
        }

        $dataProduct = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct')
        );
        //Object Info
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
        for ($i = 1; $i <= 30; ++$i) {
            $datapolicy['FLDID'.$i] = $responseProduct['Data'][0]['FLDID'. $i];
            if ($responseProduct['Data'][0]['FLDTAB'. $i] == true){
                $datapolicy['ValueID'.$i] = ($request->input('FLDID'.$i) == null) ? '' : $request->input('FLDID'.$i);   
            }else{
                $datapolicy['ValueDesc'.$i] = ($request->input('FLDID'.$i) == null) ? '' : $request->input('FLDID'.$i);   
            }
        }
        //Coverage Code
        for ($i = 0; $i < 5; ++$i) {
            $datapolicy['ClausulaCode'.($i + 1)] = ($request->input('ClausulaCode')[$i] == null) ? '' : $request->input('ClausulaCode')[$i];
        }
        //Sum Insured
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['SI_'.$i] = ($request->input('SI'.$i) == null) ? 0 : $request->input('SI'.$i);
        }
        //Rate
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['Rate_'.$i] = 0;
        }
        //PCTLOSS
        for ($i = 1; $i <= 3; ++$i) {
            $datapolicy['PCTLOSS_'.$i] = 0;
        }

        // dd($datapolicy);
        $responsePolicy = APIMiddleware($datapolicy, 'SavePolicy');
        
        return response()->json(['code' => $responsePolicy['code'],'message'=>$responsePolicy['message'],'data' => $responsePolicy['Data']]);
        // dd($responsePolicy);
    }

    public function SubmitPolicy(Request $request){
        // dd($request);

        $datapolicy = array(
            "PID" => ($request->input('PID') == null) ? '' : $request->input('PID')
        );
        // dd($datapolicy);
        $responseSubmitPolicy = APIMiddleware($datapolicy, 'SubmitPolicy');
        return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data']]);
    }

    public function DropPolicy(Request $request){

        $datapolicy = array(
            "PID" => ($request->input('PID') == null) ? '' : $request->input('PID')
        );
        $responseDropPolicy = APIMiddleware($datapolicy, 'DropPolicy');
        return response()->json(['code' => $responseDropPolicy['code'],'message'=>$responseDropPolicy['message'],'data' => $responseDropPolicy['Data']]);
    }

    public function showListPolicy(){
        $dataPolicy = array(
            'ID' => session('ID'),
            'RefNo' => '',
            'PStatus' => '',
            'Insured' => '',
        );  

        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
        return response()->json(['data' => $responsePolicy['Data']]);
    }

}




