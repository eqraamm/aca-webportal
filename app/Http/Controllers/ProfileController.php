<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\User;


class ProfileController extends Controller
{
    public function index(){

        // dd(session('ID'));
         // API Country
         $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');

        // dd($responseCountry);

         //Data
         $data = array (
            'ID' => '',
            'OwnerID' => session('ID'),
        );
        $responseSearchProfile = APIMiddleware($data, 'SearchProfile');

        // dd($responseSearchProfile);

        // Data province
        $data = array(
            'Province' => ''
        );
        $responseProvince = APIMiddleware($data, 'SearchProvince');

        // Data CGroup
        $data = array(
            'CGroup' => ''
        );
        $responseCGroup = APIMiddleware($data, 'SearchCGroup');

         // Data SCGroup
         $data = array(
            'SCGroup' => ''
        );
        $responseSCGroup = APIMiddleware($data, 'SearchSCGroup');

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseSearchProfile, 
        'Province' => $responseProvince, 'CGroup' => $responseCGroup, 'SCGroup' => $responseSCGroup, 
        'tabname' => 'inquiry', 'responseCode' => '', 'responseMessage' => '', 'responseCodeHistory' => '', 'responseCodeProfile' => $responseSearchProfile['code'])); 
    }

    public function dropProfile($id){
        $data = array(
            'ID' => $id,
            'OwnerID' => session('ID')
        );
        $responsedrop = APIMiddleware($data, "DropProfile");

        $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');
        
        $dataProfile = array(
            'ID' => '',
            'OwnerID' => session('ID')
        );

        $responseSearchProfile = APIMiddleware($dataProfile, 'SearchProfile');

        // Data province
        $data = array(
            'Province' => ''
        );
        $responseProvince = APIMiddleware($data, 'SearchProvince');

        // Data CGroup
        $data = array(
            'CGroup' => ''
        );
        $responseCGroup = APIMiddleware($data, 'SearchCGroup');

         // Data SCGroup
         $data = array(
            'SCGroup' => ''
        );
        $responseSCGroup = APIMiddleware($data, 'SearchSCGroup');
        
        $responseCode = $responsedrop['code'];
        $responseMessage = $responsedrop['message'];

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseSearchProfile, 
        'Province' => $responseProvince, 'CGroup' => $responseCGroup, 'SCGroup' => $responseSCGroup,
        'tabname' => 'inquiry', 'responseCode' => $responseCode, 'responseMessage' => $responseMessage, 'responseCodeHistory' => '','responseCodeProfile' => $responseSearchProfile['code'])); 

    }
    
    // api save profile 
    public function SaveProfile(Request $request)
    {
        $dataprofile = array(
            'ID' => ($request->input('ProfileID') == null) ? '' : $request->input('ProfileID'),
            'RefID' => ($request->input('RefID') == null) ? '' : $request->input('RefID'),
            'RefName' => ($request->input('RefName') == null) ? '' : $request->input('RefName'),
            'Firstname' => ($request->input('FirstName') == null) ? '' : $request->input('FirstName'),
            'Midname' => ($request->input('MiddleName') == null) ? '' : $request->input('MiddleName'),
            'Lastname' => ($request->input('LastName') == null) ? '' : $request->input('LastName'),
            'Name' => ($request->input('Name') == null) ? '' : $request->input('Name'),
            'ID_Type' => ($request->input('IDType') == null) ? '' : $request->input('IDType'),
            'ID_Name' => ($request->input('ID_Name') == null) ? '' : $request->input('ID_Name'),
            'dateID' => ($request->input('IDDate') == null) ? '' : $request->input('IDDate'),
            'Salutation' => ($request->input('Salutation') == null) ? '' : $request->input('Salutation'),
            'Initial' => ($request->input('Salutation') == null) ? '' : $request->input('Salutation'),
            'Title' => ($request->input('Title') == null) ? '' : $request->input('Title'),
            'Email' => ($request->input('Email') == null) ? '' : $request->input('Email'),
            'Mobile' => ($request->input('MobilePhone') == null) ? '' : $request->input('MobilePhone'),
            'Phone' => ($request->input('Phone') == null) ? '' : $request->input('Phone'),
            'OwnerID' => ($request->input('UserOwner') == null) ? '' : $request->input('UserOwner'),
            'ID_No' => ($request->input('ID_Number') == null) ? '' : $request->input('ID_Number'),
            'Address_1' => ($request->input('Address1') == null) ? '' : $request->input('Address1'),
            'Address_2' => ($request->input('Address2') == null) ? '' : $request->input('Address2'),
            'Address_3' => ($request->input('Address3') == null) ? '' : $request->input('Address3'),
            'Country' => ($request->input('Country') == null) ? '' : $request->input('Country'),
            'City' => ($request->input('City') == null) ? '' : $request->input('City'),
            'ZipCode' => ($request->input('ZipCode') == null) ? '' : $request->input('ZipCode'),
            'Gender' => ($request->input('Gender') == null) ? '' : $request->input('Gender'),
            'BirthPlace' => ($request->input('BirthPlace') == null) ? '' : $request->input('BirthPlace'),
            'BirthDate' => ($request->input('BirthDate') == null) ? '' : $request->input('BirthDate'),
            'Occupation' => ($request->input('Occupation') == null) ? '' : $request->input('Occupation'),
            'Correspondence_Address' => ($request->input('CoAddress') == null) ? '' : $request->input('CoAddress'),
            'Correspondence_phone' => ($request->input('CoPhone') == null) ? '' : $request->input('CoPhone'),
            'Correspondence_email' => ($request->input('CoEmail') == null) ? '' : $request->input('CoEmail'),
            'CorporateF' => ($request->input('Corporate') == null) ? '0' : '1',
            'TaxID' => ($request->input('Tax') == null) ? '' : $request->input('Tax'),
            'Religion' => ($request->input('Religion') == null) ? '' : $request->input('Religion'),
            'Income' => ($request->input('Income') == null) ? '' : $request->input('Income'),
            'Employment' => ($request->input('CoAddress') == null) ? '' : $request->input('CoAddress'),
            'Marital' => ($request->input('Marital') == null) ? '' : $request->input('Marital'),
            'WNIF' => ($request->input('Citizen') == null) ? '0' : '1',
            'Contact' => ($request->input('Contact') == null) ? '' : $request->input('Contact'),
            'ContactAddress' => ($request->input('ConAddress') == null) ? '' : $request->input('ConAddress'),
            'ContactPhone' => ($request->input('ConPhone') == null) ? '' : $request->input('ConPhone'),
            'ForceSyncF' => ($request->input('Sync') == null) ? '0' : '1',
            'DumpF' => ($request->input('Dump') == null) ? '0' : '1',
            'Province' => ($request->input('Province') == null) ? '' : $request->input('Province'),
            'CompanyType' => ($request->input('CompanyType') == null) ? '' : $request->input('CompanyType'),
            'CGroup' => ($request->input('CGroup') == null) ? '' : $request->input('CGroup'),
            'SCGroup' => ($request->input('SubCompanyGroup') == null) ? '' : $request->input('SubCompanyGroup'),
            'PType' => ($request->input('PType') == null) ? '' : $request->input('PType'),
            'Correspondence_Attention' => ($request->input('CoName') == null) ? '' : $request->input('CoName'),
            'PIC_NAME_1' => ($request->input('PICName') == null) ? '' : $request->input('PICName'),
            'PIC_TITLE_1' => ($request->input('PICTitle') == null) ? '' : $request->input('PICTitle')
        );

        

        if ($dataprofile['ID'] == ''){
            if ($dataprofile['CorporateF'] == 0){
                $dataprofile['ID'] = $dataprofile['ID_No'];
            }else{
                $dataprofile['ID'] = $dataprofile['TaxID'];
            }
            $responseSave  = APIMiddleware($dataprofile, 'SaveProfile');
        }else{
            $data = array (
                'ID' => $dataprofile['ID'],
                'OwnerID' => session('ID')
            );
            $searchprofilebyid = APIMiddleware($data, 'SearchProfile');

            if ($searchprofilebyid['code'] == '200'){
                $responseSave  = APIMiddleware($dataprofile, 'UpdateProfile');
            }else{
                $responseSave  = APIMiddleware($dataprofile, 'SaveProfile');
            }
        }
        
        $responseCode = ($responseSave['code'] == '401') ? '400' : $responseSave['code'];
        $responseMessage = $responseSave['message'];

        // List data country
        $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');

         //Data tab inquiry profile
         $data = array (
            'ID' => '',
            'OwnerID' => session('ID')
        );
        $responseSearchProfile = APIMiddleware($data, 'SearchProfile');

        // Data province
        $data = array(
            'Province' => ''
        );
        $responseProvince = APIMiddleware($data, 'SearchProvince');

        // Data CGroup
        $data = array(
            'CGroup' => ''
        );
        $responseCGroup = APIMiddleware($data, 'SearchCGroup');

         // Data SCGroup
         $data = array(
            'SCGroup' => ''
        );
        $responseSCGroup = APIMiddleware($data, 'SearchSCGroup');
        
        // return redirect()->back()->with(array('Country' => $responseCountry, 'data' => $responseSearchProfile, 'tabname' => 'profile', 'responseCode' => $responseCode, 'responseMessage' => $responseMessage))->withInput($request->all);

        session()->flashInput($request->input());
        

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseSearchProfile, 
        'Province' => $responseProvince, 'CGroup' => $responseCGroup, 'SCGroup' => $responseSCGroup,
        'tabname' => 'profile', 'responseCode' => $responseCode, 'responseMessage' => $responseMessage, 'responseCodeHistory' => '', 'responseCodeProfile' => $responseSearchProfile['code']));
        
    }

    public function historyProfile($id){
        $data = array(
            'ID' => $id,
            'OwnerID' => session('ID')
        );
        $responseHistory = APIMiddleware($data, "SearchHistoryProfile");

        // dd($responseHistory);
        return view('tblHistory',array('responseCodeHistory' => $responseHistory['code'],'dataHistory' => $responseHistory));

    }

    public function listRefProfile(Request $request){

        $data = $request->all();
        #create or update your data here

        // return response()->json(['success'=>'Ajax request submitted successfully']);
        // return $data;

        $data = array(
            'ID' => ($request->input('ID') == null) ? '' : $request->input('ID'),
            'Name' => ($request->input('Name') == null) ? '' : $request->input('Name'),
            'Email' => ($request->input('Email') == null) ? '' : $request->input('Email'),
            'Address' => ($request->input('Address') == null) ? '' : $request->input('Address'),
            'City' => ($request->input('City') == null) ? '' : $request->input('City'),
            'ZipCode' => ($request->input('ZipCode') == null) ? '' : $request->input('ZipCode'),
            'IDNO' => ($request->input('ID_NO') == null) ? '' : $request->input('ID_NO'),
            'DOB' => ($request->input('BirthDate') == null) ? '' : $request->input('BirthDate'),
            'MobileNo' => ($request->input('Mobile') == null) ? '' : $request->input('Mobile'),
            'TaxID' => ($request->input('TaxID') == null) ? '' : $request->input('TaxID'),
        );
        $responseSync = APIMiddleware($data, "SearchListRefProfile");

        // dd($responseSync);

        return view('tblSyncProfile',array('responseCode' => $responseSync['code'],'datasync' => $responseSync));

    }
} 
