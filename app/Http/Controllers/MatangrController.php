<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matangr;

class MatangrController extends Controller
{
    //
    public function index()
	{
	    //
	    $matangr=Matangr::all();
        return view('matangr/index',compact('matangr'));
	}

    public function create(Request $request)
	{
		\App\Matangr::create($request->all());
		return redirect('/matangr')->with('sukses','Data berhasil ditambah');
	}

	public function edit(Request $request, $id)
	{
		$matangr = \App\Matangr::find($id);
    	$matangr -> update($request->all());
    	return redirect('/matangr')->with('sukses','Data berhasil diubah');		
	}

	public function delete($id)
    {
        $matangr = \App\Matangr::find($id);
        $matangr->delete($matangr); 
        return redirect('/matangr')->with('sukses','Data berhasil dihapus');
    }

	 
}