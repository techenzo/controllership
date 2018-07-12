<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Vendor;
use App\Terms;
use App\Contract;
use App\Item;
use App\ItemDetails;


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

    public function searchvendor(Request $request){
        $s = $request->input('s');
            $categories = Vendor::latest()
            ->search($s)
            ->paginate(20);
  
    return view('vendor.search', compact('categories', 's'));
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
         
    
            'termination' =>'required',
            'payment' =>'required',
            'spend' =>'required',
            'penalty' =>'required',

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
        // $dep = $request->input('department');

        $t= $request->input('termination');
        $p = $request->input('payment');
        $s = $request->input('spend');
        $p2 = $request->input('penalty');


        $eff = $request->input('effectdate');
        $exp= $request->input('expiredate');
      
        //Search code

        $code = Contract::select('code')->where('value', $con)->first();
      
        

        $vendor = new Vendor;
        $vendor->vendor = $vendorName;
        $vendor->firstname = $fName;
        $vendor->lastname = $lName;
        $vendor->address = $add;
        $vendor->email = $mail;
        $vendor->weburl = $web;
        $vendor->contract = $con;
        $vendor->category = $cat;
        $vendor->department = $request->input('department');


        $vendor->termination = $t;
        $vendor->payment = $p;
        $vendor->spend = $s;
        $vendor->penalty = $p2;

        $vendor->effectivedate = $eff;
        $vendor->expirationdate = $exp;
        $vendor->code = $code->code;
        $vendor->user_id = auth()->user()->id;
        $vendor->status = '1';
        $vendor->save();

        return redirect('/home')->with('success', 'New Vendor Created');
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

        return view('vendor.edit', compact('vendor'));
    }

    public function showfiles($id)
    {
        // baguhin mo to mamaya.
        $vendor = ItemDetails::wherename($id)->first();

        return view('vendor.edit', compact('vendor'));
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
        // return $request->all();
        //Validation
        $this->validate($request, [
            'vendor_name' => 'required',
            'first_name' => 'required',  
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'weburl' => 'required',

            'termination' =>'required',
            'payment' =>'required',
            'spend' =>'required',
            'penalty' =>'required',

            'effectdate' =>'required',
            'expiredate' =>'required'

            

        ]);
        
        // Update Vendor
        $vendorName = $request->input('vendor_name');
        $fName = $request->input('first_name');
        $lName = $request->input('last_name');
        $add = $request->input('address');
        $mail= $request->input('email');
        $web = $request->input('weburl');

        $t= $request->input('termination');
        $p = $request->input('payment');
        $s = $request->input('spend');
        $p2 = $request->input('penalty');


        $eff = $request->input('effectdate');
        $exp= $request->input('expiredate');
      
        //Get code
        $code = Contract::select('code')->where('value', $con)->first();
 
        

        $vendor = Vendor::find($id);
        $vendor->vendor = $vendorName;
        $vendor->firstname = $fName;
        $vendor->lastname = $lName;
        $vendor->address = $add;
        $vendor->email = $mail;
        $vendor->weburl = $web;
        $vendor->contract = $request->input('contract');
        $vendor->category = $request->input('category');
        $vendor->department = $request->input('department');


        $vendor->termination = $t;
        $vendor->payment = $p;
        $vendor->spend = $s;
        $vendor->penalty = $p2;

        $vendor->effectivedate = $eff;
        $vendor->expirationdate = $exp;
        $vendor->code = $code->code;
        $vendor->status = '1';
        $vendor->save();

        return view('/home')->with('success', 'Vendor Updated');
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

        

        $termination = Terms::where('id', '1')->get();
        $payment = Terms::where('id', '2')->get();
        $spend = Terms::where('id', '3')->get();
        $penalty = Terms::where('id', '4')->get();
        

        
        
        // return $all;
        return view('vendor.create', compact('penalty','spend','payment','termination','contract', 'category', 'department', 'title'));
        
    }


    public function uploadForm(){  
        return view('purchasing/create'); 
    }
        
    public function uploadSubmit(Request $request){  
        
        $this->validate($request, [
            'name' => 'required',  
            'photos'=>'required',
            ]);
     
            if($request->hasFile('photos')){     
                $allowedfileExtension=['pdf','jpg','png','docx','xlsx', 'csv'];    
                $files = $request->file('photos');     
                foreach($files as $file){     
                $filename = $file->getClientOriginalName();     
                $extension = $file->getClientOriginalExtension();     
                $check=in_array($extension,$allowedfileExtension);
            
                // dd($check);
        
                if($check) {  
                    $items= Item::create($request->all());   
                        foreach ($request->photos as $photo) {  
                            $filename = $photo->store('photos');  
                            ItemDetails::create([   
                                'item_id' => $items->id,  
                                'filename' => $filename
                            ]);
                        }
                        // echo "Upload Successfully";
                        }
                        else{
                            echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc, pdf, xlsx</div>';
                        }
                }
            }

        // return view('vendor.create')->with('sucess', 'Successfuly Uploaded');
            
    }   
}
    
    

   

   