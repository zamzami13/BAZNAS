<!DOCTYPE html>
<html>
<head>
	<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<style>
	table {
	  font-family: Arial, Helvetica, sans-serif;
	  font-size: 12px;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #000000;
	  text-align: left;
	  padding: 8px;
	}	

	tr:nth-child(odd) {
		border: 1px solid #000000;
	  background-color: #dddddd;
	}
	th {
		text-align: center;
		background-color: #dddddd;
	}
	.detailuraian {
	    font-size: 10px;
	    margin-block-start: 0em;
	    margin-block-end: 0em;
	}
	.judul1 { font-size:20px; 
				font-family: Arial, Helvetica, sans-serif;
				line-height: 0.1em;}
	.judul2 { font-size:20px; 
				font-family: Arial, Helvetica, sans-serif;
				line-height: 0.3em;}
	.judul3 { font-size:18px; line-height: 1.5em;}
	.judul4 { font-size:16px; line-height: 2;}
	.ttd {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
		margin-block-start: 0em;
	    margin-block-end: 0em;		
		border: none;
		padding: none;
		background-color: white;
	}
</style>
</head>
<body>

<p class="judul1"><STRONG>BADAN AMIN ZAKAT NASIONAL KABUPATEN BATANG HARI</STRONG></p>
<p class="judul2"><strong>BUKU KAS UMUM {{$nmrek}}</strong></p>
<p class="judul3">Periode Dari Tanggal {{Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")}} Sampai dengan {{Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")}}</p>
<hr/>
<table>
  	<tr>
		<th>NO</th>
		<th>TANGGAL</th>
		<th>NOMOR</th>
		<th>URAIAN</th>
		<th>AKUN</th>
		<th>DEBET</th>
		<th>KREDIT</th>
		<th>SALDO</th>
  	</tr>
  	@php  
	    $total=0;
	    $nilaid=0;
	    $nilaik=0;
	    $saldo=saldoawalzakattanggal($data['tanggalawal']);
	    $no=2;
	@endphp
  	<tr>
  		<td style="text-align: left;">1</td>
  		<td></td>
  		<td></td>
		<td style="text-align: left;">Saldo Awal</td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right;">@rupiah(saldoawalzakattanggal($data['tanggalawal']))</td>
  	</tr>  	

	@foreach($det as $d)
	<tr> 
		<td>{{$no}}</td> 
		<td>{{$d->tanggal}}</td>
		<td>{{$d->nomor}}</td>
		<td>{{$d->uraian}}</td>
		<td>{{$d->nmrek}}</td>
		<td style="text-align: right;">{{($d->dk)  == 'DEBET' ? rupiah($nilaid=$d->jumlah) : '-'}}</td>
		<td style="text-align: right;">{{($d->dk)  == 'KREDIT' ? rupiah($nilaik=$d->jumlah) : '-'}}</td>
		@php
			$no=$no+1;
			$saldo=$saldo+$nilaid-$nilaik;
			$nilaid=0;
	    	$nilaik=0;
		@endphp
		<td style="text-align: right;">@rupiah($saldo)</td>		
	</tr>
	@endforeach
</table>
<div class="row">
	<br>
	<p class="ttd" style="text-indent: 15px;">Saldo Tunai <strong>@rupiah(carisaldorektunaitanggal($data['tanggalakhir'],$nmrek))</strong></p>
	<p class="ttd" style="text-indent: 15px;">Saldo Bank <strong>@rupiah(carisaldoallbanktanggal($data['tanggalakhir']))</strong></p>
	<br>
</div>
<div class="row">
	<table>
		<tr >
			<td class="ttd" style="text-align: center;">Mengetahui</td>
			<td class="ttd" style="text-align: center;" width="230">Muara Bulian, {{tgl_indo($data['tanggalakhir'])}}</td>
		</tr>
		<tr>
			<td class="ttd" style="text-align: center;">KETUA</td>
			<td class="ttd" style="text-align: center;">BENDAHARA</td>
		</tr>
		<tr>
			<td class="ttd" style="text-align: center;" height="90">{{ttd('KETUA')}}</td>
			<td class="ttd" style="text-align: center;">{{ttd('BENDAHARA')}}</td>
		</tr>
	</table>
</div>
	
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>


