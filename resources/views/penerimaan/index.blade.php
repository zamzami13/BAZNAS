@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
		<div class="card">
              <div class="card-header">
                <h3 class="card-title">Penerimaan</h3>
                
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    	<a href="/penerimaan/create" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Penerimaan</a>
                    	<a href="/daftbank/export" class="btn btn-sm btn-primary">To Excel</a>	
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
		                <span class="info-box-number">@rupiah($penerimaandet->whereNotIn('matangd_id',[16])->sum('jumlah'))</span>
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
		                <span class="info-box-number">@rupiah($penerimaandet->where('matangd_id',4)->sum('jumlah'))</span>
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
		                <span class="info-box-number">@rupiah($penerimaandet->where('matangd_id',5)->sum('jumlah'))</span>
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
		              <!-- <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span> -->
		              <div class="info-box-content">
		                <span class="info-box-text">HIBAH</span>
		                <span class="info-box-number">@rupiah($penerimaandet->whereIn('matangd_id',[7,8,9,10])->sum('jumlah'))</span>
		                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(999))</span>
        				<span class="info-box-text">Saldo Tunai @rupiah(carisaldotunai(999))</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-2 col-sm-6 col-12">
		            <div class="info-box bg-info">
		              <!-- <span class="info-box-icon bg-info"><i class="fas fa-money-bill-wave"></i></span> -->
		              <div class="info-box-content">
		                <span class="info-box-text">AMIL</span>
		                <span class="info-box-number">@rupiah($penerimaandet->whereIn('matangd_id',[20,23])->sum('jumlah'))</span>
		                <span class="info-box-text">Saldo Bank @rupiah(carisaldobank(888))</span>
		                <span class="info-box-text">Saldo Tunai @rupiah(carisaldotunai(888))</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		        </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  		<th>No</th>
						<th>Nomor</th>
						<th>Tanggal</th>
						<th>Transaksi</th>
						<th>Donatur</th>
						<th>Bukti</th>
						<th>Uraian</th>
						<th>Rek Pengirim</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php  
				        $no=1;
				    @endphp
					@foreach($penerimaan as $data)
					<tr>  
						<td>{{$no}}</td>
						<td>{{$data->nomasuk}}</td>
						<td>{{Carbon\Carbon::parse($data->tanggal)->format("d/m/Y")}}</td>
						<td>{{$data->jenistransaksi}}</td>
						<td>{{$data->donatur}}</td>
						<td>{{$data->bukti}}</td>
						<td><a href="" class="elemendetail" data-toggle="modal" data-target="#detModal-{{$data->id}}">{{$data->uraian}}</a></td>						    
						<td>{{$data->rekpengirim}}</td>
						<td class="text-right">@rupiah($data->penerimaandet->sum('jumlah'))</td>
						<td>
							<a href="/penerimaan/{{$data->id}}/edit" class="btn btn-warning btn-xs">Ubah</a>
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
						<th>Transaksi</th>
						<th>Donatur</th>
						<th>Bukti</th>
						<th>Uraian</th>
						<th>Rek Pengirim</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
			</table>

		</div>
          <!-- /.card-body -->
    </div>
	<!-- Modal Detail Data Transaksi-->
	@foreach($penerimaan as $data)
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
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					@php  
				        $no=1;
				    @endphp
					@foreach ($data->penerimaandet as $detil)
			      		<tr>
			      			<td>{{$no}}</td>
				      		<td>{{$detil->matangd->nmrek}}</td>
				      		<td class="text-right">@rupiah($detil->jumlah)</td>
				      	</tr>
				    @php  
				        $no++;
				    @endphp
			      	@endforeach			  	
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">Jumlah</th>
						<th class="text-right">@rupiah($data->penerimaandet->sum('jumlah'))</th>
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
@stop

@section ('footer')
	<script type="text/javascript">
		$('.elemendelete').click(function(){
			var muser_id = $(this).attr('rekbank-id');
			var muser_nama = $(this).attr('rekbank-nama');
			swal({
			  title: "Yakin!",
			  text: "Data "+muser_nama+" akan dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/penerimaan/"+muser_id+"/hapusall";
			  } 
			});

		});

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