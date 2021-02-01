<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftbank;
use App\Pergeseran;
use PDF;
use Illuminate\Database\Eloquent\Builder;

class PergeseranController extends Controller
{
    public function index()
    {
    	$pergeseran=Pergeseran::latest()->get();
    	$rekbank=Daftbank::where('id','<>',13)->get();
        return view('pergeseran.index',compact('pergeseran','rekbank'));

    }

    public function create(Request $request)
    {
        // $data = $request->all(); 
        // dd($data);
    	Pergeseran::create($request->all());
    	return redirect('/pergeseran')->with('sukses','Data berhasil ditambah');
    }

    public function delete($id)
    {
        $pergeseran = Pergeseran::find($id);
        $pergeseran->delete($pergeseran); 
        return redirect('/pergeseran')->with('sukses','Data berhasil dihapus');
    }

    public function edit(Request $request, $id)
	{
		$pergeseran = Pergeseran::find($id);
    	$pergeseran -> update($request->all());
    	return redirect('/pergeseran')->with('sukses','Data berhasil diubah');		
	}

}