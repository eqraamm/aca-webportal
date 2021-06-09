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
    public function index()
    {
         // API Country
         $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');

         //Data
         $data = array (
            'ID' => '',
            'OwnerID' => 'aca_mo_1',
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

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseSearchProfile, 
        'Province' => $responseProvince, 'CGroup' => $responseCGroup, 'SCGroup' => $responseSCGroup, 
        'tabname' => 'inquiry', 'responseCode' => '', 'responseMessage' => '')); 
    }

    // drop profile 
    public function dropProfile($id){
        $data = array(
            'ID' => $id,
            'OwnerID' => 'ACA_MO_1'
        );
        $responsedrop = APIMiddleware($data, "DropProfile");

        $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');
        // dd($this->listprofile);
        $dataProfile = array(
            'ID' => '',
            'OwnerID' => 'aca_mo_1'
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
        'tabname' => 'inquiry', 'responseCode' => $responseCode, 'responseMessage' => $responseMessage)); 

    }
    
    // api save profile 
    public function SaveProfile(Request $request)
    {

        $dataprofile = array(
            'ID' => $request->input('ProfileID'),
            'Firstname' => $request->input('FirstName'),
            'Midname' => $request->input('MiddleName'),
            'Lastname' => $request->input('LastName'),
            'Name' => $request->input('Name'),
            'ID_Type' => $request->input('IDType'),
            'ID_Name' =>$request->input('ID_Name'),
            'dateID' => $request->input('IDDate'),
            'Salutation' => $request->input('Salutation'),

            'Initial' => $request->input('Initial'),
            'Title' => $request->input('Title'),
            'Email' => $request->input('Email'),
            'Mobile' => $request->input('MobilePhone'),
            'Phone' => $request->input('Phone'),
            'OwnerID' => $request->input('UserOwner'),
            'ID_No' => $request->input('ID_Number'),
            'Address_1' => $request->input('Address1'),
            'Address_2' => $request->input('Address2'),
            'Address_3' => $request->input('Address3'),

            'Country' => $request->input('Country'),
            'City' => $request->input('City'),
            'ZipCode' => $request->input('ZipCode'),
            'Gender' => $request->input('Gender'),
            'BirthPlace' => $request->input('BirthPlace'),
            'BirthDate' => $request->input('BirthDate'),
            'Occupation' => $request->input('Occupation'),
            'Correspondence_Address' => $request->input('CoAddress'),

            'Correspondence_phone' => $request->input('CoPhone'),
            'Correspondence_email' => $request->input('CoEmail'),
            'CorporateF' => $request->input('Corporate'),
            'TaxID' => $request->input('Tax'),
            'Religion' => $request->input('BirthPlace'),
            'Income' => $request->input('Occupation'),
            'Employment' => $request->input('CoAddress'),

            'martial' => $request->input('martial'),
            'WNIF' => $request->input('Citizen'),
            'Contact' => $request->input('Contact'),
            'ContactAddress' => $request->input('ConAddress'),
            'ContactPhone' => $request->input('ConPhone')
        );

        //Data tab inquiry profile
        $data = array (
            'ID' => $request->input('ProfileID'),
            'OwnerID' => 'aca_mo_1',
        );
        $searchprofilebyid = APIMiddleware($data, 'SearchProfile');

        if ($searchprofilebyid['code'] == '200'){
            $responseSave  = APIMiddleware($dataprofile, 'UpdateProfile');
        }else{
            $responseSave  = APIMiddleware($dataprofile, 'SaveProfile');
        }
        
        $responseCode = $responseSave['code'];
        $responseMessage = $responseSave['message'];

        // List data country
        $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');

         //Data tab inquiry profile
         $data = array (
            'ID' => '',
            'OwnerID' => 'aca_mo_1',
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
        'tabname' => 'profile', 'responseCode' => $responseCode, 'responseMessage' => $responseMessage));
        
    }
    // drop profile 
    public function historyProfile($id){
        $data = array(
            'ID' => $id,
            'OwnerID' => 'ACA_MO_1'
        );
        $responseHistory = APIMiddleware($data, "SearchHistoryProfile");

        $data = array(
            'Country' => ''
        );
        $responseCountry = APIMiddleware($data, 'SearchCountry');

        $dataProfile = array(
            'ID' => '',
            'OwnerID' => 'aca_mo_1'
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
        

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseSearchProfile, 
        'Province' => $responseProvince, 'CGroup' => $responseCGroup, 'SCGroup' => $responseSCGroup,
        'tabname' => 'inquiry', 'responseCode' => '', 'responseMessage' => '', 'dataHistory' => $responseHistory)); 

    }
} 
