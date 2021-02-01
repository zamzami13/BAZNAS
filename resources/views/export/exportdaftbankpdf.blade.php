<table class="table" style="border: 1px solid #ddd">
	<thead>
		<tr>
			<th>Kode Bank</th>
			<th>Nama Bank</th>
			<th>Singkatan</th>
			<th>Rekenig Bank</th>
			<th>Nama Rekening</th>
			<th>Alamat Bank</th>
			<th>Telepon Bank</th>
		</tr>
	</thead>
	<tbody>
		@foreach($daftbank as $data)
			<tr>
				<td>{{$data->kodebank}}</td>
				<td>{{$data->namabank}}</td>
				<td>{{$data->singkatan}}</td>
				<td>{{$data->norekbank}}</td>
				<td>{{$data->nmrekbank}}</td>
				<td>{{$data->alamat}}</td>
				<td>{{$data->telpon}}</td>
				
			</tr>
		@endforeach
	</tbody>
	
</table>