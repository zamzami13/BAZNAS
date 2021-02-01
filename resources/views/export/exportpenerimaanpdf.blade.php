<!DOCTYPE html>
<html>
<head>
<style>
	table {
	  font-family: "Times New Roman", Times, serif;
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
</style>
</head>
<body>

<h2>Penerimaan Baznas Kabupaten Batang Hari</h2>
<p>Dari Tanggal {{Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")}} Sampai dengan {{Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")}}</p>

<table>
  	<tr>
    	<th>No</th>
		<th>Nomor</th>
		<th>Tanggal</th>
		<th>Donatur</th>
		<th>Bukti</th>
		<th>Uraian</th>
		<th>Rekening</th>
		<th>Jumlah</th>
  	</tr>
  	@php  
	    $no=1;
	    $total=0
	@endphp
	@foreach($penerimaan as $d)
	<tr>  
		<td>{{$no}}</td>
		<td>{{$d->nomasuk}}</td>
		<td>{{Carbon\Carbon::parse($d->tanggal)->format("d/m/Y")}}</td>
		<td>{{$d->donatur}}</td>
		<td>{{$d->bukti}}</td>
		<td>{{$d->uraian}}
			<hr>
			@foreach ($d->penerimaandet as $det)
				<p class="detailuraian">{{$det->matangd->nmrek}} = @rupiah($det->jumlah)</p>
			@endforeach
		</td>						    
		<td>{{$d->daftbank->singkatan}}</td>
		<td style="text-align: right;">@rupiah($d->penerimaandet->sum('jumlah'))
		</td>
	</tr>
	@php
		$total=$total+($d->penerimaandet->sum('jumlah'));
	    $no++;
	@endphp
	@endforeach
	<tr>
		<td colspan="7">Total</td>
		<td style="text-align: right;">@rupiah($total)</td>
	</tr>
</table>

</body>
</html>


