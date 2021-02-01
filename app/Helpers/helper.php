<?php

use App\Pengeluarandet;
use App\Pengeluaran;
use App\Penerimaandet;
use App\Penerimaan;
use App\Pergeseran;
use App\Daftbank;
use App\Saldoawaltunai;
use App\Pejabat;
function rupiah ($expression){
	return number_format($expression,2,',','.');
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

function total($req){
	$jumlah=0;
	if ($req=='penerimaan') {
		$jumlah = Penerimaandet::whereNotIn('matangd_id',[16])->sum('jumlah');
	}
	if ($req=='pengeluaran') {
		$jumlah = Pengeluarandet::whereNotIn('matangr_id',[16])->sum('jumlah');
	}
	return $jumlah;

}

function carisaldoallbank(){

	$jmlpenerimaan = Penerimaandet::whereNotIn('matangd_id',[16,20])->sum('jumlah');
    $soawalbank = Daftbank::whereNotIn('id',[13])->sum('soawal');
    $jmlpengeluaran = Pengeluarandet::get()->where('pengeluaran.jenistransaksi','Transfer')->where('pengeluaran.penerima','<>','AMIL - BAZNAS')->sum('jumlah');
    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->sum('jumlah');
    $geserketunai = Pergeseran::where('jenistransaksi','ketunai')->sum('jumlah');
    $saldo=$jmlpenerimaan+$soawalbank-$jmlpengeluaran-$geserketunai+$geserkebank;
    return $saldo;
}

function carisaldoalltunai(){

    $soawaltunai = Saldoawaltunai::sum('saldo');
    $jmlpenerimaantunai = Penerimaandet::get()->where('penerimaan.jenistransaksi','Tunai')->sum('jumlah');
	$jmlpergeseran = Pengeluarandet::where('matangr_id',16)->sum('jumlah');
    $jmlpengeluaran = Pengeluarandet::whereNotIn('matangr_id',[16])->get()->where('pengeluaran.jenistransaksi','Tunai')->sum('jumlah');
    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->sum('jumlah');
    $geserketunai = Pergeseran::where('jenistransaksi','ketunai')->sum('jumlah');
    $saldo=$soawaltunai+$jmlpenerimaantunai+$jmlpergeseran-$jmlpengeluaran+$geserketunai-$geserkebank;
    return $saldo;
}

function carisaldobank($rek){

	$datapenerimaan = DB::table('penerimaandet')
	            ->join('penerimaan', 'penerimaandet.penerimaan_id', '=', 'penerimaan.id')
	            ->join('daftbank', 'penerimaan.daftbank_id', '=', 'daftbank.id')
	            ->select('penerimaandet.*', 'penerimaan.jenistransaksi', 'daftbank.sumberdana')
	            ->get();
	$datapengeluaran = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->select('pengeluarandet.*', 'pengeluaran.jenistransaksi', 'daftbank.sumberdana')
	            ->get();
	$datapengeluaranbank = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->select('pengeluarandet.*', 'pengeluaran.jenistransaksi')
	            ->get();
	$geserbungakebank = 0;
	$geserbungaketunai = 0;	            	                        
	switch ($rek) {
	  case 4:
	    $soawalbank = Daftbank::whereIn('sumberdana',['Zakat'])->sum('soawal');
	  	$jmlpenerimaan = $datapenerimaan->where('jenistransaksi','Transfer')->where('matangd_id',4)->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaranbank->where('jenistransaksi','Transfer')->where('sumberdana','Z')->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Zakat')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Zakat')->sum('jumlah');
	    break;
	  case 5:
	    $soawalbank = Daftbank::whereIn('sumberdana',['Infaq'])->sum('soawal');
	  	$jmlpenerimaan = $datapenerimaan->where('jenistransaksi','Transfer')->where('matangd_id',5)->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaran->where('jenistransaksi','Transfer')->where('sumberdana','Infaq')->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Infaq')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Infaq')->sum('jumlah');
	    break;
	  case 999:
	    $soawalbank = Daftbank::whereIn('sumberdana',['Hibah'])->sum('soawal');
	  	$jmlpenerimaan = $datapenerimaan->where('jenistransaksi','Transfer')->whereIn('matangd_id',[7,8,9,10])->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaran->where('jenistransaksi','Transfer')->where('sumberdana','Hibah')->where('matangr_id','<>',20)->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Hibah')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Hibah')->sum('jumlah');
	     break;
	  default:
	    $soawalbank = Daftbank::whereIn('sumberdana',['Semua'])->sum('soawal');
	  	$jmlpenerimaan = $datapenerimaan->where('jenistransaksi','Transfer')->whereIn('matangd_id',[23,20])->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaranbank->where('jenistransaksi','Transfer')->where('sumberdana','A')->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Semua')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Semua')->sum('jumlah');
    	$geserbungakebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',1)->get()->sum('jumlah');
    	$geserbungaketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',1)->get()->sum('jumlah');
	}
    $saldo=$jmlpenerimaan+$soawalbank-$jmlpengeluaran-$geserketunai+$geserkebank-$geserbungaketunai+$geserbungakebank;
    return $saldo;
}

