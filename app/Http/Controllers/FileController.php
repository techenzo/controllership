<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\ItemDetails;
use App\File;

class FileController extends Controller
{
    public function importExportExcelORCSV(){
        return view('file_import_export');
    }
    public function importFileIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['vendor' => $value->vendor, 'firstname' => $value->firstname];
                }
                if(!empty($arr)){
                    DB::table('vendors')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
        }
        dd('Request data does not have any files to import.');      
    } 
    public function downloadExcelFile($type){
        $details = Vendor::get()->toArray();
        return \Excel::create('Vendor Details', function($excel) use ($details) {
            $excel->sheet('sheet name', function($sheet) use ($details)
            {
                $sheet->fromArray($details);
            });
        })->download($type);
    } 
    
    public function show(Request $request, $filename)
    {
        
        
       
    }

    public function deletefile(Request $request, $id)
    {
        
        
        $vendor = ItemDetails::find($id);
        $vendor->status_id = '0';
        $vendor->save();

        return redirect()->back()->with('success', 'The file was deleted!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

}
