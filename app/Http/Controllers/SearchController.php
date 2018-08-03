<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getVendorAutocomplete () {
       
        // $request->input('vendor_number');
        $inputVendor = Input::get('vendor_number');
        // $inputVendor = '203445';
        $vendors = Vendor::where('vendor_number', 'LIKE', '%'.$inputVendor.'%')->get();
        $arrJSON = array();
        foreach($vendors as $vendor) {
            // array_push($arrJSON, $vendor->vendor_number." [".$vendor->vendor_name."]");
            array_push($arrJSON, array('value' => $vendor->vendor_number, 'label' => $vendor->vendor_number, 'desc' => $vendor->vendor_name));
        }
        return response()->json(["vendor" => $arrJSON]);
        // return $arrJSON;
        
    }
}
