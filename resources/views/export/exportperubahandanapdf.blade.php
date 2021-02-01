<!DOCTYPE html>
<html>
<head>
<style>
	/*font-family: Arial, Helvetica, sans-serif;*/
	table {
	  font-family: Arial, Helvetica, sans-serif;
	  font-size: 12px;
	  /*border-collapse: collapse;*/
	  width: 100%;
	}

	td, th {
	  /*border: 1px solid #000000;*/
	  text-align: left;
	  /*padding: 8px;*/
	}

	tr:nth-child(odd) {
		/*border: 1px solid #000000;*/
	  /*background-color: #dddddd;*/
	}
	th {
		text-align: center;
		/*background-color: #dddddd;*/
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
</style>
</head>
<body>

<p class="judul1"><STRONG>BADAN AMIN ZAKAT NASIONAL KABUPATEN BATANG HARI</STRONG></p>
<p class="judul2"><strong>LAPORAN PERUBAHAN DANA</strong></p>
<p class="judul3">Periode Dari Tanggal {{Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")}} Sampai dengan {{Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")}}</p>
<hr/>
<table>
  	<tr>
		<th></th>
		<th  style="text-align: right;">2020</th>
		<!-- <th>2021</th> -->
  	</tr>
  	<tr>
		<th style="text-align: left;">PENERIMAAN</th>
		<th></th>
		<!-- <th></th> -->
  	</tr>  	
  	@php  
	    $total=0
	@endphp
	@foreach($detpenerimaan as $d)
	<tr>  
		<td style="text-indent: 15px;">{{$d->nmrek}}</td>					    
		<td style="text-align: right;">@rupiah($d->total_jumlah)</td>
		<!-- <td style="text-align: right;">0</td> -->
	</tr>
	@php
		$total=$total+$d->total_jumlah;
	@endphp
	@endforeach
	<tr>
		<td style="text-indent: 15px;"><strong>Jumlah Penerimaan</strong></td>
		<td style="text-align: right;"><strong>@rupiah($total)</strong></td>
		<!-- <td style="text-align: right;"><strong>0</strong></td> -->
	</tr>

	<tr>
		<th style="text-align: left;">PENGELUARAN</th>
		<th></th>
		<!-- <th></th> -->
  	</tr>  	
  	@php  
	    $totalkel=0
	@endphp
	@foreach($detpengeluaran as $d)
	<tr>  
		<td style="text-indent: 15px;">{{$d->nmrek}}</td>					    
		<td style="text-align: right;">@rupiah($d->total_jumlah)</td>
		<!-- <td style="text-align: right;">0</td> -->
	</tr>
	@php
		$totalkel=$totalkel+$d->total_jumlah;
	@endphp
	@endforeach
	<tr>
		<td style="text-indent: 15px;"><strong>Jumlah Pengeluaran</strong></td>
		<td style="text-align: right;"><strong>@rupiah($totalkel)</strong></td>
		<!-- <td style="text-align: right;"><strong>0</strong></td> -->
	</tr>
	<tr>
		<th style="text-align: left;">Surplus (Depisit)</th>
		<th style="text-align: right;">@rupiah($total-$totalkel)</th>
		<th></th>
  	</tr>
	<tr>
		<th style="text-align: left;">Penerimaan Hak Amil</th>
		<th style="text-align: right;">@rupiah($hakamil)</th>
		<!-- <th></th> -->
  	</tr>  	
  	<tr>
		<th style="text-align: left;">Saldo Awal</th>
		<th style="text-align: right;">@rupiah(saldoawal())</th>
		<th></th>
  	</tr>
  	<tr>
		<th style="text-align: left;">Saldo Akhir</th>
		<th style="text-align: right;">@rupiah($total-$totalkel+saldoawal()+$hakamil)</th>
		<th></th>
  	</tr>
</table>

</body>
</html>


