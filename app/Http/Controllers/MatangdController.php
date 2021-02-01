<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Matangd;

class MatangdController extends Controller
{
    public function index()
	{
	    //
	    $matangd=Matangd::orderBy('kdrek')
                ->get();
        return view('matangd/index',compact('matangd'));
	}

	public function create(Request $request)
	{
		\App\Matangd::create($request->all());
		return redirect('/matangd')->with('sukses','Data berhasil ditambah');
	}

	public function edit(Request $request, $id)
	{
		$matangd = \App\Matangd::find($id);
    	$matangd -> update($request->all());
    	return redirect('/matangd')->with('sukses','Data berhasil diubah');		
	}

	public function delete($id)
    {
        $matangd = \App\Matangd::find($id);
        $matangd->delete($matangd); 
        return redirect('/matangd')->with('sukses','Data berhasil dihapus');
    }

}