function carisaldotunai($rek){
	
	$datapenerimaan = DB::table('penerimaandet')
	            ->join('penerimaan', 'penerimaandet.penerimaan_id', '=', 'penerimaan.id')
	            ->join('daftbank', 'penerimaan.daftbank_id', '=', 'daftbank.id')
	            ->where('penerimaan.jenistransaksi','Tunai')
	            ->select('penerimaandet.*', 'penerimaan.jenistransaksi', 'daftbank.sumberdana')
	            ->get();
	$datapengeluaran = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->where('pengeluaran.jenistransaksi','Tunai')
	            ->select('pengeluarandet.*', 'pengeluaran.jenistransaksi', 'daftbank.sumberdana')
	            ->get();
	$datapengeluarantunai = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->where('pengeluaran.jenistransaksi','Tunai')
	            ->select('pengeluarandet.*', 'pengeluaran.jenistransaksi')
	            ->get();
	$geserbungakebank = 0;
	$geserbungaketunai = 0;	                        
	switch ($rek) {
	  case 4:
	  	$jmlpenerimaan = $datapenerimaan->where('sumberdana','Zakat')->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaran->where('matangr_id',10)->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Zakat')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Zakat')->sum('jumlah');
    	$soawaltunai = Saldoawaltunai::where('namasaldo','Zakat')->sum('saldo');
	    break;
	  case 5:
	  	$jmlpenerimaan = $datapenerimaan->where('sumberdana','Infaq')->sum('jumlah');
	    $jmlpengeluaran = $datapengeluaran->where('matangr_id',12)->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Infaq')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Infaq')->sum('jumlah');
    	$soawaltunai = Saldoawaltunai::where('namasaldo','Infaq')->sum('saldo');
	    break;
	  case 999:
	  	$jmlpenerimaan = $datapenerimaan->where('sumberdana','Hibah')->sum('jumlah');
	    $jmlpengeluaran = $datapengeluarantunai->where('sumberdana','H')->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Hibah')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Hibah')->sum('jumlah');
    	$soawaltunai = Saldoawaltunai::where('namasaldo','Hibah')->sum('saldo');
	     break;
	  case 888:
	  	$jmlpenerimaan = $datapenerimaan->where('sumberdana','Semua')->sum('jumlah');
	    $jmlpengeluaran =  $datapengeluarantunai->where('sumberdana','A')->sum('jumlah');
	    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Semua')->sum('jumlah');
    	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank.sumberdana','Semua')->sum('jumlah');
    	$geserbungakebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',1)->get()->sum('jumlah');
    	$geserbungaketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',1)->get()->sum('jumlah');
    	$soawaltunai = Saldoawaltunai::where('namasaldo','Amil')->sum('saldo');
    	break;
	}
    $saldo=$soawaltunai+$jmlpenerimaan-$jmlpengeluaran+$geserketunai-$geserkebank+$geserbungaketunai-$geserbungakebank;
    return $saldo;
}
function jumlahpenerimaan($id){
	if ($id =='amil') {
		$datapenerimaan = DB::table('penerimaandet')
						->join('matangd','penerimaandet.matangd_id','=','matangd.id')
						->whereIn('matangd.kdrek',['6.1.1.','4.2.1.01.'])->sum('jumlah');		
	} elseif ($id =='baznas') {
		$datapenerimaan = DB::table('penerimaandet')
						->join('matangd','penerimaandet.matangd_id','=','matangd.id')
						->sum('jumlah');
	} else {
		$datapenerimaan = DB::table('penerimaandet')
						->join('matangd','penerimaandet.matangd_id','=','matangd.id')
						->where('matangd.kdrek','like',$id)->sum('jumlah');
	}
		
	return $datapenerimaan;
}

