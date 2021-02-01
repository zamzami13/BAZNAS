<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerimaan;
use App\Penerimaandet;
use App\Daftbank;
use App\Matangd;
use PDF;
use DB;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;

class PenerimaanController extends Controller
{
    public function index()
    {    	
	    // $penerimaan = DB::table('penerimaan')
	    // 	->join('penerimaandet','penerimaan.id','=','penerimaandet.penerimaan_id')
	    // 	->where('penerimaandet.matangd_id','<>',20)
	    // 	->select('penerimaan.*')
	    //     ->get();
    	$penerimaan=Penerimaan::where('nomasuk','not like','MdK%')->latest()->get();
    	$penerimaandet=Penerimaandet::latest()->get();
        return view('penerimaan.index',compact('penerimaan','penerimaandet'));

    }

    public function create()
    {
    	$rekbank=Daftbank::all();		
    	$matangd = Matangd::all()->where('type', 'D');
    	return view('penerimaan.create',compact('rekbank','matangd'));
    }

    public function cek_nomor_penerimaan(Request $r){
    	$nomor = $r->nomor;
    	if(strlen($nomor)==5){
    		$exist = DB::table('penerimaan')->where('nomasuk', $nomor)->first();
    		if($exist){
    			return response()->json([
				    'status' => false,
				    'message' => 'Nomor '.$nomor.' Sudah Digunakan'				    
				]);				
    		}else{
    			return response()->json([
				    'status' => true,
				    'message' => $nomor
				]);
    		}
    	}else{
    		return response()->json([
			    'status' => false,
			    'message' => 'Nomor Belum Lengkap'
			]);
    	}
    }

    public function insertdata(Request $request)
	{
		$data = $request->all();
		$penerimaan = new Penerimaan;
		$penerimaan->jenistransaksi = $data['jenistransaksi'];
		$penerimaan->nomasuk = $data['nomasuk'];
		$penerimaan->tanggal = $data['tanggal'];
		$penerimaan->donatur = $data['donatur'];
		if ($data['jenistransaksi']=='Tunai') {
			$penerimaan->daftbank_id = 13;
			$penerimaan->rekpengirim = '-';
		} elseif ($data['jenistransaksi']=='Pergeseran') {
			$penerimaan->daftbank_id = $data['daftbank_id'];
			$penerimaan->rekpengirim = '-';
			$data['matangd_id'][0]=17;
		} else {
			$penerimaan->daftbank_id = $data['daftbank_id'];
			$penerimaan->rekpengirim = $data['rekpengirim'];
		}
		$penerimaan->bukti = $data['bukti'];
		$penerimaan->uraian = $data['uraian'];
		$penerimaan->save();

		if (count($data['matangd_id']) > 0) {
			foreach ($data['matangd_id'] as $key => $value) {
				$data2 = array(
					'penerimaan_id' => $penerimaan->id,
					'matangd_id' => $data['matangd_id'][$key],
					'jumlah' => $data['jumlah'][$key],
					);
				Penerimaandet::create($data2);
			}
		}
		return redirect('/penerimaan')->with('sukses','Data berhasil ditambah');
	}

	public function edit($id)
	{
		$penerimaan = \App\Penerimaan::find($id);
		$rekbank=Daftbank::all();		
    	$matangd = Matangd::all()->where('type', 'D');
    	$penerimaandet = Penerimaandet::all()->where('penerimaan_id', $id);
    	return view('penerimaan/edit',compact('penerimaan','rekbank','matangd','penerimaandet'));	
	}

    public function updateinsert(Request $request, $id)
	{
		$data = $request->all();
		// dd($data);
		//Update Header
		Penerimaan::where('id', $id)->update([
			'jenistransaksi' => $data['jenistransaksi'],
        	'nomasuk' => $data['nomasuk'],
        	'tanggal' => $data['tanggal'],
        	'donatur' => $data['donatur'],
        	'daftbank_id' => $data['daftbank_id'],
        	'rekpengirim' => $data['rekpengirim'],
        	'bukti' => $data['bukti'],
        	'uraian' => $data['uraian']
		]);
		//Update Detail
		if (count($data['matangd_id']) > 0) {
			foreach ($data['matangd_id'] as $key => $value) {
				Penerimaandet::where('id', $data['id'][$key])->update([
					'matangd_id' => $data['matangd_id'][$key],
					'jumlah' => $data['jumlah'][$key]
				]);
			}
		}
		//insert tambahan baru
		$cekdatabaru=(count($data));
		if ($cekdatabaru > 12) {
			foreach ($data['matangd_idtambah'] as $key => $value) {
				$data2 = array(
					'penerimaan_id' => $id,
					'matangd_id' => $data['matangd_idtambah'][$key],
					'jumlah' => $data['jumlahtambah'][$key],
					);
				Penerimaandet::create($data2);
			}
		}
		return redirect('/penerimaan')->with('sukses','Data berhasil ditambah');
	} 


    public function deletechild($id)
    {
        $penerimaandet = \App\Penerimaandet::find($id);
        $penerimaandet->delete($penerimaandet); 
    }

    public function hapusall($id)
    {
    	$penerimaan = \App\Penerimaan::find($id);
        $penerimaandet = Penerimaandet::all()->where('penerimaan_id', $id);
        if (count($penerimaandet) > 0) {
        	Penerimaandet::where('penerimaan_id', $id)->delete();
		}
		Penerimaan::where('id', $id)->delete();
		return redirect('/penerimaan')->with('sukses','Data berhasil dihapus');
    }

    public function cetakform()
    {
    	$rekbank=Daftbank::all();		
    	$matangd = Matangd::all()->where('type', 'D');
    	return view('penerimaan.cetakpenerimaanform',compact('rekbank','matangd'));
    }

    public function exportpdf(Request $request)
    {
        $data = $request->all();
    	$penerimaan = Penerimaan::where('nomasuk','not like','Md%')->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])->latest()->get();
    	//Load PDF
    	// return view ('export.exportpenerimaanpdf',compact('penerimaan','data'));
    	$pdf = PDF::loadView('export.exportpenerimaanpdf',['penerimaan'=>$penerimaan,'data'=>$data]);                
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('penerimaan.pdf',array('Attachment'=>0));	
    }

    public function exportrincipdf(Request $request)
    {
        $data = $request->all();
        $nmrek = Matangd::where('id', $data['matangd_id'])->first()->nmrek;        
        $penerimaan1 = Penerimaandet::where('matangd_id', $data['matangd_id'])->with('penerimaan')->get();
        $penerimaandet = $penerimaan1->whereBetween('penerimaan.tanggal',[$data['tanggalawal'],$data['tanggalakhir']]);
        //Load PDF
        // return view ('export.exportpenerimaanrincipdf',compact('penerimaandet','data','nmrek'));
    	$pdf = PDF::loadView('export.exportpenerimaanrincipdf',['penerimaandet'=>$penerimaandet,'data'=>$data,'nmrek'=>$nmrek]);                
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('penerimaan.pdf',array('Attachment'=>0));	
    }


}
