<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function admin($value='')
    {
    	return view('admin.admin');
    }

    public function chart($value='')
    {
    	return view('admin.chart');
    }
}
