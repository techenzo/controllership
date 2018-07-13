<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

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
                    \DB::table('tbl_vendors_info')->insert($arr);
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

}
