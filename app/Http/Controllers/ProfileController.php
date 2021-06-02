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
    public function CreateProfile()
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
        $responseData = APIMiddleware($data, 'SearchProfile');    
        

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseData, 'tabname' => 'inquiry')); 
    }

    // CRUD 
    public function detailProfile($id){
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

        $responseData = APIMiddleware($dataProfile, 'SearchProfile');
        // dd($responsedrop);

        return view('CreateProfile', array('Country' => $responseCountry, 'data' => $responseData, 'tabname' => 'inquiry')); 

    }
    
    // api save profile 
    public function SaveProfile(Request $request)
    {
        $data = array(
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
            'Corporate' => $request->input('Corporate'),
            'TaxID' => $request->input('Tax'),
            'Religion' => $request->input('BirthPlace'),
            'Income' => $request->input('Occupation'),
            'Employment' => $request->input('CoAddress'),

            'martial' => $request->input('martial'),
            'citizenship' => $request->input('Citizen'),
            'Contact' => $request->input('Contact'),
            'ContactAddress' => $request->input('ConAddress'),
            'ContactPhone' => $request->input('ConPhone')
        );

        $data = array(
            'ID' => $id,
            'OwnerID' => 'ACA_MO_1'
        );
        $responsedata = APIMiddleware($data, "SearchProfile");

        $response  = APIMiddleware($data, 'SaveProfile'); 
        return view('profile');
        
    }

    
} 
