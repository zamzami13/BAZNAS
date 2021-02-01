@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@stop
@section ('master')
<div class="card card-info">
	<form action="/pengeluaran/insertdata" id="form-pengeluaran" method="POST">
		{{csrf_field()}}
	<div class="card-header">
		<h3 class="card-title">Entri Pengeluaran</h3>
        <div class="form-check text-right">
          <input name="hakamil" id="hakamil" class="form-check-input" type="checkbox" value="inihakamil" onclick="cekhakamil()">
          <label class="form-check-label" for="hakamil">Hak Amil</label>
        </div>
	</div>
		<div class="card-body">
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label >Nomor Register:</label>
						<input name="nokeluar" id="entri_nomor" class="form-control form-control-sm" type="text" placeholder="K-XXX" required="" maxlength="5" minlength="5">
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Jenis Pengeluaran:</label>
						<select id="jenistransaksi" name="jenistransaksi" class="form-control form-control-sm" onchange="ambiljnstrans()">
	                      <option value="Transfer">Transfer</option>
	                      <option value="Tunai">Tunai</option>	                          
	                    </select>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Rekening Bank Keluar</label>
						<select id="daftbank_id" name="daftbank_id" class="form-control form-control-sm">
							@foreach($rekbank as $rek)
								<option value="{{$rek->id}}">{{$rek->singkatan}} - {{$rek->norekbank}}</option>
							@endforeach
							</select>                      	                          
					</div>
				</div>


				<div class="col-2">
					<div class="form-group">
						<label >Rekening Penerima:</label>
						<input id="rekpenerima" name="rekpenerima" class="form-control form-control-sm" type="text" placeholder="Rekening Bank" required="">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Mustahiq / Penerima:</label>
						<input id="penerima" name="penerima" class="form-control form-control-sm" type="text" placeholder="Yang Menerima" required="">
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
					<h3 class="card-title">Rincian Pengeluaran</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-4" id="akunbelanja">
<!-- 					<div class="form-group">
						<label>Akun Belanja</label>
						<select id="matangr_id" name="matangr_id[]" class="form-control form-control-sm" onchange="ambilsumberdana(event)">
							@foreach($matangr as $r)
								<option value="{{$r->id}}">{{$r->nmrek}}</option>
							@endforeach                          
	                    </select>
					</div> -->
					<div class="form-group">
	                  <label>Akun Belanja</label>
	                  <select id="matangr_id" name="matangr_id[]" class="input-akun form-control form-control-sm select2" style="width: 100%;" onchange="ambilsumberdana(event)">
	                    <@foreach($matangr as $r)
								<option value="{{$r->id}}">{{$r->nmrek}}</option>
							@endforeach  
	                  </select>
	                </div>
				</div>
				<div class="col-2">
					<div class="form-group">
					<label>Jumlah</label>					
							<input name="jumlah[]" type="text"  class="input-jumlah form-control form-control-sm" placeholder="Jumlah" onKeyPress="return kodeScript(event,'0123456789.',this)" required="">
	                </div>	
				</div>
				<div class="col-2 abcd d-none" id="panelsumberdana">
					<div class="form-group">
						<label>Sumber Dana</label>
						<select id="sumberdana" name="sumberdana[]" class="input-sumber form-control  form-control-sm" >
							<option value="H">Hibah</option>
							<option value="A">Amil</option>
						</select>												
	                </div>	
				</div>
				<div class="col-1" >
					<div class="form-group">
						<label>Aksi</label>
						<a id="tambahrinci" href="#" class="tambahrinci btn btn-success btn-xs">Tambah Rincian</a>
					</div>
				</div>
			</div>
			<div class="rinci"></div>
		</div>

		<div class="card-footer bg-gray disabled color-palette">
			<button type="button" id="validasi_submit" class="btn btn-success">Simpan</button>
			<a href="/pengeluaran" class="btn btn-warning">Batal</a>

		</div>
	</form>
	
</div>
@stop

