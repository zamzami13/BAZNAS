<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>
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
		                <span class="info-box-number"><?php echo number_format($penerimaandet->whereNotIn('matangd_id',[16])->sum('jumlah'),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldoallbank(),2,',','.'); ?></span>
        				<span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldoalltunai(),2,',','.'); ?></span>
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
		                <span class="info-box-number"><?php echo number_format($penerimaandet->where('matangd_id',4)->sum('jumlah'),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(4),2,',','.'); ?></span>
        				<span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(4),2,',','.'); ?> </span>
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
		                <span class="info-box-number"><?php echo number_format($penerimaandet->where('matangd_id',5)->sum('jumlah'),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(5),2,',','.'); ?></span>
        				<span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(5),2,',','.'); ?> </span>
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
		                <span class="info-box-number"><?php echo number_format($penerimaandet->whereIn('matangd_id',[7,8,9,10])->sum('jumlah'),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(999),2,',','.'); ?></span>
        				<span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(999),2,',','.'); ?></span>
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
		                <span class="info-box-number"><?php echo number_format($penerimaandet->whereIn('matangd_id',[20,23])->sum('jumlah'),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(888),2,',','.'); ?></span>
		                <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(888),2,',','.'); ?></span>
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
					<?php  
				        $no=1;
				    ?>
					<?php $__currentLoopData = $penerimaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>  
						<td><?php echo e($no); ?></td>
						<td><?php echo e($data->nomasuk); ?></td>
						<td><?php echo e(Carbon\Carbon::parse($data->tanggal)->format("d/m/Y")); ?></td>
						<td><?php echo e($data->jenistransaksi); ?></td>
						<td><?php echo e($data->donatur); ?></td>
						<td><?php echo e($data->bukti); ?></td>
						<td><a href="" class="elemendetail" data-toggle="modal" data-target="#detModal-<?php echo e($data->id); ?>"><?php echo e($data->uraian); ?></a></td>						    
						<td><?php echo e($data->rekpengirim); ?></td>
						<td class="text-right"><?php echo number_format($data->penerimaandet->sum('jumlah'),2,',','.'); ?></td>
						<td>
							<a href="/penerimaan/<?php echo e($data->id); ?>/edit" class="btn btn-warning btn-xs">Ubah</a>
							<a href="#" class="btn btn-danger btn-xs elemendelete" rekbank-id="<?php echo e($data->id); ?>" rekbank-nama="<?php echo e($data->uraian); ?>">Hapus</a>
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
	<?php $__currentLoopData = $penerimaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="detModal-<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<?php  
				        $no=1;
				    ?>
					<?php $__currentLoopData = $data->penerimaandet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      		<tr>
			      			<td><?php echo e($no); ?></td>
				      		<td><?php echo e($detil->matangd->nmrek); ?></td>
				      		<td class="text-right"><?php echo number_format($detil->jumlah,2,',','.'); ?></td>
				      	</tr>
				    <?php  
				        $no++;
				    ?>
			      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			  	
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">Jumlah</th>
						<th class="text-right"><?php echo number_format($data->penerimaandet->sum('jumlah'),2,',','.'); ?></th>
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
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
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