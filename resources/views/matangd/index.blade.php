@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Akun Penerimaan</h3>
			<div class="card-tools">
				<ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    	<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Akun baru </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-body">
        	<table id="example1" class="table table-bordered table-striped">
        		<thead>
        			<tr>
        				<th>Nomor</th>
						<th>Kode Akun</th>
						<th>Nama Akun</th>
						<th>Type Akun</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
                  	@php  
				        $no=1;
				    @endphp
					@foreach($matangd as $data)
					<tr>
						<td>{{$no}}</td>
						<td>{{$data->kdrek}}</td>
						<td>{{$data->nmrek}}</td>
						<td>{{$data->type}}</td>
						<td>{{$data->kdlevel}}</td>
						<td>
							<a href="#" data-toggle="modal" data-target="#editmatangd-{{$data->id}}" class="btn btn-warning btn-sm">Ubah</a>							
							<a href="#" class="btn btn-danger btn-sm elemendelete" muser-id="{{$data->id}}" muser-nama="{{$data->nmrek}}" >Hapus</a>
						</td>
					</tr>
					@php  
				        $no++;
				    @endphp
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Nomor</th>
						<th>Kode Akun</th>
						<th>Nama Akun</th>
						<th>Type Akun</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
            </table>
        </div>
    </div>

	<!-- Modal tambah -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Akun Penerimaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/matangd/create" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label>Kode Akun</label>
							<input name="kdrek" type="text" class="form-control"  placeholder="5.x.x.xx." required="">
						</div>
						<div class="form-group">
							<label >Nama Akun</label>
							<input name="nmrek" type="text" class="form-control" placeholder="Nama Akun" required="" >				    
						</div>
						<div class="form-group">
							<label >Tipe Akun</label>
							<select name="type" class="form-control">
	                          <option value="H">Header</option>
	                          <option value="D">Detail</option>	                          
	                        </select>
						</div>
						<div class="form-group">
							<label >Level Akun</label>
							<select name="kdlevel" class="form-control">
	                          <option value="1">Level 1 Header</option>
	                          <option value="2">Level 2 Header</option>	
	                          <option value="3">Level 3 Header</option>	 
	                          <option value="4">Level 4 Detail</option>	                         
	                        </select>
						</div>				  				  
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal edit -->
	@foreach($matangd as $data)
	<div class="modal fade" id="editmatangd-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Akun Pengeluaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/matangd/{{$data->id}}/edit" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label>Kode Akun</label>
							<input name="kdrek" type="text" class="form-control"  value="{{$data->kdrek}}" required="">
						</div>
						<div class="form-group">
							<label >Nama Akun</label>
							<input name="nmrek" type="text" class="form-control" value="{{$data->nmrek}}" required="">				    
						</div>
						<div class="form-group">
							<label >Type Akun</label>
							<select name="type" class="form-control">
	                          <option value="H" @if($data->type=='H') selected @endif>Header</option>
	                          <option value="D" @if($data->type=='D') selected @endif>Detail</option>	                          
	                        </select>
						</div>
						<div class="form-group">
							<label >Level Akun</label>
							<select name="kdlevel" class="form-control">
	                          <option value="1" @if($data->kdlevel=='1') selected @endif>Level 1 Header</option>
	                          <option value="2" @if($data->kdlevel=='2') selected @endif>Level 2 Header</option>	
	                          <option value="3" @if($data->kdlevel=='3') selected @endif>Level 3 Header</option>	 
	                          <option value="4" @if($data->kdlevel=='4') selected @endif>Level 4 Detail</option>
	                        </select>				    
						</div>				  				  
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach	
@stop

@section ('footer')	


		<script type="text/javascript">
		$('.elemendelete').click(function(){
			var muser_id = $(this).attr('muser-id');
			var muser_nama = $(this).attr('muser-nama');
			swal({
			  title: "Yakin!",
			  text: muser_nama+" akan dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/matangd/"+muser_id+"/delete";
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