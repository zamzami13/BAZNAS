<?php $__env->startSection('master'); ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('master'); ?>
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Ubah User</h3>
							</div>
							<div class="panel-body">

								<form action="/muser/<?php echo e($muser->id); ?>/update" method="POST">
						        <?php echo e(csrf_field()); ?>


							        <div class="form-group">
									    <label>Level</label>
									    <select class="form-control" name="role">
											<option value="admin" <?php if($muser->role=='admin'): ?> selected <?php endif; ?> >Admin</option>
											<option value="bendahara" <?php if($muser->role=='bendahara'): ?> selected <?php endif; ?> >Bendahara</option>
											<option value="pimpinan" <?php if($muser->role=='pimpinan'): ?> selected <?php endif; ?>>Pimpinan</option>
											<option value="auditor" <?php if($muser->role=='auditor'): ?> selected <?php endif; ?>>Auditor</option>						
										</select>			    			    
									</div>
								  	<div class="form-group">
								    	<label >Nama User</label>
								    	<input name="name" type="text" class="form-control" value="<?php echo e($muser->name); ?>">				    
								  	</div>
								  <div class="form-group">
								    <label >Email</label>
								    <input name="email" type="email" class="form-control" value="<?php echo e($muser->email); ?>">				    
								  </div>
								  <button type="submit" class="btn btn-primary">Simpan</button>
								</form>
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>