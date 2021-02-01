<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Rekening Bank</h3>
                
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                    	<!-- <a href="#" class="btn btn-info btn-success" data-toggle="modal" data-target="#exampleModal">Rekening baru</a> -->
                    	<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Rekening baru </button>
                    	<a href="/daftbank/export" class="btn btn-sm btn-primary">To Excel</a>	
						<a href="/daftbank/exportpdf" class="btn btn-sm btn-warning">To PDF</a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  		<th>No</th>
						<th>Kode Bank</th>
						<th>Nama Bank</th>
						<th>Singkatan</th>
						<th>Rekenig Bank</th>
						<th>Nama Rekening</th>
						<th>Saldo Awal</th>
						<th>Alamat Bank</th>
						<th>Telepon Bank</th>
						<th>Sumber Dana</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php  
				        $no=1;
				    ?>
					<?php $__currentLoopData = $daftbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($no); ?></td>
						<td><?php echo e($data->kodebank); ?></td>
						<td><?php echo e($data->namabank); ?></td>
						<td><?php echo e($data->singkatan); ?></td>
						<td><?php echo e($data->norekbank); ?></td>
						<td><?php echo e($data->nmrekbank); ?></td>
						<td><?php echo e($data->soawal); ?></td>
						<td><?php echo e($data->alamat); ?></td>
						<td><?php echo e($data->telpon); ?></td>
						<td><?php echo e($data->sumberdana); ?></td>
						<td>
							<a href="/daftbank/<?php echo e($data->id); ?>/edit" class="btn btn-warning btn-xs">Ubah</a>
							<a href="#" class="btn btn-danger btn-xs elemendelete" rekbank-id="<?php echo e($data->id); ?>" rekbank-nama="<?php echo e($data->nmrekbank); ?>">Hapus</a>
							<!-- <a href="#" class="btn btn-danger btn-sm elemendelete" muser-id="<?php echo e($data->id); ?>" muser-nama="<?php echo e($data->name); ?>">Hapus</a> -->
						</td>
					</tr>
					<?php  
				        $no++;
				    ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
	              <tfoot>
	              <tr>
	                <th>No</th>
					<th>Kode Bank</th>
					<th>Nama Bank</th>
					<th>Singkatan</th>
					<th>Rekenig Bank</th>
					<th>Nama Rekening</th>
					<th>Saldo Awal</th>
					<th>Alamat Bank</th>
					<th>Telepon Bank</th>
					<th>Sumber Dana</th>
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
	        	<?php echo e(csrf_field()); ?>

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
		        	<div class="col-sm-3">
					  <div class="form-group">
					    <label >Sumber Dana</label>
					    <select  name="sumberdana" class="form-control form-control-sm" onchange="ambiljnstrans()">
	                      <option value="Zakat">Zakat</option>
	                      <option value="Infaq">Infaq</option>
	                      <option value="Hibah">Hibah</option>
	                      <option value="Semua">Semua</option>	                          
	                    </select>				    
					  </div>
					</div>
					<div class="col-sm-5">
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

			  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
			</form>
	      </div>
	    </div>
	  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<script type="text/javascript">
		$('.elemendelete').click(function(){
			var muser_id = $(this).attr('rekbank-id-id');
			var muser_nama = $(this).attr('rekbank-nama');
			swal({
			  title: "Yakin!",
			  text: "Rekening "+muser_nama+"akan dihapus?",
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
	<script src="<?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>