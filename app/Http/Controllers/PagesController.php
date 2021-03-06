<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;
use App\Vendor;
use App\Access;
use DB;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index', 'show']]);
    }
    public function search(Request $request){
        $s = $request->input('s');
        $categories = Vendor::latest()
            ->search($s)
            ->paginate(20);
            return view('pages.purchasing', compact('categories', 's'));
    }
  
    public function index(){
        //global App/helper.php
        $ntid = getUser();
        $user = Access::select('access')
                                ->where('ntid', $ntid)
                                ->first();
        $control = $user->access;
        $title ='Controllership Contract Repository';
        if($control == 0){
            // return response(redirect(url('/')), 404);   
            return view('error.404');
        }
        $title ='Controllership Contract Repository';
        $query = request()->vendors;
        $vendor = Vendor::select('*');
        $vendor_lists = Vendor::select('name')->groupBy('name')->pluck('name','name');
        $vendors = $query
                    ? $vendor->where('name', $query)->where('status_id', 1)->orderBy('expirationdate', 'ASC')->paginate(10)
                    : $vendor->where('status_id', 1)->orderBy('expirationdate', 'ASC')->paginate(10);
        return view('pages.purchasing', compact('title', 'vendors', 'vendor_lists'));
        // return view('pages.index')->with('title', $title); 
    }

    public function purchasing(){
        $title ='Controllership Contract Repository';
        $vendors = Vendor::where('status_id', '1')->orderBy('expirationdate', 'ASC')->paginate(10);

        return view('pages.purchasing', compact('title', 'vendors'));
    }

   

}