@section ('footer')
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
	<script type="text/javascript">
		$('.tambahrinci').on('click', function(){
			tambahrinci();
		});
		function tambahrinci(){
			var rinci = '<div><div class="row"><div class="col-4"><div class="form-group"><select id="matangr_id" name="matangr_id[]" class="input-akun form-control form-control-sm select2" style="width: 100%;" onchange="ambilsumberdana(event)">@foreach($matangr as $r)<option value="{{$r->id}}">{{$r->nmrek}}</option>@endforeach</select></div></div><div class="col-2"><div class="form-group"><input name="jumlah[]" type="numeric" class="input-jumlah form-control form-control-sm" placeholder="Jumlah" required="" onKeyPress="return kodeScript(event,'+"'0123456789.'"+',this)"></div></div><div class="col-2 d-none" id="panelsumberdana" ><div class="form-group"><select id="sumberdana" name="sumberdana[]" class="form-control input-sumber form-control-sm"><option value="H">Hibah</option><option value="A">Amil</option></select></div></div><div class="col-3"><div class="form-group"><a href="#" class="hapusbaris btn btn-danger btn-xs">Hapus</a></div></div></div></div>';
			$('.rinci').append(rinci);
		};

		$(document).on("click", ".hapusbaris", function() {
       		$(this).parent().parent().parent().remove(); 
		});

		//Seting jenis transaksi
		function ambiljnstrans() {
            var acr = document.getElementById("jenistransaksi").value;            
            if (acr=='Tunai') {
            	document.getElementById('rekpenerima').value='-';
            	document.getElementById('daftbank_id').value=13;
            	$( "#daftbank_id" ).prop( "disabled", true );
            	$( "#rekpenerima" ).prop( "disabled", true );
            }else {
            	$( "#daftbank_id" ).prop( "disabled", false );
            	$( "#rekpenerima" ).prop( "disabled", false );
            }             
        }

        function cekhakamil() {
		  var checkBox = document.getElementById("hakamil");
		  if (checkBox.checked == true){
		    	document.getElementById('rekpenerima').value='Rek AMIL BPD - 40021120';
            	document.getElementById('penerima').value = 'AMIL - BAZNAS';
            	$( "#rekpenerima" ).prop( "readonly", true );
            	$( "#penerima" ).prop( "readonly", true );
		  } else {
		  		document.getElementById('rekpenerima').value = '-';
            	document.getElementById('penerima').value = '-';
            	$( "#rekpenerima" ).prop( "readonly", false );
            	$( "#penerima" ).prop( "readonly", false );
		  }
		}


		//Seting jenis transaksi
		function ambilsumberdana(event) {
            // var acr = $('#matangr_id');
            var value = event.target.value;
            var div = event.target.parentElement.parentElement.nextElementSibling.nextElementSibling;           
            if (value==10) {
            	// document.getElementById('sumberdana').value='Z';
            // 	// $( ".read" ).prop( "hidden", true );
            // 	$("#panelsumberdana").addClass('d-none');
            console.log(div.children);         
            } else if (value==12) {
            	// document.getElementById('sumberdana').value='I';
            	console.log(div.children);
            // 	// $( ".read" ).prop( "hidden", true );  
            // 	$("#panelsumberdana").addClass('d-none');   
            } else {
            	div.classList.remove('d-none');
            }           
        }
        $(function () {
		    //Initialize Select2 Elements
		    $('.select2').select2()

		    //Initialize Select2 Elements
		    $('.select2bs4').select2({
		      theme: 'bootstrap4'
		    })
		  })

        $("#validasi_submit").on('click', function(){
        		$jenis_transaksi = $("#jenistransaksi").val();
        		$arr_akun = [];
        		$arr_jumlah = [];
        		$arr_sumber = [];
        		$(".input-akun").each(function(){
        			$val = $(this).val();
        			$arr_akun.push($val);
        		});
        		$(".input-jumlah").each(function(){
        			$val = $(this).val();
        			$arr_jumlah.push($val);
        		});
        		$(".input-sumber").each(function(){
        			$val = $(this).val();
        			$arr_sumber.push($val);
        		});
        		console.log($arr_akun);
        		console.log($arr_jumlah);
        		console.log($arr_sumber);
        		console.log($jenis_transaksi);
        		$.post("{{url('pengeluaran/validasi-tambah')}}", {jenis: $jenis_transaksi, akun: $arr_akun, jumlah: $arr_jumlah, sumber:$arr_sumber}, function(respon){
        				console.log(respon);
        				if(respon.status != true){
        					swal("Mohon Maaf!",respon.message, "error");
        				}else{
        					$("#form-pengeluaran").submit();
        				}
        		});
        });

        $("#entri_nomor").on('change', function(){
        	$nomor = $(this).val();
        	if($nomor.length==5){
        		$.get("{{url('pengeluaran/cek-nomor')}}?nomor="+$nomor, function(respon){
        			if(respon.status!=true){
        				toastr.error(respon.message);
        			}
        		})
        	}
        })

	</script>
@stop



                  