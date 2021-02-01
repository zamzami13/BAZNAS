@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Ubah Data Rekening</h3>
	</div>
	<form role="form"action="/daftbank/{{$daftbank->id}}/update" method="POST">
		{{csrf_field()}}
		<div class="card-body">
			<div class="row">
		        <div class="col-3">
					<div class="form-group">
						<label for="exampleInputEmail1">Kode Bank</label>
						<input name="kodebank" class="form-control" value="{{$daftbank->kodebank}}">
					</div>
				</div>
				<div class="col-9">
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Bank</label>
						<input name="namabank" class="form-control" value="{{$daftbank->namabank}}">
                  	</div>
				</div>
			</div>
			<div class="row">
		        <div class="col-3">
					<div class="form-group">
						<label for="exampleInputEmail1">Nomor Rekening</label>
						<input name="norekbank" type="text" class="form-control" value="{{$daftbank->norekbank}}">
					</div>
				</div>
				<div class="col-9">
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Rekening</label>
						<input name="nmrekbank" type="text" class="form-control" value="{{$daftbank->nmrekbank}}">
                  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label for="exampleInputPassword1">Telpon Bank</label>
						<input name="telpon" type="text" class="form-control" value="{{$daftbank->telpon}}">
                  	</div>
				</div>
		        <div class="col-9">
					<div class="form-group">
						<label for="exampleInputEmail1">Singkatan Nama Rekening</label>
						<input name="singkatan" type="text" class="form-control" value="{{$daftbank->singkatan}}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label for="exampleInputPassword1">Saldo Awal</label>
						<input name="soawal" class="form-control" onKeyPress="return kodeScript(event,'0123456789.',this)" value="{{$daftbank->soawal}}">
                  	</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label for="exampleInputPassword1">Sumber Dana</label>
						<select  name="sumberdana" class="form-control">
	                      <option value="Zakat" @if($daftbank->sumberdana=='Zakat') selected @endif>Zakat</option>
	                      <option value="Infaq" @if($daftbank->sumberdana=='Infaq') selected @endif>Infaq</option>
	                      <option value="Hibah" @if($daftbank->sumberdana=='Hibah') selected @endif>Hibah</option>	
	                      <option value="Semua" @if($daftbank->sumberdana=='Semua') selected @endif>Semua</option>
	                  	</select>
                  	</div>
				</div>
		        <div class="col-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Alamat Bank</label>
						<textarea name="alamat" class="form-control" rows="3" >{{$daftbank->alamat}}</textarea>
					</div>
				</div>
			</div>                  
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@stop
