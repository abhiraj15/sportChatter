<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DB;
class AdminController extends Controller
{


	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
       
		$admin = Admin::all();		
        return view('admin',compact('admin'));
    }
}
