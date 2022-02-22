<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Exception;

class SppaController extends Controller
{
    public function showFormPolicy(){
        session(['sidebar' => 'sppa']);
        return view('Transaction.policy');
    }

    public function getlistMo(){
        $dataMO = array(
            'ID' => ''
        );
        $responseMO = APIMiddleware($dataMO, 'SearchMO');

        return $responseMO;
    }

    public function getlistbranch(){
        $dataBranch = array(
            'ID' => session('ID'),
            'Password' => session('Password')
        );
        $responseBranch = APIMiddleware($dataBranch, 'SearchListBranchByUser');

        return $responseBranch;
    }

    public function getlistcurrency(){
         $dataCurrency = array(
            'Currency' => ''
        );
        $responseCurrency = APIMiddleware($dataCurrency, 'SearchCurrency');

        return $responseCurrency;
    }

    public function getlistprofile(){
       $dataProfile = array(
            'OwnerID' => session('ID')
        );
        $responseProfile = APIMiddleware($dataProfile, 'SearchProfile');

       return $responseProfile;
    }

    public function getlistsegment(){
        $dataSegment = array(
            'ID' => session('ID'),
            'Password' => session('Password')
        );
        $responseSegment = APIMiddleware($dataSegment, 'SearchListSegmentByUser');

        return $responseSegment;
    }

    public function getlistct(){
        $dataCT = array(
            'CT' => ''
        );
        $responseCT = APIMiddleware($dataCT, 'SearchCT');

        return $responseCT;
    }

    public function getlistagent(){
        $dataAgent = array(
            'ID' => ''
        );
        $responseAgent = APIMiddleware($dataAgent, 'SearchAgentProfile');

        return $responseAgent;
    }

    public function getlistproduct(){
        $dataProduct = array(
            'ProductID' => ''
        );
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');

        return $responseProduct;
    }

    public function getlistcoverage(){
        $dataCoverage = array(
            'CoverageID' => ''
        );
        $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');

        return $responseCoverage;
    }

    public function getlistgendtab(){
        $dataProductgendtab = array(
            'ProductID' => ''
        );
        $fixarrProduct = APIMiddleware($dataProductgendtab, 'SearchGENDTABByProduct');

        return $fixarrProduct;
    }

    public function PremiumSimulation(Request $request)
    {
        // dd($request);
        $dataPremiumSimulation = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'CoverageID' => ($request->input('LstCoverage') == null) ? '' : $request->input('LstCoverage'),
            'IncludeExtCovF' => true,
            'InceptionDate' => ($request->input('TxtSDate') == null) ? '' : date_format(date_create($request->input("TxtSDate")),"Y-m-d"),
            'ExpiryDate' => ($request->input('TxtEDate') == null) ? '' : date_format(date_create($request->input("TxtEDate")),"Y-m-d"),
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
        $IncludeExtCovF = ($request->input('IncludeExtCoverF') == null) ? false : true;
        // return $IncludeExtCovF;
        if ($IncludeExtCovF){
            $dataPremiumSimulation['IncludeExtCovF'] = $IncludeExtCovF;
        }else{
            //Coverage Code
            for ($i = 0; $i < count($request->input('CoverageCode')); ++$i) {
                $dataPremiumSimulation['CoverageCode'.($i + 1)] = ($request->input('CoverageCode')[$i] == null) ? '' : $request->input('CoverageCode')[$i];
            }
        }
        //Sum Insured
        // for ($i = 1; $i <= 5; ++$i) {
        //     $dataPremiumSimulation['SI_'.$i] = ($request->input('SI'.$i) == null) ? 0 : $request->input('SI'.$i);
        // }
        //Sum Insured
        // for ($i = 1; $i <= 10; ++$i) {
        //     $tempsi = str_replace('.','',str_replace(',','',$request->input('SI'.$i)));
        //     // return $tempsi;
        //     if (str_contains($tempsi,',')){
        //         $SI = substr($tempsi,0,strlen($tempsi) - 2);
        //     }else{
        //         $SI = $tempsi;
        //     }
        //     // return $SI;
        //     $dataPremiumSimulation['SI_'.$i] = ($SI == null) ? 0 : $SI;
        // }

        //Sum Insured
        for ($i = 1; $i <= 10; ++$i) {
            $tempsi = str_replace('.','',str_replace(',','',$request->input('SI'.$i)));
            if (str_contains($request->input('SI'.$i),'.')){
                $SI = substr($tempsi,0,strlen($tempsi) - 2);
            }else{
                $SI = $tempsi;
            }
            $dataPremiumSimulation['SI_'.$i] = ($SI == null) ? 0 : $SI;
        }
        //Rate
        for ($i = 1; $i <= 10; ++$i) {
            $dataPremiumSimulation['Rate_'.$i] =  ($request->input('Rate'.$i) == null) ? 0 : $request->input('Rate'.$i);
        }
        //StrPCTIndemnity
        for ($i = 1; $i <= 100; ++$i) {
            $dataPremiumSimulation['PCTIndemnity_'.$i] =  ($request->input('PCTIndemnity_'.$i) == null) ? 0 : $request->input('PCTIndemnity_'.$i);
        }
        // PCTLOSS
        for ($i = 1; $i <= 3; ++$i) {
            $dataPremiumSimulation['PCTLOSS_'.$i] = 0;
        }
        // dd($dataPremiumSimulation);
        $responsePremiumSimulation = APIMiddleware($dataPremiumSimulation, 'PremiumSimulation');
        // dd($responsePremiumSimulation);
        return response()->json(['code' => $responsePremiumSimulation['code'],'message'=>$responsePremiumSimulation['message'],'data' => $responsePremiumSimulation['Data']]);
    }

