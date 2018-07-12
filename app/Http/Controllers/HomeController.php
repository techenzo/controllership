<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Get the user ID Logged in
        $user_id = auth()->user()->id;
        
        //Search the user details
        $userid = Vendor::WHERE('user_id', $user_id)->paginate(5);
        return view('home')->with('vendors',$userid);
    }
}
