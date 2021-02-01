<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftbank;
//Export Excel
use App\Exports\DaftbankExport;
use Maatwebsite\Excel\Facades\Excel;
//export Pdf
use PDF;

class DaftbankController extends Controller
{
    //
    public function index(Request $request)
    {
    	// $daftbank = \App\Daftbank::all();
    	// return view('daftbank.index',['daftbank' -> $daftbank]);
        if ($request->has('cari')) {
            $daftbank = \App\daftbank::where('namabank','LIKE','%'.$request->cari.'%')->get();
        } else {
    	   $daftbank=Daftbank::all();
        }
        return view('daftbank/index',compact('daftbank'));
    }

    public function create(Request $request)
    {
    	\App\Daftbank::create($request->all());
    	return redirect('/daftbank')->with('sukses','Data berhasil ditambah');
    }

    public function edit($id)
    {
    	$daftbank = Daftbank::find($id);
    	return view('daftbank/edit',compact('daftbank'));
    }

    public function update(Request $request,$id)
    {
    	$daftbank = \App\Daftbank::find($id);
    	$daftbank -> update($request->all());
    	return redirect('/daftbank')->with('sukses','Data berhasil diubah');
    	// return view('daftbank/edit',compact('daftbank'));
    }

    public function delete($id)
    {
        $daftbank = \App\Daftbank::find($id);
        $daftbank->delete($daftbank); 
        return redirect('/daftbank')->with('sukses','Data berhasil dihapus');
    }

    public function export() 
    {
        return Excel::download(new DaftbankExport, 'Daftbank.xlsx');
    }
    public function exportpdf()
    {
        // Load HTML
        // $pdf = PDF::loadHTML('<h1>Daftar Rekening Bank</h1>');

        //Load View
        $daftbank = \App\Daftbank::all();
        $pdf = PDF::loadView('export.exportdaftbankpdf',['daftbank'=>$daftbank]);
        // $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('Rekbank.pdf');
    }
}

