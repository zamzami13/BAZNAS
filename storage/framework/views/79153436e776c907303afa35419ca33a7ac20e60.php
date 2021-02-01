<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>
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
			                <span class="info-box-number"><?php echo number_format($pengeluarandet->whereNotIn('matangr_id',[16])->sum('jumlah'),2,',','.'); ?></span>
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
			                <span class="info-box-number"><?php echo number_format($pengeluarandet->where('sumberdana','Z')->sum('jumlah'),2,',','.'); ?></span>
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
			                <span class="info-box-number"><?php echo number_format($pengeluarandet->where('sumberdana','I')->sum('jumlah'),2,',','.'); ?></span>
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
			              <!-- <span class="info-box-icon bg-warning"><i class="fas fa-hands-helping"></i></span> -->
			              <div class="info-box-content">
			                <span class="info-box-text">HIBAH</span>
			                <span class="info-box-number"><?php echo number_format($pengeluarandet->where('sumberdana','H')->sum('jumlah'),2,',','.'); ?></span>
			                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(999),2,',','.'); ?></span>
	        				<span class="info-box-text">Saldo Tunai  <?php echo number_format(carisaldotunai(999),2,',','.'); ?> </span>
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
			                <span class="info-box-number"><?php echo number_format($pengeluarandet->where('sumberdana','A')->sum('jumlah'),2,',','.'); ?></span>
			                <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(888),2,',','.'); ?></span>
	        				<span class="info-box-text">Saldo Tunai  <?php echo number_format(carisaldotunai(888),2,',','.'); ?> </span>
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
					<?php  
				        $no=1;
				    ?>
					<?php $__currentLoopData = $pengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>  
						<td><?php echo e($no); ?></td>
						<td><?php echo e($data->nokeluar); ?></td>
						<td><?php echo e(Carbon\Carbon::parse($data->tanggal)->format("d/m/Y")); ?></td>
						<td><?php echo e($data->jenistransaksi); ?></td>
						<td><?php echo e($data->penerima); ?></td>
						<td><?php echo e($data->bukti); ?></td>
						<td><a href="" class="elemendetail" data-toggle="modal" data-target="#detModal-<?php echo e($data->id); ?>"><?php echo e($data->uraian); ?></a></td>						    
						<td><?php echo e($data->rekpenerima); ?></td>
						<td class="text-right"><?php echo number_format($data->pengeluarandet->sum('jumlah'),2,',','.'); ?></td>
						<td>
							<a href="/daftbank/<?php echo e($data->id); ?>/edit" class="btn btn-warning btn-xs">Ubah</a>
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
	<?php $__currentLoopData = $pengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
						<th class="text-right">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<?php  
				        $no=1;
				    ?>
					<?php $__currentLoopData = $data->pengeluarandet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      		<tr>
			      			<td><?php echo e($no); ?></td>
				      		<td><?php echo e($detil->matangr->nmrek); ?></td>
				      		<td class="text-right"><?php echo number_format($detil->jumlah,2,',','.'); ?></td>
				      	</tr>
				    <?php  
				        $no++;
				    ?>
			      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			  	
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2" class="text-center">JUMLAH</th>
						<th class="text-right"><?php echo number_format($data->pengeluarandet->sum('jumlah'),2,',','.'); ?></th>
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
            <?php echo e(csrf_field()); ?>

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
                        <input name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
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
                        <?php $__currentLoopData = $rekbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($rek->id); ?>"><?php echo e($rek->singkatan); ?> - <?php echo e($rek->norekbank); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                 
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
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