function jumlahpengeluaran($id){
	if ($id =='S') {
		$datapengeluaran = DB::table('pengeluarandet')
						->join('matangr','pengeluarandet.matangr_id','=','matangr.id')
						->sum('jumlah');		
	} else {
		$datapengeluaran = DB::table('pengeluarandet')
						->join('matangr','pengeluarandet.matangr_id','=','matangr.id')
						->where('pengeluarandet.sumberdana',$id)->sum('jumlah');
	}
	return $datapengeluaran;
}

function saldobankrinci($id){
	$rekbank=Daftbank::where('id',$id);	
	$saldoawal = $rekbank->where('id',$id)->sum('soawal');
	$datapenerimaan = DB::table('penerimaandet')
	            ->join('penerimaan', 'penerimaandet.penerimaan_id', '=', 'penerimaan.id')
	            ->join('daftbank', 'penerimaan.daftbank_id', '=', 'daftbank.id')
	            ->where('penerimaan.daftbank_id',$id)
	            ->select('penerimaandet.jumlah')
	            ->sum('penerimaandet.jumlah');
	$datapengeluaran = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->where('pengeluaran.daftbank_id',$id)
	            ->where('pengeluaran.jenistransaksi','Transfer')
	            ->select('pengeluarandet.jumlah')
	            ->sum('pengeluarandet.jumlah');
	$geserketunai = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',null)->get()->where('daftbank_id',$id)->sum('jumlah');
	$setorkebank = Pergeseran::where('jenistransaksi','kebank')->where('kodetrans',null)->get()->where('daftbank_id',$id)->sum('jumlah');
	$geserbunga	= Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',1)->get()->where('daftbank_id',$id)->sum('jumlah');
	$saldo=$saldoawal+$datapenerimaan-$datapengeluaran-$geserketunai-$geserbunga+$setorkebank;
	// $saldo=$datapengeluaran;
	return $saldo;
}

function saldobunga($id){
	$datapenerimaan = DB::table('penerimaandet')
	            ->join('penerimaan', 'penerimaandet.penerimaan_id', '=', 'penerimaan.id')
	            ->join('daftbank', 'penerimaan.daftbank_id', '=', 'daftbank.id')
	            ->where('penerimaan.daftbank_id',$id)
	            ->where('penerimaandet.matangd_id',23)
	            ->select('penerimaandet.jumlah')
	            ->sum('penerimaandet.jumlah');
	$geserbunga = Pergeseran::where('jenistransaksi','ketunai')->where('kodetrans',1)->get()->where('daftbank_id',$id)->sum('jumlah');
	$biayaadmbank = DB::table('pengeluarandet')
	            ->join('pengeluaran', 'pengeluarandet.pengeluaran_id', '=', 'pengeluaran.id')
	            ->join('daftbank', 'pengeluaran.daftbank_id', '=', 'daftbank.id')
	            ->where('pengeluaran.daftbank_id',$id)
	            ->where('pengeluaran.jenistransaksi','Transfer')
	            ->where('pengeluarandet.matangr_id',20)
	            ->select('pengeluarandet.jumlah')
	            ->sum('pengeluarandet.jumlah');
	$saldo=$datapenerimaan-$geserbunga-$biayaadmbank;
	return $saldo;	            
}
	
function saldoawal(){
    $soawalbank = Daftbank::whereNotIn('id',[13])->sum('soawal');
  	$soawaltunai = Saldoawaltunai::sum('saldo');
  	$saldo=$soawaltunai+$soawalbank;
    return $saldo;
}

function saldoawaltanggal($tanggalawal){
    $soawalbank = Daftbank::whereNotIn('id',[13])->sum('soawal');
    $soawaltunai = Saldoawaltunai::sum('saldo');
    $penerimaan = DB::table('penerimaandet')
    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
    			->where('penerimaan.tanggal','<',$tanggalawal)
    			->sum('penerimaandet.jumlah');
	$pengeluaran = DB::table('pengeluarandet')
    			->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
    			->where('pengeluaran.tanggal','<',$tanggalawal)
    			->sum('pengeluarandet.jumlah');    			
  	$saldo=$soawaltunai+$soawalbank+$penerimaan-$pengeluaran;
    return $saldo;
}

