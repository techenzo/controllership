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
        
        $title = 'Controllership Contract Repository';
        $contract = DB::select('SELECT * FROM contracts WHERE type ="Contract"  ORDER BY value');
        $category = DB::select('SELECT value FROM contracts WHERE type ="Category"  ORDER BY value');
        $department = DB::select('SELECT value FROM contracts WHERE type ="Department"  ORDER BY value');
        

        $termination = Terms::where('id', '1')->get();
        $payment = Terms::where('id', '2')->get();
        $spend = Terms::where('id', '3')->get();
        $penalty = Terms::where('id', '4')->get();
        
        // return $all;
        return view('vendor.create', compact('penalty','spend','payment','termination','contract', 'category', 'department', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'contract_type' =>'required', 
        ]);

        $code = Contract::select('code')->where('value', $request->input('contract_type'))->first();
        $request['code'] = $code->code;                  
        $request['status_id'] = 1;
        $request['user_id'] = auth()->user()->id;

        // return $request->all();

        
        $vendor = Vendor::create($request->except('_token', 'photos'));


        // Validation
        // $this->validate($request, [
        //     'name' => 'required',
        //     'first_name' => 'required',  
        //     'last_name' => 'required',
        //     'address' => 'required',
        //     'email' => 'required',
        //     'web_url' => 'required',
        //     'contract' =>'required',
        //     'category' =>'required',
        //     'termination' =>'required',
        //     'payment' =>'required',
        //     'spend' =>'required',
        //     'penalty' =>'required',
        //     'effectdate' =>'required',
        //     'expiredate' =>'required'
        // ]);

        //Search code
        // $code = Contract::select('code')->where('value', $con)->first();
        // $vendor = new Vendor;
        // $vendor->name = $vendorName;
        // $vendor->first_name = $fName;
        // $vendor->last_name = $lName;
        // $vendor->address = $add;
        // $vendor->email = $mail;
        // $vendor->web_url = $web;
        // $vendor->contract_type = $con;
        // $vendor->category_type = $cat;
        // $vendor->department = $request->input('department');


        // $vendor->termination = $t;
        // $vendor->payment = $p;
        // $vendor->spend = $s;
        // $vendor->penalty = $p2;

        // $vendor->effectivedate = $eff;
        // $vendor->expirationdate = $exp;
        // $vendor->code = $code->code;
        // $vendor->user_id = auth()->user()->id;
        // $vendor->status_id = '1';
        // $vendor->save();




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
                            $filename = $photo->store('public');  
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
        // $vendor = Vendor::whereVendorId($id)->first();
        $vendor = Vendor::find($id);
        //Get vendor name
        $vendorname = Vendor::select('name')->where('id', $id)->first();
        $name =  $vendor->vendor;
        //Get item id
        $id = Item::select('id')->where('name', $name)->get();
        //Get file name
        $files = Itemdetails::select('filename')->wherein('item_id', $id)->pluck('filename');
       
      
 
        return view('vendor.show', compact('vendor', 'files'));
    }

    public function showfiles($id)
    {
        // baguhin mo to mamaya.
        $vendor = ItemDetails::wherename($id)->first();
        // $id = DB::select('SELECT id FROM items WHERE name ="'.$name.'" ');


        return view('vendor.edit', compact('vendor', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);

        //Get item id
         $id = Item::select('id')->where('name', $vendor->name)->get();
        //Get file name
        $files = Itemdetails::select('filename')->wherein('item_id', $id)->pluck('filename');
       
      
 
        return view('vendor.edit', compact('vendor', 'files'));
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
        
        $vendor = Vendor::find($id);
        $vendor->name = $request->input('name');
        $vendor->first_name = $request->input('first_name');
        $vendor->last_name = $request->input('last_name');
        $vendor->address = $request->input('address');
        $vendor->email = $request->input('email');
        $vendor->web_url = $request->input('weburl');
        $vendor->contract_type = $request->input('contract');
        $vendor->category_type = $request->input('category');
        $vendor->department = $request->input('department');


        $vendor->termination = $request->input('termination');
        $vendor->payment = $request->input('payment');
        $vendor->spend = $request->input('spend');
        $vendor->penalty = $request->input('penalty');

        $vendor->effectivedate = $request->input('effectdate');
        $vendor->expirationdate = $request->input('expiredate');
       
        $vendor->user_id = auth()->user()->id;
        $vendor->status_id = '1';
        $vendor->save();
        
        return redirect('/home')->with('success', 'Vendor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->status_id = '0';
        $vendor->save();
        return redirect('/home')->with('success', 'Vendor Deleted');
        
    }

    public function selectid($id){
        $vendor = Vendor::find($id);
        // return view('/',compact('passport','id'));
        
    }


    public function uploadForm(){  
        return view('purchasing/create'); 
    }
        
    public function uploadSubmit(Request $request){  
        
        $this->validate($request, [
            'vendor_name' => 'required',  
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
    
    

   

   