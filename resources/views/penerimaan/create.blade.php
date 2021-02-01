@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">Entri Penerimaan</h3>
	</div>
	<form action="/penerimaan/insertdata" method="POST">
		{{csrf_field()}}
		<div class="card-body">
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label >Nomor Register:</label>
						<input name="nomasuk" id="entri_nomor" class="form-control form-control-sm" type="text" placeholder="M-XXX" required="" maxlength="5" minlength="5">
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Cara Terima:</label>
						<select id="jenistransaksi" name="jenistransaksi" class="form-control form-control-sm" onchange="ambiljnstrans()">
	                      <option value="Transfer">Transfer</option>
	                      <option value="Tunai">Tunai</option>	                        
	                    </select>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Rekening Pengirim:</label>
						<input id="rekpengirim" name="rekpengirim" class="form-control form-control-sm" type="text" placeholder="Rekening Bank" required="">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Rekening Terima:</label>
						<select id="daftbank_id" name="daftbank_id" class="form-control form-control-sm">
							@foreach($rekbank as $rek)
								<option value="{{$rek->id}}">{{$rek->singkatan}} - {{$rek->norekbank}}</option>
							@endforeach                      	                          
	                    </select>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Muzakki / Pemberi:</label>
						<input name="donatur" class="form-control form-control-sm" type="text" placeholder="Yang memberi dana" required="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label>Tanggal:</label>
	                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
	                        <input name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
	                    </div>
	                </div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label >Dok Pendukung:</label>
						<input name="bukti" class="form-control form-control-sm" type="text" placeholder="Dokumen pendukung" required="">
					</div>
				</div>
				<div class="col-sm-7">
					<div class="form-group">
						<label>Uraian:</label>
	                	<textarea name="uraian"class="form-control form-control-sm" rows="3" placeholder="Uraian ..." required=""></textarea>
	              </div>
	            </div>
			</div>
			<hr>
			<div class="row">
				<div class="form-control-sm">
					<h3 class="card-title">Rincian Penerimaan</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">

						<select id="matangd_id" name="matangd_id[]" class="form-control form-control-sm">
							@foreach($matangd as $r)
								<option value="{{$r->id}}">{{$r->nmrek}}</option>
							@endforeach                          
	                    </select>
<!-- 	                    <select id="matangd_id_hide" name="matangd_id[]" class="form-control form-control-sm" hidden="" disabled="">
								<option value="17">Penyetoran Dana</option>                         
	                    </select> -->
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">					
							<input name="jumlah[]" type="text" class="form-control form-control-sm" placeholder="Jumlah" onKeyPress="return kodeScript(event,'0123456789.',this)" required="">
	                </div>	
				</div>
				<div class="col-3">
					<div class="form-group">
						<a id="tambahrinci" href="#" class="tambahrinci btn btn-success btn-xs">Tambah</a>
					</div>
				</div>
			</div>
			<div class="rinci"></div>
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
			var rinci = '<div><div class="row"><div class="col-3"><div class="form-group"><select name="matangd_id[]" class="form-control form-control-sm">@foreach($matangd as $r)<option value="{{$r->id}}">{{$r->nmrek}}</option>@endforeach</select></div></div><div class="col-3"><div class="form-group"><input name="jumlah[]" type="numeric" class="form-control form-control-sm" placeholder="Jumlah" required="" onKeyPress="return kodeScript(event,'+"'0123456789.'"+',this)"></div></div><div class="col-3"><div class="form-group"><a href="#" class="hapusbaris btn btn-danger btn-xs">Hapus</a></div></div></div></div>';
			$('.rinci').append(rinci);
		};

		$(document).on("click", ".hapusbaris", function() {
       		$(this).parent().parent().parent().remove(); 
		});

		//Seting jenis transaksi
		function ambiljnstrans() {
            var acr = document.getElementById("jenistransaksi").value;            
            if (acr=='Tunai') {
            	document.getElementById('rekpengirim').value='-';
            	document.getElementById('daftbank_id').value=13;
            	$( "#daftbank_id" ).prop( "disabled", true );
            	$( "#rekpengirim" ).prop( "disabled", true );
            } else {
            	$( "#daftbank_id" ).prop( "disabled", false );
            	$( "#rekpengirim" ).prop( "disabled", false );
            }             
        }

        $("#entri_nomor").on('change', function(){
        	$nomor = $(this).val();
        	if($nomor.length==5){
        		$.get("{{url('penerimaan/cek-nomor')}}?nomor="+$nomor, function(respon){
        			if(respon.status!=true){
        				toastr.error(respon.message);
        			}
        		})
        	}
        })
	</script>
@stop



                  