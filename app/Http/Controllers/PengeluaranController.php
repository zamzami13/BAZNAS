<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\Pengeluarandet;
use App\Penerimaan;
use App\Penerimaandet;
use App\Daftbank;
use App\Matangr;
use App\Pergeseran;
use DB;

class PengeluaranController extends Controller
{
    public function index()
    {
    	$pengeluaran=Pengeluaran::latest()->get();
    	$pengeluarandet=Pengeluarandet::latest()->get();
        $rekbank=Daftbank::where('id','<>',13)->get();
        return view('pengeluaran.index',compact('pengeluaran','pengeluarandet','rekbank'));

    }

    public function create()
    {
    	$rekbank=Daftbank::all();		
    	$matangr = Matangr::where('type', 'D')->orderBy('kdrek')
                ->get();;
    	return view('pengeluaran.create',compact('rekbank','matangr'));
    }

    public function cek_nomor(Request $r){
        $nomor = $r->nomor;
        if(strlen($nomor)==5){
            $exist = DB::table('pengeluaran')->where('nokeluar', $nomor)->first();
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
        }else {
            return response()->json([
                'status' => false,
                'message' => 'Nomor Belum Lengkap'
            ]);
        }
    }
    public function cek_validasi_tambah(Request $r){
        $jenistransaksi = $r->jenis;
        $akun = $r->akun;
        $jumlah = $r->jumlah;
        $sumberdana = $r->sumber;
        $entri_sumber = array('HIBAH'=>0, 'AMIL'=>0, 'ZAKAT'=>0, 'INFAQ'=>0);
        for ($i = 0; $i< count($akun) ; $i++){
            // if($akun[$i]!=10 && $akun[$i] !=12){
            //     if($sumberdana[$i]=='H'){
            //         $entri_sumber['HIBAH'] +=$jumlah[$i]; 
            //     }
            //     if($sumberdana[$i]=='A'){
            //         $entri_sumber['AMIL'] +=$jumlah[$i];
            //     }
            // }

            if($akun[$i]==10){
                    $entri_sumber['ZAKAT'] +=$jumlah[$i]; 
                }
            else if($akun[$i]==12){
                    $entri_sumber['INFAQ'] +=$jumlah[$i]; 
                }
            else {
                 if($sumberdana[$i]=='H'){
                    $entri_sumber['HIBAH'] +=$jumlah[$i]; 
                }
                if($sumberdana[$i]=='A'){
                    $entri_sumber['AMIL'] +=$jumlah[$i];
                }
            }

        }
        //dd($entri_sumber);
        $pesan_invalid ="";
        $valid_jumlah = true;
        if($jenistransaksi=='Transfer'){
            $saldo_sumber['HIBAH'] = carisaldobank(999);
            $saldo_sumber['AMIL'] = carisaldobank(888);
            $saldo_sumber['ZAKAT'] = carisaldobank(4);
            $saldo_sumber['INFAQ'] = carisaldobank(5);

        }

        if($jenistransaksi=='Tunai'){
            $saldo_sumber['HIBAH'] = carisaldotunai(999);
            $saldo_sumber['AMIL'] = carisaldotunai(888);
            $saldo_sumber['ZAKAT'] = carisaldotunai(4);
            $saldo_sumber['INFAQ'] = carisaldotunai(5);
        }
        
        if($entri_sumber['HIBAH'] > $saldo_sumber['HIBAH']){
            $valid_jumlah  = false;
            $pesan_invalid .= ' Pengeluaran ' . $jenistransaksi . ' '. rupiah($entri_sumber['HIBAH']) . ' Melebihi Saldo Hibah ('.rupiah($saldo_sumber['HIBAH']) .')';
        }
         if($entri_sumber['AMIL'] > $saldo_sumber['AMIL']){
            $valid_jumlah  = false;
            $pesan_invalid .= ' Pengeluaran ' . $jenistransaksi . ' '. rupiah($entri_sumber['AMIL']) . ' Melebihi Saldo Amil ('.rupiah($saldo_sumber['AMIL']) .') ';
        }
        if($entri_sumber['ZAKAT'] > $saldo_sumber['ZAKAT']){
            $valid_jumlah  = false;
            $pesan_invalid .= ' Pengeluaran ' . $jenistransaksi . ' '. rupiah($entri_sumber['ZAKAT']) . ' Melebihi Saldo Zakat ('.rupiah($saldo_sumber['ZAKAT']) .')';
        }
        if($entri_sumber['INFAQ'] > $saldo_sumber['INFAQ']){
            $valid_jumlah  = false;
            $pesan_invalid .= ' Pengeluaran ' . $jenistransaksi . ' '. rupiah($entri_sumber['INFAQ']) . ' Melebihi Saldo Zakat ('.rupiah($saldo_sumber['INFAQ']) .')';
        }

        return response()->json(['status' => $valid_jumlah, 'message' =>$pesan_invalid ]);

    }