    public function SavePolicyDocument(Request $request){
        // dd($request);
        // sleep(10);
        $PID = $request->input('PID');
        $policypic = array();

        $remarks = ($request->input('Remarks') == null) ? '' : $request->input('Remarks');
        $title = ($request->input('Title') == null) ? '' : $request->input('Title');

        // for ($i=0; $i < count($request->file('file')); $i++){
        //     $file = $request->file('file')[$i];
        //     $title = $file->getClientOriginalName();
        //     $filetype = $file->getClientOriginalExtension();
        //     $image = base64_encode(file_get_contents($file));
        //     // dd($file);

        //     $temppolicypic = array(
        //         'ImageID' => '0',
        //         'TmpFile' => $image,
        //         'Title' => $title,
        //         'Remark' => $remarks,
        //         'FileType' => $filetype
        //     );   
        //     $policypic[] = $temppolicypic;
        // }
        
        $file = $request->file('file');
        // $title = $file->getClientOriginalName();
        $filetype = $file->getClientOriginalExtension();
        $image = base64_encode(file_get_contents($file));
        // dd($file);

        $temppolicypic = array(
            'ImageID' => '0',
            'TmpFile' => $image,
            'Title' => $title,
            'Remark' => $remarks,
            'FileType' => $filetype
        );   
        $policypic[] = $temppolicypic;

        $datapic = array(
            'PID'=> $PID,
            'PolicyPIC'=> $policypic
        );

        // return $datapic;
        // dd($datapic);
        // dd(response()->json($datapic));

        $responsePolicyDoc = APIMiddleware($datapic, 'SavePolicyDocument');

        $dataPolicyDoc = array(
            'PID' => $PID
        );

        $responseListPolicyDoc = APIMiddleware($dataPolicyDoc,'SearchPolicyDocument');

        return response()->json(['code' => $responsePolicyDoc['code'],'message'=>$responsePolicyDoc['message'],'data' => $responsePolicyDoc['Data'], 'listpolicydoc' => $responseListPolicyDoc]);

    }

    public function showModalUpload(){
        return view('Transaction.modalupload');
    }

    public function GetNewPolicyNo(Request $request){
        $datapolicy = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'AID' => session('ID'),
            'Branch' => ($request->input('LstBranch') == null) ? '' : $request->input('LstBranch')
        );
        $responsePolicyNo = APIMiddleware($datapolicy, 'NewPolicyNo');

