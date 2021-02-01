<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftbank;

class DashboardController extends Controller
{
    public function index()
    {
    	$rekbank=Daftbank::all();
    	return view ('dashboards.index',compact('rekbank'));
    }
}
