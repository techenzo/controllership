<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Vendor;
use PDF;


class PdfviewController extends Controller
{
    public function pdfview(Request $request)
   {
        $now = Carbon::now();
      
        
        $vendor = Vendor::find($request->vendor);

    //    $vendor->inv_date = Carbon::parse($vendor->inv_date)->formatLocalized('%A %d %B %Y');
    //    $vendor->date_file = Carbon::parse($vendor->date_file)->formatLocalized('%A %d %B %Y');
    //    $vendor->accounting = $vendor->accounting->sortByDesc('dc');

     view()->share('vendor',$vendor);

       if($request->has('download')){
           // Set extra option
           PDF::setOptions(['dpi' => 70, 'defaultFont' => 'sans-serif']);
           // pass view file
           $pdf = PDF::loadView('vendor.savetopdf');
           // download pdf
           return $pdf->download('CRRS_Vendor_'.$request->vendor.'.pdf');
       }
       return view('savetopdf');
   }
}