        return response()->json(['code' => $responsePolicyNo['code'],'message'=>$responsePolicyNo['message'],'PolicyNo' => $responsePolicyNo['Data']]);
        
    }

    public function SavePolicy(Request $request){
        // dd($request->input('ClausulaCode'));
        $temppremium = str_replace('.','',str_replace(',','',$request->input('TxtPremium')));
        $premium = substr($temppremium,0,strlen($temppremium) - 2);
        $datapolicy = array(
            'PID' => ($request->input('TxtPID') == null) ? '' : $request->input('TxtPID'),
            'RefNo' => ($request->input('TxtRefNo') == null) ? '' : $request->input('TxtRefNo'),
            'PolicyHolder' => ($request->input('LstPHolder') == null) ? '' : $request->input('LstPHolder'),
            'InsuredName' => ($request->input('TxtName') == null) ? '' : $request->input('TxtName'),
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct'),
            'CoverageID' => ($request->input('LstCoverage') == null) ? '' : $request->input('LstCoverage'),
            'InceptionDate' => ($request->input('TxtSDate') == null) ? '' : date_format(date_create($request->input("TxtSDate")),"Y-m-d"),
            'ExpiryDate' => ($request->input('TxtEDate') == null) ? '' : date_format(date_create($request->input("TxtEDate")),"Y-m-d"),
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
            'NeedESignF' => ($request->input('CbxNeedEsignF') == null) ? false : true,
            'DefaultPayor' => ($request->input('LstPayor') == null) ? '' : $request->input('LstPayor'),
            'PPeriod' => ($request->input('LstPPeriod') == null) ? 0 : $request->input('LstPPeriod'),
            'CREFNO' => ($request->input('TxtQuotationNo') == null) ? '' : $request->input('TxtQuotationNo'),
            'Discount' => ($request->input('TxtDiscount') == null) ? 0 : $request->input('TxtDiscount'),
            'DiscPCT' => ($request->input('TxtDiscountPCT') == null) ? 0 : $request->input('TxtDiscountPCT'),
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
            'Premium' => ($premium == null) ? 0 : $premium,
            'SPremium' => ($request->input('TxtSPremium') == null) ? '' : $request->input('TxtSPremium'),
            'PType' => '',
            'InsuredID' => ($request->input('LstInsured') == null) ? '' : $request->input('LstInsured'),
            'NeedSurveyF' => ($request->input('CbxNeedSurveyF') == null) ? false : true,
            'Correspondence_Attention' => ($request->input('TxtAttention') == null) ? '' : $request->input('TxtAttention'),
            'Correspondence_Address' => ($request->input('TxtCorAddress') == null) ? '' : $request->input('TxtCorAddress'),
            'Correspondence_Email' => ($request->input('TxtCorEmail') == null) ? '' : $request->input('TxtCorEmail'),
            'CT' => ($request->input('LstCT') == null) ? '' : $request->input('LstCT'),
            'SubmitDateF' => ($request->input('CbxSubmitDate') == null) ? false : true,
            'InforceF' => ($request->input('CbxAutoInforce') == null) ? false : true,
            'Payment_Term' => ($request->input('LstPayment_Term') == null) ? 0 : $request->input('LstPayment_Term'),
            'Payment_Tenor' => ($request->input('TxtPayment_Tenor') == null) ? 0 : $request->input('TxtPayment_Tenor'),
        );

        $CommBy = $request->input('CommBy');
        // dd($CommBy);

        //Additional Business Source
        for ($i = 1; $i <= 4; ++$i) {
            $datapolicy['AID_'.$i] = ($request->input('LstAID_'.$i) == null) ? '' : $request->input('LstAID_'.$i);
            $datapolicy['BSTYPE_'.$i] = ($request->input('LstBSType_'.$i) == null) ? '' : $request->input('LstBSType_'.$i);
            if ($CommBy == 'CommAmount'){
                $datapolicy['FeeAmount_'.$i] = ($request->input('TxtFeeAmount_'.$i) == null) ? 0 : $request->input('TxtFeeAmount_'.$i);
            }else{
                $datapolicy['Fee_'.$i] = ($request->input('TxtFee_'.$i) == null) ? 0 : $request->input('TxtFee_'.$i);
            }
        }

        $dataProduct = array(
            'ProductID' => ($request->input('LstProduct') == null) ? '' : $request->input('LstProduct')
        );
        //Object Info
        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
        // dd($responseProduct);
        for ($i = 1; $i <= 30; ++$i) {
            $datapolicy['FLDID'.$i] = $responseProduct['Data'][0]['FLDID'. $i];
            if ($responseProduct['Data'][0]['FLDTAB'. $i] == true){
                $datapolicy['ValueID'.$i] = ($request->input('FLDID'.$i) == null) ? '' : $request->input('FLDID'.$i);   
                $datapolicy['ValueDesc'.$i] = ($request->input('ValueDesc'.$i) == null) ? '' : strtoupper($request->input('ValueDesc'.$i));
            }else{
                $datapolicy['ValueDesc'.$i] = ($request->input('FLDID'.$i) == null) ? '' : strtoupper($request->input('FLDID'.$i));   
            }
        }
        //Clausula Code
        if ($request->input('ClausulaCode') != null){
            $ClausulaCode = '';
            $datapolicy['ClausulaCodeF'] = true;
            for ($i = 0; $i < count($request->input('ClausulaCode')); ++$i) {
                if ($ClausulaCode == ''){
                    $ClausulaCode = ($request->input('ClausulaCode')[$i] == null) ? '' : $request->input('ClausulaCode')[$i];
                }else{
                    $ClausulaCode = ($request->input('ClausulaCode')[$i] == null) ? $ClausulaCode : $ClausulaCode.','.$request->input('ClausulaCode')[$i];
                }
            }
            $datapolicy['Clausulacode1'] = $ClausulaCode;
            // dd($ClausulaCode);
        }
        
        //Sum Insured
        for ($i = 1; $i <= 10; ++$i) {
            $tempsi = str_replace('.','',str_replace(',','',$request->input('SI'.$i)));
            if (str_contains($request->input('SI'.$i),'.')){
                $SI = substr($tempsi,0,strlen($tempsi) - 2);
            }else{
                $SI = $tempsi;
            }
            $datapolicy['SI_'.$i] = ($SI == null) ? 0 : $SI;
        }

        //hardcode sementara
        // switch ($datapolicy['CoverageID']){
        //     case 'OTO-01A':
        //         if ($datapolicy['SI_1'] < 100000001){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kendaraan Bermotor Below Minimum 100.000.000','data' => []]);
        //         }else if ($datapolicy['SI_2'] < 25000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Tanggung Jawab Hukum Pihak Ketiga Below Minimum 25.000.000','data' => []]);
        //         }
        //         break;                
        //     case 'OTO-02':
        //         if ($datapolicy['SI_1'] < 100000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kendaraan Bermotor Below Minimum 100.000.000','data' => []]);
        //         }else if ($datapolicy['SI_2'] < 50000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Tanggung Jawab Hukum Pihak Ketiga Below Minimum 50.000.000','data' => []]);
        //         }else if($datapolicy['SI_3'] < 10000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kecelakaan Diri Pengemudi Below Minimum 10.000.000','data' => []]);
        //         }else if($datapolicy['SI_4'] < 10000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kecelakaan Diri Penumpang Below Minimum 10.000.000','data' => []]);
        //         }
        //         break;
        //     case 'OTO-03':
        //         if ($datapolicy['SI_1'] < 100000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kendaraan Bermotor Below Minimum 100.000.000','data' => []]);
        //         }else if ($datapolicy['SI_2'] < 75000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Tanggung Jawab Hukum Pihak Ketiga Below Minimum 75.000.000','data' => []]);
        //         }else if($datapolicy['SI_3'] < 10000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured ecelakaan Diri Pengemudi Below Minimum 10.000.000','data' => []]);
        //         }else if($datapolicy['SI_4'] < 10000000){
        //             return response()->json(['code' => '400','message'=> 'Save Policy Failed. Sum Insured Kecelakaan Diri Penumpang Below Minimum 10.000.000','data' => []]);
        //         }
        //         break;
        // }

        //Rate
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['Rate_'.$i] = ($request->input('Rate'.$i) == null) ? 0 : $request->input('Rate'.$i);
        }

        //Deductible Amount
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['DEDUCTIBLE'.$i] = ($request->input('FixedMin'.$i) == null) ? 0 : $request->input('FixedMin'.$i);
        }

        //Deductible % of TSI
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['DEDPCTTSI'.$i] = ($request->input('DEDPCTTSI'.$i) == null) ? 0 : $request->input('DEDPCTTSI'.$i);
        }

        //Deductible % of Claim
        for ($i = 1; $i <= 10; ++$i) {
            $datapolicy['DEDPCTCL'.$i] = ($request->input('DEDPCTCL'.$i) == null) ? 0 : $request->input('DEDPCTCL'.$i);
        }

        //PCTLOSS
        for ($i = 1; $i <= 3; ++$i) {
            $datapolicy['PCTLOSS_'.$i] = 0;
        }

        //StrPCTIndemnity
        for ($i = 1; $i <= 100; ++$i) {
            $datapolicy['PCTIndemnity_'.$i] =  ($request->input('PCTIndemnity_'.$i) == null) ? 0 : $request->input('PCTIndemnity_'.$i);
            if ($datapolicy['PCTIndemnity_'.$i] != 0){
                $datapolicy['PCTIndemnityF'] = true;
            }
        }

        // dd($datapolicy);

        $responsePolicy = APIMiddleware($datapolicy, 'SavePolicy');

        // dd($responsePolicy);

        if ($responsePolicy['code'] == '200'){
            $dataPolicy = array(
                'PID' => $responsePolicy['Data'][0]['PID']
            );
            
            $responseValidate = APIMiddleware($dataPolicy, 'ValidatePolicy');
            // dd($responseValidate);
            if ($responseValidate['code'] == '400'){
                return response()->json(['code' => $responseValidate['code'],'message'=>$responseValidate['message'],'data' => []]);
            }
            
            $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
    
            return response()->json(['code' => $responsePolicy['code'],'message'=>$responsePolicy['message'],'data' => $responsePolicy['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responsePolicy['code'],'message'=>$responsePolicy['message'],'data' => $responsePolicy['Data']]);
        }
    }

    public function SubmitPolicy(Request $request){

        // dd($request);
        $PID = $request->input('PID');
        $datapolicy = array(
            "PID" => ($PID == null) ? '' : $PID,
            "SubmitDateF" => ($request->input('SubmitDateF') == "true") ? true : false,
            'UserName' => session('ID'),
            'Password' => session('Password')
        );
        // dd($datapolicy);
        $responseSubmitPolicy = APIMiddleware($datapolicy, 'SubmitPolicy');

        return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data']]);

        // if ($responseSubmitPolicy['code'] == '200'){
        //     $dataPolicy = array(
        //         'PID' => $PID
        //     );  
        //     $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');

        //     // return $listpolicy;
    
        //     return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data'], 'listpolicy' => $listpolicy]);
        // }else{
        //     return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data']]);
        // }
    }

    public function DropPolicy(Request $request){

        $datapolicy = array(
            "PID" => ($request->input('PID') == null) ? '' : $request->input('PID')
        );
        $responseDropPolicy = APIMiddleware($datapolicy, 'DropPolicy');

        if ($responseDropPolicy['code'] == '200'){
            $dataPolicy = array(
                'ID' => session('ID'),
                'RefNo' => '',
                'PStatus' => '',
                'Insured' => '',
            );  
            $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
    
            return response()->json(['code' => $responseDropPolicy['code'],'message'=>$responseDropPolicy['message'],'data' => $responseDropPolicy['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responseDropPolicy['code'],'message'=>$responseDropPolicy['message'],'data' => $responseDropPolicy['Data']]);
        }
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

    public function getDetailPolicy(Request $request){
        // dd($request->get('PID'));
        $PID = $request->get('PID');
        $dataPolicy = array(
            'PID' => $PID
        );  

        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        // return $responseDoc;
        // return response()->json($responsePolicy);
        return $responsePolicy;
    }

    public function PremiumSimulationDoc($dataPolicy){
        // dd($dataPolicy);
        $dataPremiumSimulation = array(
            'ProductID' => $dataPolicy[0]['ProductID'],
            'CoverageID' => $dataPolicy[0]['CoverageID'],
            'IncludeExtCovF' => true,
            'InceptionDate' => date_format(date_create($dataPolicy[0]['InceptionDate']),"Y-m-d"),
            'ExpiryDate' => date_format(date_create($dataPolicy[0]['ExpiryDate']),"Y-m-d"),
            'NotApplyRateLoadingF' => $dataPolicy[0]['NotApplyRateLoadingF'],
            'PHolder' => $dataPolicy[0]['PolicyHolder'],
            'Currency' => $dataPolicy[0]['Currency'],
        );
        // dd($PremiumSimulationDoc);

        //Object Info
        for ($i = 1; $i <= 15; ++$i) {
            $dataPremiumSimulation['FLDID'.$i] = $dataPolicy[0]['FLDID'. $i];
            $dataPremiumSimulation['ValueID'.$i] = ($dataPolicy[0]['ValueID'.$i] == '') ? $dataPolicy[0]['ValueDesc'.$i] : $dataPolicy[0]['ValueID'.$i];
        }

        // if (!$IncludeExtCovF){
        //     //Coverage Code
        //     for ($i = 0; $i < 20; ++$i) {
        //         $dataPremiumSimulation['CoverageCode'.($i + 1)] = $dataPolicy[0]['CoverageCode'.$i];
        //     }
        // }
        //Sum Insured
        for ($i = 1; $i <= 5; ++$i) {
            $dataPremiumSimulation['SI_'.$i] = $dataPolicy[0]['SI_'.$i];
        }
        //Rate
        for ($i = 1; $i <= 10; ++$i) {
            $dataPremiumSimulation['RATE_'.$i] = $dataPolicy[0]['RATE_'.$i];
        }
        //StrPCTIndemnity
        for ($i = 1; $i <= 100; ++$i) {
            $dataPremiumSimulation['PCTIndemnity_'.$i] = $dataPolicy[0]['PCTIndemnity_'.$i];
        }
        //PCTLOSS
        for ($i = 1; $i <= 3; ++$i) {
            $dataPremiumSimulation['PCTLOSS_'.$i] = 0;
        }
        // dd($dataPremiumSimulation);
        $responsePremiumSimulation = APIMiddleware($dataPremiumSimulation, 'PremiumSimulation');
        // dd($responsePremiumSimulation);
        return $responsePremiumSimulation;
    }

    public function TempSubmitPolicy(Request $request){

        $datapolicy = array(
            "PID" => ($request->input('PID') == null) ? '' : $request->input('PID')
        );

        $responseSubmitPolicy = APIMiddleware($datapolicy, 'temporarySubmitPolicy');

        if ($responseSubmitPolicy['code'] == '200'){
            $dataPolicy = array(
                'ID' => session('ID'),
                'RefNo' => '',
                'PStatus' => '',
                'Insured' => '',
            );  
            $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
    
            return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responseSubmitPolicy['code'],'message'=>$responseSubmitPolicy['message'],'data' => $responseSubmitPolicy['Data']]);
        }
    }

    public function RevisePolicy(Request $request){
        $PID = $request->input('PID');
        $datapolicy = array(
            "PID" => ($PID == null) ? '' : $PID
        );

        $responseRevisePolicy = APIMiddleware($datapolicy, 'RevisePolicy');
        
        if ($responseRevisePolicy['code'] == '200'){
            $dataPayload = array(
                "PID" => $responseRevisePolicy['Data'][0]['PID']
            );
            $responseCalculate = APIMiddleware($dataPayload, 'CalculatePolicy');

            // return $responseCalculate;

            // $dataPolicy = array(
            //     'ID' => session('ID'),
            //     'RefNo' => '',
            //     'PStatus' => '',
            //     'Insured' => '',
            // );  
            $listpolicy = APIMiddleware($dataPayload, 'SearchPolicyByPID');
    
            return response()->json(['code' => $responseRevisePolicy['code'],'message'=>$responseRevisePolicy['message'],'data' => $responseRevisePolicy['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responseRevisePolicy['code'],'message'=>$responseRevisePolicy['message'],'data' => $responseRevisePolicy['Data']]);
        }
    }

    public function SubmitPolicyConfirmation(Request $request){

        $PID = $request->input('PID');
        $parameters = array(
            'ID' => session('ID'),
            'RefNo' => ($request->input('RefNo') == null) ? '' : $request->input('RefNo'),
            'PID' => ($PID == null ? '' : $PID),
            'imagettd' => '',
            'name' => '',
            'option_sengketa' => '',
            'kondisi_kendaraan' => '',
            'tempat_survey' => '',
        );
        // return $parameters;

        // $encryptParam= Crypt::encrypt($parameters);
        $url = route('sppadoc', ['data' => $parameters]);
        
        // $url = route('sppadoc', ['data' => $encryptParam]);

        // return $url;

        $datapolicy = array(
            "PID" => ($PID == null) ? '' : $PID,
            "UrlESign" => $url
        );

        // $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

        // $shortURLObject = $builder->destinationUrl($url)->singleUse()->make();
        // // return $shortURLObject;
        // $shortURL = $shortURLObject->default_short_url;

        // return $shortURL;
        
        $responsePolicy = APIMiddleware($datapolicy, 'SubmitPolicyConfirmation');
        
        if ($responsePolicy['code'] == '200'){
            $dataPolicy = array(
                'PID' => $PID
            );  
            $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
    
            return response()->json(['code' => $responsePolicy['code'],'message'=>$responsePolicy['message'],'data' => $responsePolicy['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responsePolicy['code'],'message'=>$responsePolicy['message'],'data' => $responsePolicy['Data']]);
        }
    }

    public function getPolicyDoc(Request $request){
        // dd($request);
        $requestGet = $request->get('data');
        
        $PID = $requestGet['PID'];
        
        $dataPolicy = array(
            'PID' => $PID
        ); 

        // dd($dataPolicy);
        
        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        $NotApplyRateLoadingF = $responsePolicy['Data'][0]['NotApplyRateLoadingF'];

        // dd($NotApplyRateLoadingF);
        
        // return $responsePolicy;
        $dateInception = tgl_indo($responsePolicy['Data'][0]['InceptionDate']);
        $dateExpiry = tgl_indo($responsePolicy['Data'][0]['ExpiryDate']);
        $dateNow = tgl_indo(date("m/d/Y"));
        $dateExpiryDocument=date_create(date("Y-m-d"));
        date_add($dateExpiryDocument,date_interval_create_from_date_string("14 days"));
        $dateExpiryDocument = date_format($dateExpiryDocument,"d F Y");

        if ($responsePolicy['code'] == '200'){
            //Data
            $data = array (
                'ID' => $responsePolicy['Data'][0]['InsuredID'],
                'OwnerID' => $requestGet['ID'],
            );
            $responseSearchProfile = APIMiddleware($data, 'SearchProfile');

            $dataProduct = array(
                'ProductID' => $responsePolicy['Data'][0]['ProductID']
            );

            $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');

            $dataCoverage = array(
                'CoverageID' => $responsePolicy['Data'][0]['CoverageID']
            );
            $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');

            // dd($responseCoverage);

            $responsePremiumSimulation = $this->PremiumSimulationDoc($responsePolicy['Data'], $responseProduct);
            // dd($responsePremiumSimulation);

            $startdate = date_create($responsePolicy['Data'][0]['InceptionDate']);
            $endenddate = date_create($responsePolicy['Data'][0]['ExpiryDate']);
            $period_days = date_diff($startdate,$endenddate);

            $payload = array(
                'img' => $requestGet['imagettd'],
                'nama' => $requestGet['name'],
                'option_sengketa' => $requestGet['option_sengketa'],
                'kondisi_kendaraan' => $requestGet['kondisi_kendaraan'],
                'tempat_survey' => $requestGet['tempat_survey'],
                'dateInception' => $dateInception,
                'dateExpiry' => $dateExpiry,
                'dateNow' => $dateNow,
                'dateExpiryDocument' => $dateExpiryDocument,
                'PID' => $responsePolicy['Data'][0]['PID'],
                'ProductDesc' => $responsePolicy['Data'][0]['ProductDesc'],
                'RefNo' => $responsePolicy['Data'][0]['RefNo'],
                'CoverageDesc' => $responsePolicy['Data'][0]['CoverageDesc'],
                'InsuredName' => $responsePolicy['Data'][0]['InsuredName'],
                'Address_1' => $responseSearchProfile['Data'][0]['Address_1'],
                'Address_2' => $responseSearchProfile['Data'][0]['Address_2'],
                'Address_3' => $responseSearchProfile['Data'][0]['Address_3'],
                'Currency' => $responsePolicy['Data'][0]['Currency'],
                'Premium' => $responsePolicy['Data'][0]['Premium'],
                'ADMFee' => $responsePolicy['Data'][0]['ADMFee'],
                'StampDuty' => $responsePolicy['Data'][0]['StampDuty'],
                'AID' => $responsePolicy['Data'][0]['AID'],
                'SubmitDateF' => $responsePolicy['Data'][0]['SubmitDateF'],
                'periodDays' => $period_days->format('%a'),
                'CoverageID' => $responsePolicy['Data'][0]['CoverageID'],
                'ProductID' => $responsePolicy['Data'][0]['ProductID']

            );
            for ($i = 1; $i <= 30; $i++) {
               $payload['FLDTAG'.$i] = $responseProduct['Data'][0]['FLDTAG'.($i)];
               $payload['ValueDesc'.$i] = $responsePolicy['Data'][0]['ValueDesc'.($i)];
            }

            //Coverage Detail
            $CoverageDetail = array();
            $TempCoverageDetail = array();
            foreach ($responseCoverage['Data'][0]['CoverageDetail'] as $risk){
                $TempCoverageDetail['Description'] = $risk['Description'];
                $CoverageDetail[] = $TempCoverageDetail;
            }
            $payload['CoverageDetail'] = $CoverageDetail;

            //Coverage Deductible
            $CoverageDeductible = array();
            $TempCoverageDeductible = array();
            foreach ($responseCoverage['Data'][0]['CoverageDeductible'] as $deductible){
                if ($NotApplyRateLoadingF == $deductible['NotApplyRateLoadingF']){
                    $TempCoverageDeductible['Description'] = $deductible['Description'];
                    $CoverageDeductible[] = $TempCoverageDeductible;
                }
            }
            $payload['CoverageDeductible'] = $CoverageDeductible;

            // dd($payload);

            //Premium Simulation
            $PremiumSimulation = array();
            $TempPremiumSimulation = array();
            foreach ($responsePremiumSimulation['Data'] as $premi){
                $TempPremiumSimulation['Risk'] = $premi['Risk'];
                $TempPremiumSimulation['SPremium'] = $premi['SPremium'];
                $TempPremiumSimulation['Premium'] = $premi['Premium'];
                $PremiumSimulation[] = $TempPremiumSimulation;
            }
            $payload['PremiumSimulation'] = $PremiumSimulation;
            // dd($payload);

            return view('Transaction.PolicyDocSppa')
            ->with([
                'payload' => $payload
                // 'Policy' => $responsePolicy,
                // 'Profile' => $responseSearchProfile,
                // 'Product' => $responseProduct,
                // 'Coverage' => $responseCoverage,
                // 'PremiumSimulation' => $responsePremiumSimulation,
                // 'datasign' => $datasign,
                // 'arraydate' => $arraydate,
            ]);
        }else{
            return abort(404);
        }
    }

    public function SubmitPolicyDocSPPA(Request $request){
        // dd($request);
        $payload = $request->input('payload');
        $datasign = array(
            'img' => ($request->input('Imgttd') == null) ? '' : $request->input('Imgttd'),
            'nama' => ($request->input('Name') == null) ? '' : $request->input('Name'),
            'option_sengketa' => ($request->input('pilihansengketa') == null) ? '' : $request->input('pilihansengketa'),
            'kondisi_kendaraan' => ($request->input('kondisikendaraan') == null) ? '' : $request->input('kondisikendaraan'),
            'tempat_survey' => ($request->input('tempatsurvey') == null) ? '' : $request->input('tempatsurvey'),
        );

        $payload['img'] = ($request->input('Imgttd') == null) ? '' : $request->input('Imgttd');
        $payload['nama'] = ($request->input('Name') == null) ? '' : $request->input('Name');
        $payload['option_sengketa'] = ($request->input('pilihansengketa') == null) ? '' : $request->input('pilihansengketa');
        $payload['kondisi_kendaraan'] = ($request->input('kondisikendaraan') == null) ? '' : $request->input('kondisikendaraan');
        $payload['tempat_survey'] = ($request->input('tempatsurvey') == null) ? '' : $request->input('tempatsurvey');
        // return $payload;
        if ($payload['SubmitDateF'] == 'true'){
            $payload['SubmitDateF'] = true;
        }else{
            $payload['SubmitDateF'] = false;
        }
        // dd($payload);
        $html = view('Transaction.PolicyDocSppaPDF')
            ->with([
                'payload' => $payload
            ])->render();
            
            // return $html;

        $dataPrintSPPA = array(
            'URLDoc' => $html,
            'isLandScape' => false,
            'MarginLeft' => 10,
            'MarginBottom' => 50,
            'MarginRight' => 50,
            'MarginTop' => 20
        );

        $responseDocSppa = APIMiddleware($dataPrintSPPA, 'ConvertWebPageToPDF');
        if ($responseDocSppa['code'] == '200' && $request->input('alreadySign') == 'true'){
            $PID = $request->input('payload')['PID'];

            $data = array(
                'PID' => $PID,
                'EsignF' => true
            );

            $responseConfirmEsign = APIMiddleware($data, 'SubmitPolicyConfirmationEsign');

            $policypic = array();

            $title = "Document SPPA e-Sign";
            $remarks = $PID." - Document SPPA e-Sign";
            $image = $responseDocSppa['Data'];

            $temppolicypic = array(
                'ImageID' => '0',
                'TmpFile' => $image,
                'Title' => $title,
                'Remark' => $remarks,
                'FileType' => 'PDF'
            );   
            $policypic[] = $temppolicypic;

            $datapic = array(
                'PID'=> $PID,
                'PolicyPIC'=> $policypic
            );

            $responsePolicyDoc = APIMiddleware($datapic,'SavePolicyDocument');
            return $responsePolicyDoc;
        }

        return $responseDocSppa;
        
    }

    public function sppadocold(){
        $dataPolicy = array(
            'ID' => 'aca_mo_3',
            'RefNo' => '15-DEMO210800034',
            'PStatus' => '',
            'Insured' => '',
        ); 

        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
        // dd($responsePolicy);
        return view('Transaction.backupdocsppa')->with(['Policy'=>$responsePolicy['Data']]);
    }

    public function getDocumentPreview(Request $request){
        $PID = $request->input('PID');
        $refno = $request->input('RefNo');
        $document = $request->input('Document');

        if ($document == 'sppa'){
            $payload = $this->create_payload(session('ID'), $PID);

            // return $payload;
    
            $html = view('Transaction.PolicyDocSppaPDF')->with([
                'payload' => $payload
            ])->render();

            // return $html;
    
            $dataPrintSPPA = array(
                'PID' => $PID,
                'DocumentType' => $document,
                'URLDoc' => $html,
                'isLandScape' => false,
                'MarginLeft' => 10,
                'MarginBottom' => 50,
                'MarginRight' => 50,
                'MarginTop' => 20
            );

            // return $dataPrintSPPA;
    
            $responseDocSppa = APIMiddleware($dataPrintSPPA, 'PreviewDocument');
            return $responseDocSppa;
        }else{
            return response()->json(['code' => '400','message'=>'Document Not Ready.']);   
        }
    }

    function create_payload($userid, $PID){   
        $dataPolicy = array(
            'PID' => $PID
        ); 
        
        $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
        $NotApplyRateLoadingF = $responsePolicy['Data'][0]['NotApplyRateLoadingF'];
        // dd($NotApplyRateLoadingF);

        // dd($responsePolicy);
        $dateInception = tgl_indo($responsePolicy['Data'][0]['InceptionDate']);
        $dateExpiry = tgl_indo($responsePolicy['Data'][0]['ExpiryDate']);
        $dateNow = tgl_indo(date("m/d/Y"));
        $dateExpiryDocument=date_create(date("Y-m-d"));
        date_add($dateExpiryDocument,date_interval_create_from_date_string("14 days"));
        $dateExpiryDocument = date_format($dateExpiryDocument,"d F Y");

        $data = array (
            'ID' => $responsePolicy['Data'][0]['InsuredID'],
            'OwnerID' => $userid,
            // 'OwnerID' => session('ID'),
        );
        
        $responseSearchProfile = APIMiddleware($data, 'SearchProfile');

        $dataProduct = array(
            'ProductID' => $responsePolicy['Data'][0]['ProductID']
        );

        $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');

        $dataCoverage = array(
            'CoverageID' => $responsePolicy['Data'][0]['CoverageID']
        );
        $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');

        // return $responseCoverage;

        $responsePremiumSimulation = $this->PremiumSimulationDoc($responsePolicy['Data'], $responseProduct);

        $startdate = date_create($responsePolicy['Data'][0]['InceptionDate']);
        $endenddate = date_create($responsePolicy['Data'][0]['ExpiryDate']);
        $period_days = date_diff($startdate,$endenddate);

        $payload = array(
            'img' => '',
            'nama' => '',
            'option_sengketa' => '-',
            'kondisi_kendaraan' => '',
            'tempat_survey' => '',
            'dateInception' => $dateInception,
            'dateExpiry' => $dateExpiry,
            'dateNow' => $dateNow,
            'dateExpiryDocument' => $dateExpiryDocument,
            'PID' => $responsePolicy['Data'][0]['PID'],
            'ProductDesc' => $responsePolicy['Data'][0]['ProductDesc'],
            'RefNo' => $responsePolicy['Data'][0]['RefNo'],
            'CoverageDesc' => $responsePolicy['Data'][0]['CoverageDesc'],
            'InsuredName' => $responsePolicy['Data'][0]['InsuredName'],
            'Address_1' => $responseSearchProfile['Data'][0]['Address_1'],
            'Address_2' => $responseSearchProfile['Data'][0]['Address_2'],
            'Address_3' => $responseSearchProfile['Data'][0]['Address_3'],
            'Currency' => $responsePolicy['Data'][0]['Currency'],
            'Premium' => $responsePolicy['Data'][0]['Premium'],
            'ADMFee' => $responsePolicy['Data'][0]['ADMFee'],
            'StampDuty' => $responsePolicy['Data'][0]['StampDuty'],
            'AID' => $responsePolicy['Data'][0]['AID'],
            'SubmitDateF' => $responsePolicy['Data'][0]['SubmitDateF'],
            'periodDays' => $period_days->format('%a')
        );
        for ($i = 1; $i <= 30; $i++) {
           $payload['FLDTAG'.$i] = $responseProduct['Data'][0]['FLDTAG'.($i)];
           $payload['ValueDesc'.$i] = $responsePolicy['Data'][0]['ValueDesc'.($i)];
        }

        //Coverage Detail
        $CoverageDetail = array();
        $TempCoverageDetail = array();
        foreach ($responseCoverage['Data'][0]['CoverageDetail'] as $risk){
            $TempCoverageDetail['Description'] = $risk['Description'];
            $CoverageDetail[] = $TempCoverageDetail;
        }
        $payload['CoverageDetail'] = $CoverageDetail;

        //Coverage Deductible
        $CoverageDeductible = array();
        $TempCoverageDeductible = array();
        foreach ($responseCoverage['Data'][0]['CoverageDeductible'] as $deductible){
            if ($NotApplyRateLoadingF == $deductible['NotApplyRateLoadingF']){
                $TempCoverageDeductible['Description'] = $deductible['Description'];
                $CoverageDeductible[] = $TempCoverageDeductible;
            }
        }
        $payload['CoverageDeductible'] = $CoverageDeductible;
        // dd($payload);

        //Premium Simulation
        $PremiumSimulation = array();
        $TempPremiumSimulation = array();
        // dd($responsePremiumSimulation);
        foreach ($responsePremiumSimulation['Data'] as $premi){
            $TempPremiumSimulation['Risk'] = $premi['Risk'];
            $TempPremiumSimulation['SPremium'] = $premi['SPremium'];
            $TempPremiumSimulation['Premium'] = $premi['Premium'];
            $PremiumSimulation[] = $TempPremiumSimulation;
        }
        $payload['PremiumSimulation'] = $PremiumSimulation;

        return $payload;
    }

    function DropPolicyDocument(Request $request){
        $PID = $request->input('PID');
        $datapolicy = array(
            "PID" => ($PID == null) ? '' : $PID,
            "ImageID" => ($request->input('ImageID') == null) ? '' : $request->input('ImageID')
        );
        $responseDropPolicyDocument = APIMiddleware($datapolicy, 'DropPolicyDocument');

        if ($responseDropPolicyDocument['code'] == '200'){
            $dataPolicy = array(
                'PID' => $PID
            );  
            $listpolicy = APIMiddleware($dataPolicy, 'SearchPolicyByPID');
    
            return response()->json(['code' => $responseDropPolicyDocument['code'],'message'=>$responseDropPolicyDocument['message'],'data' => $responseDropPolicyDocument['Data'], 'listpolicy' => $listpolicy]);
        }else{
            return response()->json(['code' => $responseDropPolicyDocument['code'],'message'=>$responseDropPolicyDocument['message'],'data' => $responseDropPolicyDocument['Data']]);
        }
    }

    public function getPrivileges(Request $request){
        $FName = $request->get('FName');
        $dataPrivileges = array(
            'Username' => session('ID'),
            'Password' => session('Password'),
            'FName' => $FName
        );  

        $responsePrivileges = APIMiddleware($dataPrivileges, 'CheckPrivileges');
        // return $responseDoc;
        return response()->json($responsePrivileges);
    }

    public function showModalInstallment(Request $request){
        // dd($request);
        
        $maxrows = $request->get('payment_tenor');
        $payment_term = $request->get('payment_term');
        $TSI = number_format($request->get('tsi'),7,'.',',');
        // dd($TSI);
        $RoundF;
        $tPCT = 0;
        $TotalPCT = 100;
        if ($maxrows > 0 ){
            $PCT = 100 / $maxrows;
            //hardcode RoundF sementara True
            $RoundF = false;

            if ($RoundF){
                $PCT = number_format(round($PCT,2),13,'.',',');
            }
        }

        $data = array();

        for ($i=1; $i <= $maxrows; $i++){
            $rowPCT;
            $sdate = date_create($request->get('sdate'));
            date_add($sdate,date_interval_create_from_date_string(($i - 1) * $payment_term . " months"));
            if ($i < $maxrows){
                $rowPCT = $PCT;
            }else{
                if ($RoundF){
                    $rowPCT = number_format($TotalPCT - $tPCT,13,'.',',');
                }else{
                    $rowPCT = $PCT;
                }
            }
            $premium = number_format($rowPCT / 100 * $request->get('premium'),7,'.',',');

            $tPCT += $PCT;

            $data2 = array(
                'rowno' => $i,
                'InstDate' => date_format($sdate,"m/d/Y"),
                'PCT' => $rowPCT,
                'Amount' => $premium,
                'SI' => $TSI
            );
            $data[$i] = $data2;
        }

        return view('Transaction.modalInstallment',array('data' => $data));;
    }

    public function simulasifunction(){
        try {
            // dd($asdasd);
        } catch (Throwable $e) {
            report($e);
    
            return false;
        }
    }

}



// backup
// public function showFormPolicy(){
    //     // $dataPolicy = array(
    //     //     'ID' => session('ID'),
    //     //     'RefNo' => '',
    //     //     'PStatus' => '',
    //     //     'Insured' => '',
    //     // );   
    //     // $dataProduct = array(
    //     //     'ProductID' => ''
    //     // );
    //     // $dataCoverage = array(
    //     //     'CoverageID' => ''
    //     // );
    //     // $dataMO = array(
    //     //     'ID' => ''
    //     // );
    //     // $dataBranch = array(
    //     //     'Branch' => ''
    //     // );
    //     // $dataCurrency = array(
    //     //     'Currency' => ''
    //     // );
    //     // $dataProfile = array(
    //     //     'OwnerID' => session('ID')
    //     // );
    //     // $dataSegment = array(
    //     //     'Segment' => ''
    //     // );
    //     // $dataCT = array(
    //     //     'CT' => ''
    //     // );
    //     // $dataAgent = array(
    //     //     'ID' => ''
    //     // );

    //     // $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
    //     // dd($responseProduct);
    //     // $responsePolicy = APIMiddleware($dataPolicy, 'SearchPolicy');
    //     // dd($responsePolicy);
    //     // $responseProduct = APIMiddleware($dataProduct, 'ProductGENHTAB');
    //     // $dataProduct = $responseProduct['Data'];

    //     // $dataProductgendtab = array(
    //     //     'ProductID' => ''
    //     // );
    //     // $fixarrProduct = APIMiddleware($dataProductgendtab, 'SearchGENDTABByProduct');

    //     // $responseCoverage = APIMiddleware($dataCoverage, 'SearchCoverage');
    //     // $responseMO = APIMiddleware($dataMO, 'SearchMO');
    //     // $responseBranch = APIMiddleware($dataBranch, 'SearchBranch');
    //     // $responseCurrency = APIMiddleware($dataCurrency, 'SearchCurrency');
    //     // $responseProfile = APIMiddleware($dataProfile, 'SearchProfile');
    //     // $responseSegment = APIMiddleware($dataSegment, 'SearchSegment');
    //     // $responseCT = APIMiddleware($dataSegment, 'SearchCT');
    //     // $responseAgent = APIMiddleware($dataAgent, 'SearchAgentProfile');

    //     session(['sidebar' => 'sppa']);

    //     return view('Transaction.policy')
    //         ->with([
    //             // 'Policy' => $responsePolicy,
    //             // 'product' => $responseProduct,
    //             // 'coverage' => $responseCoverage,
    //             // 'mo' => $responseMO,
    //             // 'branch' => $responseBranch,
    //             // 'currency' => $responseCurrency,
    //             // 'profile' => $responseProfile,
    //             // 'gendtab' => $fixarrProduct,
    //             // 'segment' => $responseSegment,
    //             // 'ct' => $responseCT,
    //             // 'BusinessSource' => $responseAgent,
    //         ]);
    // }
