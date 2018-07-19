<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class DeleteStatusController extends Controller
{
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->status_id = '0';
        $vendor->save();

        return redirect('/home')->with('success', 'Vendor Deleted');
        
    }
}