function carisaldoalltunaitanggal($tanggal){

    $soawaltunai = Saldoawaltunai::sum('saldo');
   	$jmlpenerimaantunai = DB::table('penerimaandet')
    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
    			->where('penerimaan.jenistransaksi','Tunai')
    			->where('penerimaan.tanggal','<=',$tanggal)
    			->sum('penerimaandet.jumlah');
	$jmlpergeseran = Pengeluarandet::where('matangr_id',16)->sum('jumlah');
    // $jmlpengeluaran = Pengeluarandet::whereNotIn('matangr_id',[16])->get()->where('pengeluaran.jenistransaksi','Tunai')->sum('jumlah');
    $jmlpengeluaran = DB::table('pengeluarandet')
    			->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
    			->where('pengeluaran.jenistransaksi','Tunai')
    			->where('pengeluaran.tanggal','<=',$tanggal)
    			->sum('pengeluarandet.jumlah'); 
    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->sum('jumlah');
    $geserketunai = Pergeseran::where('jenistransaksi','ketunai')->sum('jumlah');
    $saldo=$soawaltunai+$jmlpenerimaantunai+$jmlpergeseran-$jmlpengeluaran+$geserketunai-$geserkebank;
    return $saldo;
}

function carisaldoallbanktanggal($tanggal){
    $soawalbank = Daftbank::whereNotIn('id',[13])->sum('soawal');
	$jmlpenerimaan =  DB::table('penerimaandet')
						->whereNotIn('matangd_id',[16,20])
						->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
		    			->where('penerimaan.jenistransaksi','Transfer')
		    			->where('penerimaan.tanggal','<=',$tanggal)
		    			->sum('penerimaandet.jumlah');

    $jmlpengeluaran = DB::table('pengeluarandet')
    			->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
    			->where('pengeluaran.jenistransaksi','Transfer')
    			->where('pengeluaran.tanggal','<=',$tanggal)
    			->sum('pengeluarandet.jumlah'); 
    $geserkebank = Pergeseran::where('jenistransaksi','kebank')->sum('jumlah');
    $geserketunai = Pergeseran::where('jenistransaksi','ketunai')->sum('jumlah');
    $saldo=$jmlpenerimaan+$soawalbank-$jmlpengeluaran-$geserketunai+$geserkebank;
    return $saldo;
}

function ttd($jabatan){
	if ($jabatan == 'KETUA') {
		$ttd=Pejabat::where('jabatan','KETUA')->get(['nama']);
	} else {
		$ttd=Pejabat::where('jabatan','BENDAHARA')->get(['nama']);
	}
	foreach ($ttd as $key) {
		$ttd2=$key->nama;
	}
	// dd($ttd);
	return $ttd2;
}

function saldoawalzakattanggal($tanggalawal){
    $soawalbank = Daftbank::whereNotIn('id',[13])->where('sumberdana','Zakat')->sum('soawal');
    $soawaltunai = Saldoawaltunai::where('namasaldo','Zakat')->sum('saldo');
    $penerimaan = DB::table('penerimaandet')
    			->where('matangd_id',4)
    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
    			->where('penerimaan.tanggal','<',$tanggalawal)
    			->sum('penerimaandet.jumlah');
	$pengeluaran = DB::table('pengeluarandet')
				->where('matangr_id',10)
    			->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
    			->where('pengeluaran.tanggal','<',$tanggalawal)
    			->sum('pengeluarandet.jumlah');    			
  	$saldo=$soawaltunai+$soawalbank+$penerimaan-$pengeluaran;
    return $saldo;
}

function carisaldorektunaitanggal($tanggal,$nmrek){

	switch ($nmrek) {
		case 'ZAKAT':
			$soawaltunai = Saldoawaltunai::where('namasaldo','Zakat')->sum('saldo');
		   	$jmlpenerimaantunai = DB::table('penerimaandet')
		   				->where('matangd_id',4)
		    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
		    			->where('penerimaan.jenistransaksi','Tunai')
		    			->where('penerimaan.tanggal','<=',$tanggal)
		    			->sum('penerimaandet.jumlah');
		    $jmlpengeluaran = DB::table('pengeluarandet')
		    			->where('matangr_id',10)
		    			->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
		    			->where('pengeluaran.jenistransaksi','Tunai')
		    			->where('pengeluaran.tanggal','<=',$tanggal)
		    			->sum('pengeluarandet.jumlah'); 
		    $geserkebank = Pergeseran::where('jenistransaksi','kebank')
		    			->join('daftbank','daftbank.id','=','pergeseran.daftbank_id')
		    			->where('daftbank.sumberdana','Zakat')
		    			->sum('jumlah');
		    $geserketunai = Pergeseran::where('jenistransaksi','ketunai')->join('daftbank','daftbank.id','=','pergeseran.daftbank_id')->where('daftbank.sumberdana','Zakat')->sum('jumlah');
			break;
		
		default:
			# code...
			break;
	}

    
    $saldo=$soawaltunai+$jmlpenerimaantunai-$jmlpengeluaran+$geserketunai-$geserkebank;
    return $saldo;
}
