@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <meta name="csrf_token" content="{{ csrf_token()}}">
@stop
@section ('master')

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">Edit Penerimaan</h3>
	</div>
	<form action="/penerimaan/{{$penerimaan->id}}/updateinsert" method="POST">
		{{csrf_field()}}
		<div class="card-body">
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label >Nomor Register:</label>
						<input name="nomasuk" class="form-control form-control-sm" type="text" value="{{$penerimaan->nomasuk}}">
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Cara Terima:</label>
						<select name="jenistransaksi" class="form-control form-control-sm">
	                      <option value="Transfer" @if($penerimaan->jenistransaksi=='Transfer') selected @endif>Transfer</option>
	                      <option value="Tunai" @if($penerimaan->jenistransaksi=='Tunai') selected @endif>Tunai</option>	
	                  	</select>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Rekening Pengirim:</label>
						<input name="rekpengirim" class="form-control form-control-sm" type="text" value="{{$penerimaan->rekpengirim}}">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Rekening Terima:</label>
						<select name="daftbank_id" class="form-control form-control-sm">
							@foreach($rekbank as $rek)
								<option value="{{$rek->id}}" @if($penerimaan->daftbank_id==$rek->id) selected @endif>  {{$rek->singkatan}} - {{$rek->norekbank}}</option>
							@endforeach                      	                          
	                    </select>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Muzakki:</label>
						<input name="donatur" class="form-control form-control-sm" type="text" value="{{$penerimaan->donatur}}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label>Tanggal:</label>
	                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
	                        <input name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{$penerimaan->tanggal}}">
	                    </div>
	                </div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label >Dok Pendukung:</label>
						<input name="bukti" class="form-control form-control-sm" value="{{$penerimaan->bukti}}">
					</div>
				</div>
				<div class="col-sm-7">
					<div class="form-group">
						<label>Uraian:</label>
	                	<textarea name="uraian"class="form-control form-control-sm" rows="3">{{$penerimaan->uraian}}</textarea>
	              </div>
	            </div>
			</div>

			<div class="card">
				<div class="card-header">Rincian Penerimaan</div>
				<div class="card-body">
					<!-- <h5 class="card-title">Special title treatment</h5> -->
					@foreach ($penerimaandet as $det)
					<input name="id[]" type="numeric" class="form-control form-control-sm" value="{{$det->id}}" hidden="">
					<div class="row">
						<div class="col-3">
							<div class="form-group">
								<select name="matangd_id[]" class="form-control form-control-sm">
									@foreach($matangd as $r)
										<option value="{{$r->id}}" @if($det->matangd_id==$r->id) selected @endif >{{$r->nmrek}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<input name="jumlah[]" type="text" class="form-control form-control-sm" value="{{$det->jumlah}}" onKeyPress="return kodeScript(event,'0123456789.',this)">
			                </div>	
						</div>
						<div class="col-3">
							<div class="form-group">
								<a href="#" class="hapusbaris btn btn-danger btn-xs" muser-id="{{$det->id}}" muser-nama="{{$det->matangd->nmrek}}">Hapus</a>
							</div>
						</div>
					</div>
					@endforeach
					<div class="rinci"></div>
					<a href="#" class="tambahrinci btn btn-primary btn-sm">Tambah rincian</a>
				</div>
			</div>
		</div>

		<div class="card-footer bg-gray disabled color-palette">
			<button type="submit" class="btn btn-success">Simpan</button>
			<a href="/penerimaan" class="btn btn-warning">Batal</a>
		</div>
	</form>
	
</div>
@stop

@section ('footer')
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript">
		$('.tambahrinci').on('click', function(){
			tambahrinci();
		});
		function tambahrinci(){
			var rinci = '<div><div class="row"><div class="col-3"><div class="form-group"><select name="matangd_idtambah[]" class="form-control form-control-sm">@foreach($matangd as $r)<option value="{{$r->id}}">{{$r->nmrek}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><input name="jumlahtambah[]" type="text" class="form-control form-control-sm" placeholder="Jumlah" required="" onKeyPress="return kodeScript(event,'+"'0123456789.'"+',this)"></div></div><div class="col-3"><div class="form-group"><a href="#" class="hapusbaris2 btn btn-danger btn-xs">Hapus</a></div></div></div></div>';
			$('.rinci').append(rinci);
		};

		$('.hapusbaris').click(function(){
			var muser_id = $(this).attr('muser-id');
			var muser_nama = $(this).attr('muser-nama');
			var token = $("meta[name='csrf_token']").attr("content");
			swal({
			  title: "Yakin!",
			  text: muser_nama+" akan dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$(this).parent().parent().parent().remove();
			    // window.location = "/penerimaan/"+muser_id+"/delete";
			    $.ajax({
			    	url: "/penerimaan/"+muser_id+"/deletechild",
			    	type:"DELETE",
			    	data: {
			    		_token: token,
			    		id:muser_id,
			    	},
			    	success: function(response){
			    		toastr.success("Rincian telah dihapus", "Sukses")
			    	}

			    })
			  } 
			});

		});

		$(document).on("click", ".hapusbaris2", function() {
       		$(this).parent().parent().parent().remove(); 
		});
	</script>
@stop



                  