<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Vendor;
use App\Carbon;


class SortingController extends Controller
{

    public function index() 
    {
        $title ='Controllership Contract Repository';
        

        
      
        
        $vendor = Vendor::select('*');
        // $vendor_lists = $vendor->pluck('name','id');
        $vendor_lists = Vendor::select('name')->groupBy('name')->pluck('name','name');

        // $query = request()->vendors;
        // $vendors = $query
        //             ? $vendor->where('name', $query)->where('status_id', 1)
        //                                             ->orderBy('expirationdate', 'ASC')
        //                                             ->paginate(10)      
        //             : $vendor->where('status_id', 1)->orderBy('expirationdate', 'ASC')->paginate(10);  

        $vendorName= Input::get('vendor_name');

        $vendors = $vendorName
                    ? $vendor->where('name', 'like',  '%'.$vendorName.'%')->where('status_id', 1)
                                                    ->orderBy('expirationdate', 'ASC')
                                                    ->paginate(10)      
                    : $vendor->where('status_id', 1)->orderBy('expirationdate', 'ASC')->paginate(10);
                    
                    

        return view('pages.purchasing', compact('title', 'vendors', 'vendor_lists'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      
        

        return $vendors = Vendor::select('id', 'name')
            ->where('name', $id)
            ->orderBy('expirationdate', 'ASC')
            ->paginate(10);
       
      
 
        return view('vendor.show', compact('vendor', 'files'));
    }


}
