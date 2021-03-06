@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')
	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Manajemen User</h3>                
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    	<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> User baru </button>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
					<th>Level</th>
					<th>Nama User</th>
					<th>Email</th>											
					<th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@php  
				        $no=1;
				    @endphp
					@foreach($muser as $data)
					<tr>
						<td>{{$no}}</td>
						<td>{{$data->role}}</td>
						<td>{{$data->name}}</td>
						<td>{{$data->email}}</td>											
						<td>
							<a href="/muser/{{$data->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
							<!-- <a href="/muser/{{$data->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus?')">Hapus</a> -->
							<a href="#" class="btn btn-danger btn-sm elemendelete" muser-id="{{$data->id}}" muser-nama="{{$data->name}}" >Hapus</a>
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
					<th>Level</th>
					<th>Nama User</th>
					<th>Email</th>											
					<th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>



	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/muser/create" method="POST">
	        	{{csrf_field()}}
			  <div class="form-group">
			    <label>Level</label>
			    <select class="form-control" name="role" required="">
					<option value="admin">Admin</option>
					<option value="bendahara">Bendahara</option>
					<option value="pimpinan">Pimpinan</option>
					<option value="auditor">Auditor</option>										
				</select>			    			    
			  </div>
			  <div class="form-group">
			    <label >Nama User</label>
			    <input name="name" type="text" class="form-control" placeholder="Nama User..." required="">				    
			  </div>
			  <div class="form-group">
			    <label >Email</label>
			    <input name="email" type="email" class="form-control" placeholder="Email..." required="">				    
			  </div>
			  <div class="form-group">
			    <label >Password</label>
			    <input name="password" type="text" class="form-control"  placeholder="Password...">				    
			  </div>			  
			  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
			</form>
	      </div>
	    </div>
	  </div>
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
			    window.location = "/muser/"+muser_id+"/delete";
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