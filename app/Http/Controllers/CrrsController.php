<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Item;
use App\ItemDetails;

class CrrsController extends Controller
{
    public function show($id)
    {
        // baguhin mo to mamaya.
        // $vendor = Vendor::whereVendorId($id)->first();
        $vendor = Vendor::find($id);
        //Get vendor name
        $vendorname = Vendor::select('name')->where('id', $id)->first();
        $name =  $vendor->vendor;
        

        //Get item id
        $id = Item::select('id')->where('name', $vendor->name)->get();
        //Get file name
         $files = Itemdetails::select('id', 'filename')
                                    ->wherein('item_id', $id)
                                    ->where('status_id', 1)
                                    // ->get();
                                    ->pluck('filename', 'filename');
       
      
 
        return view('vendor.crrs', compact('vendor', 'files'));
    }

}
