<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>



	<div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Buku Kas</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Buku Kas Umum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Rinci</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <form action="/bku/bkuexportpdf" method="POST" target="_blank">
							<?php echo e(csrf_field()); ?>

					        <div class="card-body">
					        	<div class="row">
									<div class="col-2">
										<div class="form-group">
											<label>Tanggal Awal</label>
						                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
						                        <input name="tanggalawal" id="tanggalawal"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
						                    </div>
						                </div>
									</div>
									<div class="col-2">
										<div class="form-group">
											<label>Tanggal Akhir</label>
						                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
						                        <input name="tanggalakhir" id="tanggalakhir"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
						                    </div>
						                </div>
									</div>				
								</div>
							</div>
								<button type="submit" class="btn btn-success">Cetak <i class="fas fa-print"></i></button>
								<a href="/dashboard" class="btn btn-warning">Batal <i class="fas fa-long-arrow-alt-left"></i></a>
						</form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     <form action="/bku/bkuakunexportpdf" method="POST" target="_blank">
						<?php echo e(csrf_field()); ?>

				        <div class="card-body">
				        	<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label>Tanggal Awal</label>
					                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					                        <input name="tanggalawal" id="tanggalawal"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
					                    </div>
					                </div>
								</div>
								<div class="col-2">
									<div class="form-group">
										<label>Tanggal Akhir</label>
					                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					                        <input name="tanggalakhir" id="tanggalakhir"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
					                    </div>
					                </div>
								</div>				
							</div>
							<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label>JENIS BKU</label>
										<select name="matangd_id" class="form-control form-control-sm">                          
											<option value="4">ZAKAT</option>
											<option value="5">INFAQ</option>
											<option value="6">HIBAH</option>
											<option value="7">AMIL</option>
					                    </select>
									</div>
								</div>
								<div class="col-2">
									<div class="form-group">
										<label>Tanggal Akhir</label>
					                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					                        
					                    </div>
					                </div>
								</div>
							</div>



						</div>
						<button type="submit" class="btn btn-success">Cetak <i class="fas fa-print"></i></button>
						<a href="/dashboard" class="btn btn-warning">Batal <i class="fas fa-long-arrow-alt-left"></i></i></a>
					</form>
                  </div>
                </div>
              </div>
            </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

	</script>
	<!-- DataTables -->
	<script src="<?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
	<script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
	<!-- page script -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>