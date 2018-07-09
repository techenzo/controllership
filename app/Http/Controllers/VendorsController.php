<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Vendor;
use App\Terms;
use DB;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $vendor = Vendor::all();
        return $vendor;
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        // Validation
        $this->validate($request, [
            'vendor_name' => 'required',
            'first_name' => 'required',  
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'weburl' => 'required',
            'contract' =>'required',
            'category' =>'required',
            'effectdate' =>'required',
            'expiredate' =>'required'

        ]);
        
        // Create New Vendor
        $vendorName = $request->input('vendor_name');
        $fName = $request->input('first_name');
        $lName = $request->input('last_name');
        $add = $request->input('address');
        $mail= $request->input('email');
        $web = $request->input('weburl');

        $con = $request->input('contract');
        $cat = $request->input('category');
        $dep = $request->input('department');
        $eff = $request->input('effectdate');
        $exp= $request->input('expiredate');
      


        $vendor = new Vendor;
        $vendor->vendor = $vendorName;
        $vendor->firstname = $fName;
        $vendor->lastname = $lName;
        $vendor->address = $add;
        $vendor->email = $mail;
        $vendor->weburl = $web;
        $vendor->contract = $con;
        $vendor->category = $cat;
        $vendor->department = $dep;
        $vendor->effectivedate = $eff;
        $vendor->expirationdate = $exp;
        $vendor->status = '1';
        $vendor->save();

        return redirect('/purchasing')->with('success', 'New Vendor Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // baguhin mo to mamaya.
        $vendor = Vendor::whereVendorId($id)->first();

        return view('vendor.purchasing2', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendorid = Vendor::find($id);

        // if(auth()->user()->id !==$vendor->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorized Page');
        // }
        return view('pages.purchasing', compact('vendorid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->all();

        // Validation
        // $this->validate($request, [
        //     'vendor_name' => 'required',
        //     'first_name' => 'required',  
        //     'last_name' => 'required',
        //     'address' => 'required',
        //     'email' => 'required',
        //     'weburl' => 'required',
        //     'contract' =>'required',
        //     'category' =>'required',
        //     'effectdate' =>'required',
        //     'expiredate' =>'required'

        // ]);
        
        // Update Vendor
        $vendorName = $request->input('vendor_name');
        $fName = $request->input('first_name');
        $lName = $request->input('last_name');
        $add = $request->input('address');
        $mail= $request->input('email');
        $web = $request->input('weburl');

        // $con = $request->input('contract');
        // $cat = $request->input('category');
        // $dep = $request->input('department');
        // $eff = $request->input('effectdate');
        // $exp= $request->input('expiredate');
      


      
        // $vendor = Vendor::find($id);
        $vendor->vendor = $vendorName;
        $vendor->firstname = $fName;
        $vendor->lastname = $lName;
        $vendor->address = $add;
        $vendor->email = $mail;
        $vendor->weburl = $web;
        // $vendor->contract = $con;
        // $vendor->category = $cat;
        // $vendor->department = $dep;
        // $vendor->effectivedate = $eff;
        // $vendor->expirationdate = $exp;

        $vendor->save();

        return redirect('/purchasing')->with('success', 'Vendor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $vendor = Vendor::find($id);
        // return redirect('/purchasing',compact('vendor','id'));
        
    }

    public function selectid($id){
        $vendor = Vendor::find($id);
        // return view('/',compact('passport','id'));
        
    }
    public function addvendor(){
        // $contract = new Vendor;
        // $contract->title = 'Controllership Contract Repository';
        // $contract->type = DB::select('SELECT type FROM tbl_contract_info WHERE contract_id = 1');

       
        $title = 'Controllership Contract Repository';
        $contract = DB::select('SELECT * FROM tbl_contract WHERE type ="Contract"  ORDER BY value');
        $category = DB::select('SELECT value FROM tbl_contract WHERE type ="Category"  ORDER BY value');
        $department = DB::select('SELECT value FROM tbl_contract WHERE type ="Department"  ORDER BY value');

        

        $termination = Terms::where('terms_id', '1')->get();
        $payment = Terms::where('terms_id', '2')->get();
        $spend = Terms::where('terms_id', '3')->get();
        $penalty = Terms::where('terms_id', '4')->get();
        

        
        
        // return $all;
        return view('vendor.create', compact('penalty','spend','payment','termination','contract', 'category', 'department', 'title'));
        
    }


   
}