    public function insertdata(Request $request)
    {
    	$data = $request->all(); 
        // dd($data);
    	$pengeluaran = new Pengeluaran;
		$pengeluaran->jenistransaksi = $data['jenistransaksi'];
		$pengeluaran->nokeluar = $data['nokeluar'];
		$pengeluaran->tanggal = $data['tanggal'];
		if ($data['jenistransaksi']=='Tunai') {
    		$pengeluaran->penerima = $data['penerima'];
    		$pengeluaran->rekpenerima = '-';
    		$pengeluaran->daftbank_id = 13;
    	} else {
    		$pengeluaran->penerima = $data['penerima'];
    		$pengeluaran->rekpenerima =  $data['rekpenerima'];
    		$pengeluaran->daftbank_id = $data['daftbank_id'];
    	}		
		
		$pengeluaran->bukti = $data['bukti'];
		$pengeluaran->uraian = $data['uraian'];
		$pengeluaran->save();
        $sumberdana = '';

		if (count($data['matangr_id']) > 0) {
            
			foreach ($data['matangr_id'] as $key => $value) {
                if ($data['matangr_id'][$key]==10) {
                        $sumberdana = 'Z';
                    } else if ($data['matangr_id'][$key]==12) {
                        $sumberdana = 'I';
                    } else {
                        $sumberdana = $data['sumberdana'][$key];
                    }

				$data2 = array(
					'pengeluaran_id' => $pengeluaran->id,
					'matangr_id' => $data['matangr_id'][$key],
					'jumlah' => $data['jumlah'][$key],
                    'sumberdana' => $sumberdana,
                                                         
				);
				Pengeluarandet::create($data2);
			}
		}
        // Jika Hak Amil
        If(isset($data['hakamil'])){    
            $penerimaan = new Penerimaan;
            $penerimaan->jenistransaksi = $data['jenistransaksi'];
            $penerimaan->nomasuk = 'Md'.$data['nokeluar'];
            $penerimaan->tanggal = $data['tanggal'];
            $penerimaan->donatur = 'Baznas Batanghari';
            if ($data['jenistransaksi']=='Tunai') {
                $penerimaan->daftbank_id = 13;
                $penerimaan->rekpengirim = '-';
            } else {
                $penerimaan->daftbank_id = 17;
                $rekpengirima = Daftbank::where('id',$data['daftbank_id'])->get();
                foreach ($rekpengirima as $key ) {
                    $rekpengirimnya=$key->singkatan.' - '.$key->norekbank;
                }
                $penerimaan->rekpengirim = $rekpengirimnya;
            }
            $penerimaan->bukti = $data['bukti'];
            $penerimaan->uraian = $data['uraian'];
            $penerimaan->save();

            if (count($data['matangr_id']) > 0) {
                foreach ($data['matangr_id'] as $key => $value) {
                    if ($data['matangr_id'][$key]==10) {
                        $sumberdana = 'Z';
                    } else if ($data['matangr_id'][$key]==12) {
                        $sumberdana = 'I';
                    } else {
                        $sumberdana = $data['sumberdana'][$key];
                    }
                    $data2 = array(
                        'penerimaan_id' => $penerimaan->id,
                        'matangd_id' => 20,
                        'jumlah' => $data['jumlah'][$key],
                        'sumberdana' => $sumberdana,
                        );
                    Penerimaandet::create($data2);
                }
            }
        }
        
		return redirect('/pengeluaran')->with('sukses','Data berhasil ditambah');
    }

    public function hapusall($id)
    {
    	$pengeluaran = Pengeluaran::find($id);
        // dd($pengeluaran->nokeluar);
        if ($pengeluaran->penerima=='AMIL - BAZNAS') {
            $nohakamil = 'Md'.$pengeluaran->nokeluar;
            $penerimaan = Penerimaan::where('nomasuk',$nohakamil)->first();                
            Penerimaandet::where('penerimaan_id',$penerimaan->id)->delete();
            Penerimaan::where('id',$penerimaan->id)->delete();
        }
        $pengeluarandet = Pengeluarandet::all()->where('pengeluaran_id', $id);
        if (count($pengeluarandet) > 0) {
        	Pengeluarandet::where('pengeluaran_id', $id)->delete();
		}
		Pengeluaran::where('id', $id)->delete();
		return redirect('/pengeluaran')->with('sukses','Data berhasil dihapus');
    }

    public function creategeser(Request $request)
    {
        Pergeseran::create($request->all());
        return redirect('/pengeluaran')->with('sukses','Data berhasil ditambah');
    }
}
