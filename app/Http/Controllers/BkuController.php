<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerimaan;
use App\Penerimaandet;
use App\Pengeluaran;
use App\Pengeluarandet;
use App\Daftbank;
use App\Matangd;
use PDF;
use DB;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;

class BkuController extends Controller
{
    public function index()
    {
    	$rekbank=Daftbank::all();		
    	$matangd = Matangd::all()->where('type', 'D');
    	return view('bku.bkuform',compact('rekbank','matangd'));
    }

    public function bkuexportpdf(Request $request)
    {
        $data = $request->all();
    	$penerimaan = Penerimaan::where('nomasuk','not like','Md%')->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])->latest()->get();

        $matangd = DB::table('matangd')	            
	            ->select('id','kdrek','nmrek')
	            ->latest()->get();
    	
    	$detpenerimaan = DB::table('penerimaandet')
    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
    			->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
    			->join('matangd','penerimaandet.matangd_id','=','matangd.id')
                ->select('penerimaandet.*','penerimaan.*','matangd.nmrek','penerimaan.nomasuk as nomor')
                ->get();
        $detpengeluaran = DB::table('pengeluarandet')
        		->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
        		->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
    			->join('matangr','pengeluarandet.matangr_id','=','matangr.id')
                ->select('pengeluarandet.*','pengeluaran.*','matangr.nmrek','pengeluaran.nokeluar as nomor')
                ->get();
        $detgeserd = DB::table('pergeseran')
                ->join('daftbank','pergeseran.daftbank_id','=','daftbank.id')
                ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                ->select('pergeseran.*','pergeseran.jenistransaksi as nmrek')
                ->get();
        $detgeserk = DB::table('pergeseran')
                ->join('daftbank','pergeseran.daftbank_id','=','daftbank.id')
                ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                ->select('pergeseran.*','pergeseran.jenistransaksi as nmrek' )
                ->get();
        foreach ($detpenerimaan as $key => $value) {
             $detpenerimaan[$key]->dk ='DEBET';
        }
        foreach ($detgeserd as $key => $value) {
             $detgeserd[$key]->dk ='DEBET';
        }
        foreach ($detpengeluaran as $key => $value) {
             $detpengeluaran[$key]->dk ='KREDIT';
        }
        foreach ($detgeserk as $key => $value) {
             $detgeserk[$key]->dk ='KREDIT';
        }
              
        $det = $detpenerimaan->merge($detpengeluaran)->merge($detgeserd)->merge($detgeserk)->sortBy('tanggal')->sortBy('created_at');
        // dd($det);
    	return view ('export.exportbkupdf',compact('data','det'));
    	$pdf = PDF::loadView('export.exportbkupdf',['det'=>$det,'data'=>$data]);                
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('bku.pdf',array('Attachment'=>0));	
    }

    public function bkuakunexportpdf(Request $request)
    {
        $data = $request->all();

        switch ($data['matangd_id']) {
            case 4:
                $nmrek = 'ZAKAT'; 
                $penerimaan = Penerimaan::where('nomasuk','not like','Md%')->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])->latest()->get();

                $matangd = DB::table('matangd')             
                        ->select('id','kdrek','nmrek')
                        ->latest()->get();
                
                $detpenerimaan = DB::table('penerimaandet')
                        ->where('matangd_id',4)
                        ->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
                        ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                        ->join('matangd','penerimaandet.matangd_id','=','matangd.id')
                        ->select('penerimaandet.*','penerimaan.*','matangd.nmrek','penerimaan.nomasuk as nomor')
                        ->get();
                $detpengeluaran = DB::table('pengeluarandet')
                        ->where('matangr_id',10)
                        ->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
                        ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                        ->join('matangr','pengeluarandet.matangr_id','=','matangr.id')
                        ->select('pengeluarandet.*','pengeluaran.*','matangr.nmrek','pengeluaran.nokeluar as nomor')
                        ->get(); 
                $detgeserd = DB::table('pergeseran')
                        ->join('daftbank','pergeseran.daftbank_id','=','daftbank.id')
                        ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                        ->where('daftbank.sumberdana','Zakat')
                        ->select('pergeseran.*','pergeseran.jenistransaksi as nmrek')
                        ->get();
                $detgeserk = DB::table('pergeseran')
                        ->join('daftbank','pergeseran.daftbank_id','=','daftbank.id')
                        ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                        ->where('daftbank.sumberdana','Zakat')
                        ->select('pergeseran.*','pergeseran.jenistransaksi as nmrek' )
                        ->get();                           
                break;
            case 5:
                # code...
                break;
            }

        foreach ($detpenerimaan as $key => $value) {
             $detpenerimaan[$key]->dk ='DEBET';
        }
        foreach ($detgeserd as $key => $value) {
             $detgeserd[$key]->dk ='DEBET';
        }
        foreach ($detpengeluaran as $key => $value) {
             $detpengeluaran[$key]->dk ='KREDIT';
        }
        foreach ($detgeserk as $key => $value) {
             $detgeserk[$key]->dk ='KREDIT';
        }
              
        $det = $detpenerimaan->merge($detpengeluaran)->merge($detgeserd)->merge($detgeserk)->sortBy('tanggal')->sortBy('created_at');
        // $det = $detpenerimaan->merge($detpengeluaran)->sortBy('tanggal')->sortBy('created_at');
        return view ('export.exportbkuakunpdf',compact('data','det','nmrek'));
        // $pdf = PDF::loadView('export.exportbkupdf',['det'=>$det,'data'=>$data,'nmrek'=>$nmrek]);                
        // $pdf->setPaper('A4','portrait');
        // return $pdf->stream('bku.pdf',array('Attachment'=>0));  
    }


}