@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengeluaran</h3>
                
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    	<a href="/pengeluaran/create" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Pengeluaran</a>
                    	<!-- <a href="/pergeseran" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Pergeseran</a> -->
                    	<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalgeser"><i class="fas fa-plus"></i> Pergeseran</a>
                    	<a href="/daftbank/export" class="btn btn-sm btn-success">To Excel</a>	
						<a href="/daftbank/exportpdf" class="btn btn-sm btn-warning">To PDF</a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card-body">

              	<div class="row">
		          <div class="col-md-4 col-sm-6 col-12">
			            <div class="info-box">
			              <span class="info-box-icon bg-info"><i class="fas fa-money-bill-wave"></i></span>
			              <div class="info-box-content">
			                <span class="info-box-text">TOTAL</span>
			                <span class="info-box-number">@rupiah($pengeluarandet->whereNotIn('matangr_id',[16])->sum('jumlah'))</span>
			                <span class="info-box-text">Saldo Bank @rupiah(carisaldoallbank())</span>
	        				<span class="info-box-text">Saldo Tunai @rupiah(carisaldoalltunai())</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-2 col-sm-6 col-12">
			            <div class="info-box bg-success">
			              <!-- <span class="info-box-icon bg-success"><i class="fas fa-hands"></i></span> -->
			              <div class="info-box-content">
			                <span class="info-box-text">ZAKAT</span>
			                <span class="info-box-number">@rupiah($pengeluarandet->where('sumberdana','Z')->sum('jumlah'))</span>
			                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(4))</span>
	        				<span class="info-box-text">Saldo Tunai @rupiah(carisaldotunai(4)) </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-2 col-sm-6 col-12">
			            <div class="info-box bg-warning">
			              <!-- <span class="info-box-icon bg-warning"><i class="fas fa-hands-helping"></i></span> -->
			              <div class="info-box-content">
			                <span class="info-box-text">INFAQ</span>
			                <span class="info-box-number">@rupiah($pengeluarandet->where('sumberdana','I')->sum('jumlah'))</span>
			                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(5))</span>
	        				<span class="info-box-text">Saldo Tunai @rupiah(carisaldotunai(5)) </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-2 col-sm-6 col-12">
			            <div class="info-box bg-danger">
			              <!-- <span class="info-box-icon bg-warning"><i class="fas fa-hands-helping"></i></span> -->
			              <div class="info-box-content">
			                <span class="info-box-text">HIBAH</span>
			                <span class="info-box-number">@rupiah($pengeluarandet->where('sumberdana','H')->sum('jumlah'))</span>
			                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(999))</span>
	        				<span class="info-box-text">Saldo Tunai  @rupiah(carisaldotunai(999)) </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
		            <!-- /.info-box -->
		          </div>

		          <div class="col-md-2 col-sm-6 col-12">
			            <div class="info-box bg-info">
			              <!-- <span class="info-box-icon bg-warning"><i class="fas fa-hands-helping"></i></span> -->
			              <div class="info-box-content">
			                <span class="info-box-text">AMIL</span>
			                <span class="info-box-number">@rupiah($pengeluarandet->where('sumberdana','A')->sum('jumlah'))</span>
			                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(888))</span>
	        				<span class="info-box-text">Saldo Tunai  @rupiah(carisaldotunai(888)) </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
		            <!-- /.info-box -->
		          </div>		          
		        </div>
		        <hr>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  		<th>No</th>
						<th>Nomor</th>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Penerima</th>
						<th>Bukti</th>
						<th>Uraian</th>
						<th>Rek Penerima</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php  
				        $no=1;
				    @endphp
					@foreach($pengeluaran as $data)
					<tr>  
						<td>{{$no}}</td>
						<td>{{$data->nokeluar}}</td>
						<td>{{Carbon\Carbon::parse($data->tanggal)->format("d/m/Y")}}</td>
						<td>{{$data->jenistransaksi}}</td>
						<td>{{$data->penerima}}</td>
						<td>{{$data->bukti}}</td>
						<td><a href="" class="elemendetail" data-toggle="modal" data-target="#detModal-{{$data->id}}">{{$data->uraian}}</a></td>						    
						<td>{{$data->rekpenerima}}</td>
						<td class="text-right">@rupiah($data->pengeluarandet->sum('jumlah'))</td>
						<td>
							<a href="/daftbank/{{$data->id}}/edit" class="btn btn-warning btn-xs">Ubah</a>
							<a href="#" class="btn btn-danger btn-xs elemendelete" rekbank-id="{{$data->id}}" rekbank-nama="{{$data->uraian}}">Hapus</a>
						</td>
					</tr>
					@php  
				        $no++;
				    @endphp
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nomor</th>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Penerima</th>
						<th>Bukti</th>
						<th>Uraian</th>
						<th>Rek Penerima</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
			</table>

		</div>
          <!-- /.card-body -->
    </div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/daftbank/create" method="POST">
	        	{{csrf_field()}}
	        	<div class="row">
		        	<div class="col-sm-4">
					  <div class="form-group">
					    <label>Kode Bank</label>
					    <input name="kodebank" type="text" class="form-control"  placeholder="Kode Bank...">				    
					  </div>
					</div>
					<div class="col-sm-8">
					  <div class="form-group">
					    <label >Nama Bank</label>
					    <input name="namabank" type="text" class="form-control" placeholder="Nama Bank...">				    
					  </div>
					</div>
				</div>
				<div class="row">
		        	<div class="col-sm-3">
					  <div class="form-group">
					    <label >Nomor Rekening</label>
					    <input name="norekbank" type="text" class="form-control"  placeholder="Nomor Rekening Bank...">				    
					  </div>
					</div>
					<div class="col-sm-9">
					  <div class="form-group">
					    <label >Nama Rekening</label>
					    <input name="nmrekbank" type="text" class="form-control" placeholder="Nama Rekening Bank...">				    
					  </div>						
					</div>
				</div>
				<div class="row">
		        	<div class="col-sm-8">
					  <div class="form-group">
					    <label >Nama Singkat Rekening</label>
					    <input name="singkatan" type="text" class="form-control" placeholder="Kode...">				    
					  </div>
					</div>
					<div class="col-sm-4">
					  <div class="form-group">
					    <label >Telpon</label>
					    <input name="telpon" type="text" class="form-control"  placeholder="Nomor Telpon Bank...">				    
					  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10">
					  <div class="form-group">
					    <label >Alamat Bank</label>
					    <textarea name="alamat" class="form-control"  rows="3"></textarea>
					  </div>
					</div>
					<div class="col-sm-2">
					  <div class="form-group">
					    <label >Saldo Awal</label>
					    <input name="soawal" class="form-control" type="text" onKeyPress="return kodeScript(event,'0123456789.',this)"  placeholder="000.000,00">
					  </div>
					</div>
				</div>			  
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Modal Detail Data Transaksi-->
	@foreach($pengeluaran as $data)
	<div class="modal fade" id="detModal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="table-responsive">
	      		<table class="table table-hover">
			    <thead>
                  	<tr>
                  		<th>No</th>
						<th>Pengeluaran</th>
						<th class="text-right">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					@php  
				        $no=1;
				    @endphp
					@foreach ($data->pengeluarandet as $detil)
			      		<tr>
			      			<td>{{$no}}</td>
				      		<td>{{$detil->matangr->nmrek}}</td>
				      		<td class="text-right">@rupiah($detil->jumlah)</td>
				      	</tr>
				    @php  
				        $no++;
				    @endphp
			      	@endforeach			  	
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2" class="text-center">JUMLAH</th>
						<th class="text-right">@rupiah($data->pengeluarandet->sum('jumlah'))</th>
					</tr>
				</tfoot>
			  	</table>
			</div>	      	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
	      </div>
	    </div>
	  </div>
	</div>
	@endforeach

	<div class="modal fade" id="modalgeser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pergeseran Dana</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/pengeluaran/creategeser" method="POST">
            {{csrf_field()}}
            <div class="col-12" style="text-align: center;">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kodetrans" value="1" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Geser Bunga Bank ke Tunai</label>
                </div>
              </div>
              <hr>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Jenis Pergeseran:</label>
                  <select id="jenistransaksi" name="jenistransaksi" class="form-control form-control-sm">
                    <option value="ketunai">Bank ke Tunai</option>
                    <option value="kebank">Tunai ke Bank</option>                           
                  </select>            
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Nomor :</label>
                  <input name="nomor" class="form-control form-control-sm" type="text" placeholder="XX-XXX" required="" maxlength="7" minlength="6">           
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                    <label>Tanggal:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
                    </div>           
                  </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label >Uraian</label>
                    <textarea name="uraian" class="form-control form-control-sm"  rows="2"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label >Rekening Bank</label>
                      <select id="daftbank_id" name="daftbank_id" class="form-control form-control-sm">
                        @foreach($rekbank as $rek)
                          <option value="{{$rek->id}}">{{$rek->singkatan}} - {{$rek->norekbank}}</option>
                        @endforeach                                                 
                      </select>          
                  </div>            
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label >Dokumen Pergeseran</label>
                    <input name="bukti" type="text" class="form-control form-control-sm" placeholder="Kode...">           
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label >Jumlah</label>
                    <input name="jumlah" class="form-control form-control-sm" type="text" onKeyPress="return kodeScript(event,'0123456789.',this)"  placeholder="000.000,00">
                  </div>
                </div>
              </div>        
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop

@section ('footer')
	<script type="text/javascript">
		$('.elemendelete').click(function(){
			var muser_id = $(this).attr('rekbank-id');
			var muser_nama = $(this).attr('rekbank-nama');
			swal({
			  title: "Yakin!",
			  text: "Data "+muser_nama+"akan dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/pengeluaran/"+muser_id+"/hapusall";
			  } 
			});

		});

		// $('.elemendetail').click(function(){
		// 	var keperluan=$(this).attr('ket');

		// });
	</script>
	<!-- DataTables -->
	<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<!-- page script -->
	<script>
	  $(function () {
	    $("#example1").DataTable({
	      "responsive": true,
	      "autoWidth": false,
	    });
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false,
	      "responsive": true,
	    });
	  });
	</script>
@stop