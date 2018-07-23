<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;
use App\Vendor;
use DB;

class PagesController extends Controller
{
    public function search(Request $request){
        $s = $request->input('s');
        $categories = Vendor::latest()
            ->search($s)
            ->paginate(20);
            return view('pages.purchasing', compact('categories', 's'));
    }
  
    public function index(){
        $title ='Controllership Contract Repository';
        return view('pages.index')->with('title', $title);
    }

    // public function purchasing(){
    //     $title ='Controllership Contract Repository';
    //     $vendors = Vendor::where('status_id', '1')->orderBy('expirationdate', 'ASC')->paginate(10);
        
    
    //     return view('pages.purchasing', compact('title', 'vendors'));
    // }

   

}
