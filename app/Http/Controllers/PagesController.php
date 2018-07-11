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

    public function purchasing(){
        $title ='Controllership Contract Repository';
        $vendors = Vendor::where('status', '1')->paginate(10);
        
    
        return view('pages.purchasing', compact('title', 'vendors'));
    }

    public function finance(){
        // $contract = new Vendor;
        // $contract->title = 'Controllership Contract Repository';
        // $contract->type = DB::select('SELECT type FROM tbl_contract_info WHERE contract_id = 1');

       
        $title = 'Controllership Contract Repository';
        $contract = DB::select('SELECT * FROM tbl_contract WHERE type ="Contract"  ORDER BY value');
        $category = DB::select('SELECT value FROM tbl_contract WHERE type ="Category"  ORDER BY value');
        $department = DB::select('SELECT value FROM tbl_contract WHERE type ="Department"  ORDER BY value');

        

        $termination = Terms::where('id', '1')->get();
        $payment = Terms::where('id', '2')->get();
        $spend = Terms::where('id', '3')->get();
        $penalty = Terms::where('id', '4')->get();
        

        
        
        // return $all;
        return view('vendor.create', compact('penalty','spend','payment','termination','contract', 'category', 'department', 'title'));
        
    }

}
