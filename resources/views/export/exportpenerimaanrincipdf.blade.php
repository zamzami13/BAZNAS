<!DOCTYPE html>
<html>
<head>
<style>
	table {
	  font-family: "Times New Roman", Times, serif;
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
</style>
</head>
<body>

<h2>Penerimaan Baznas Kabupaten Batang Hari</h2>
<p>Dari Tanggal {{Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")}} Sampai dengan {{Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")}}</p>
<p>Akun : {{$nmrek}}</p>

<table>
  	<tr>
    	<th>No</th>
		<th>Nomor</th>
		<th>Tanggal</th>
		<th>Donatur</th>
		<th>Bukti</th>
		<th>Rekening</th>
		<th>Jumlah</th>
  	</tr>
  	@php  
	    $no=1;
	    $total=0
	@endphp
	@foreach($penerimaandet as $d)
	<tr>  
		<td>{{$no}}</td>
		<td>{{$d->penerimaan->nomasuk}}</td>
		<td>{{Carbon\Carbon::parse($d->penerimaan->tanggal)->format("d/m/Y")}}</td>
		<td>{{$d->penerimaan->donatur}}</td>
		<td>{{$d->penerimaan->bukti}}</td>								    
		<td>{{$d->penerimaan->daftbank->singkatan}} - {{$d->penerimaan->daftbank->norekbank}}</td>
		<td style="text-align: right;">@rupiah($d->jumlah)
		</td>
	</tr>
	@php
		$total=$total+($d->jumlah);
	    $no++;
	@endphp
	@endforeach
	<tr>
		<td colspan="6">Total</td>
		<td style="text-align: right;">@rupiah($total)</td>
	</tr>
</table>

</body>
</html>


