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

class LaporanController extends Controller
{
    public function index()
    {
    	$rekbank=Daftbank::all();		
    	$matangd = Matangd::all()->where('type', 'D');
    	return view('laporan.laprealisasiform',compact('rekbank','matangd'));
    }

    public function perubahandanaexportpdf(Request $request)
    {
        $data = $request->all();
    	$penerimaan = Penerimaan::where('nomasuk','not like','Md%')->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])->latest()->get();

// DB::table('users')->insert(
//     ['email' => 'john@example.com', 'votes' => 0]
// );

        $matangd = DB::table('matangd')	            
	            ->select('id','kdrek','nmrek')
	            ->latest()->get();

        /*$i=0;
        $cnt=count($matangd);
        for($i; $i < $cnt; $i++){
        	$matangd[$i]->jumlah=0;
        }*/
    	
    	$detpenerimaan = DB::table('penerimaandet')
    			->where('matangd_id','<>',20)
    			->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
    			->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
    			->join('matangd','penerimaandet.matangd_id','=','matangd.id')
                ->select('matangd_id','nmrek', DB::raw('SUM(jumlah) as total_jumlah'))
                ->groupBy('matangd_id','nmrek')
                ->havingRaw('SUM(jumlah)')
                ->get();
        $detpengeluaran = DB::table('pengeluarandet')
        		->join('pengeluaran','pengeluarandet.pengeluaran_id','=','pengeluaran.id')
        		->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
    			->join('matangr','pengeluarandet.matangr_id','=','matangr.id')
                ->select('matangr_id','nmrek', DB::raw('SUM(jumlah) as total_jumlah'))
                ->groupBy('matangr_id','nmrek')
                ->havingRaw('SUM(jumlah)')
                ->get();
        $penerimaanhakamil = DB::table('penerimaandet')
                ->where('matangd_id','=',20)
                ->join('penerimaan','penerimaandet.penerimaan_id','=','penerimaan.id')
                ->whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])
                ->SUM('jumlah');
        // dd($detpeneriman); 
// subquery
// $latestPosts = DB::table('posts')
//                    ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
//                    ->where('is_published', true)
//                    ->groupBy('user_id');

// $users = DB::table('users')
//         ->joinSub($latestPosts, 'latest_posts', function ($join) {
//             $join->on('users.id', '=', 'latest_posts.user_id');
//         })->get();


    	$pengeluaran = Pengeluaran::whereBetween('tanggal',[$data['tanggalawal'],$data['tanggalakhir']])->latest()->get();
    	// return view ('export.exportperubahandanapdf',compact('detpenerimaan','data','pengeluaran','detpengeluaran'));
    	
    	$pdf = PDF::loadView('export.exportperubahandanapdf',['detpenerimaan'=>$detpenerimaan,'data'=>$data,'pengeluaran'=>$pengeluaran,'detpengeluaran'=>$detpengeluaran,'hakamil'=>$penerimaanhakamil]);                
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('laperubahandana.pdf',array('Attachment'=>0));	
    }


}