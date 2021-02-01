<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">Edit Penerimaan</h3>
	</div>
	<form action="/penerimaan/<?php echo e($penerimaan->id); ?>/updateinsert" method="POST">
		<?php echo e(csrf_field()); ?>

		<div class="card-body">
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label >Nomor Register:</label>
						<input name="nomasuk" class="form-control form-control-sm" type="text" value="<?php echo e($penerimaan->nomasuk); ?>">
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Cara Terima:</label>
						<select name="jenistransaksi" class="form-control form-control-sm">
	                      <option value="Transfer" <?php if($penerimaan->jenistransaksi=='Transfer'): ?> selected <?php endif; ?>>Transfer</option>
	                      <option value="Tunai" <?php if($penerimaan->jenistransaksi=='Tunai'): ?> selected <?php endif; ?>>Tunai</option>	
	                  	</select>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label >Rekening Pengirim:</label>
						<input name="rekpengirim" class="form-control form-control-sm" type="text" value="<?php echo e($penerimaan->rekpengirim); ?>">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Rekening Terima:</label>
						<select name="daftbank_id" class="form-control form-control-sm">
							<?php $__currentLoopData = $rekbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($rek->id); ?>" <?php if($penerimaan->daftbank_id==$rek->id): ?> selected <?php endif; ?>>  <?php echo e($rek->singkatan); ?> - <?php echo e($rek->norekbank); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      	                          
	                    </select>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label >Muzakki:</label>
						<input name="donatur" class="form-control form-control-sm" type="text" value="<?php echo e($penerimaan->donatur); ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-2">
					<div class="form-group">
						<label>Tanggal:</label>
	                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
	                        <input name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e($penerimaan->tanggal); ?>">
	                    </div>
	                </div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label >Dok Pendukung:</label>
						<input name="bukti" class="form-control form-control-sm" value="<?php echo e($penerimaan->bukti); ?>">
					</div>
				</div>
				<div class="col-sm-7">
					<div class="form-group">
						<label>Uraian:</label>
	                	<textarea name="uraian"class="form-control form-control-sm" rows="3"><?php echo e($penerimaan->uraian); ?></textarea>
	              </div>
	            </div>
			</div>

			<div class="card">
				<div class="card-header">Rincian Penerimaan</div>
				<div class="card-body">
					<!-- <h5 class="card-title">Special title treatment</h5> -->
					<?php $__currentLoopData = $penerimaandet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<input name="id[]" type="numeric" class="form-control form-control-sm" value="<?php echo e($det->id); ?>" hidden="">
					<div class="row">
						<div class="col-3">
							<div class="form-group">
								<select name="matangd_id[]" class="form-control form-control-sm">
									<?php $__currentLoopData = $matangd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($r->id); ?>" <?php if($det->matangd_id==$r->id): ?> selected <?php endif; ?> ><?php echo e($r->nmrek); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<input name="jumlah[]" type="text" class="form-control form-control-sm" value="<?php echo e($det->jumlah); ?>" onKeyPress="return kodeScript(event,'0123456789.',this)">
			                </div>	
						</div>
						<div class="col-3">
							<div class="form-group">
								<a href="#" class="hapusbaris btn btn-danger btn-xs" muser-id="<?php echo e($det->id); ?>" muser-nama="<?php echo e($det->matangd->nmrek); ?>">Hapus</a>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="rinci"></div>
					<a href="#" class="tambahrinci btn btn-primary btn-sm">Tambah rincian</a>
				</div>
			</div>
		</div>

		<div class="card-footer bg-gray disabled color-palette">
			<button type="submit" class="btn btn-success">Simpan</button>
			<a href="/penerimaan" class="btn btn-warning">Batal</a>
		</div>
	</form>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
	<script type="text/javascript">
		$('.tambahrinci').on('click', function(){
			tambahrinci();
		});
		function tambahrinci(){
			var rinci = '<div><div class="row"><div class="col-3"><div class="form-group"><select name="matangd_idtambah[]" class="form-control form-control-sm"><?php $__currentLoopData = $matangd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($r->id); ?>"><?php echo e($r->nmrek); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div><div class="col-3"><div class="form-group"><input name="jumlahtambah[]" type="text" class="form-control form-control-sm" placeholder="Jumlah" required="" onKeyPress="return kodeScript(event,'+"'0123456789.'"+',this)"></div></div><div class="col-3"><div class="form-group"><a href="#" class="hapusbaris2 btn btn-danger btn-xs">Hapus</a></div></div></div></div>';
			$('.rinci').append(rinci);
		};

		$('.hapusbaris').click(function(){
			var muser_id = $(this).attr('muser-id');
			var muser_nama = $(this).attr('muser-nama');
			var token = $("meta[name='csrf_token']").attr("content");
			swal({
			  title: "Yakin!",
			  text: muser_nama+" akan dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$(this).parent().parent().parent().remove();
			    // window.location = "/penerimaan/"+muser_id+"/delete";
			    $.ajax({
			    	url: "/penerimaan/"+muser_id+"/deletechild",
			    	type:"DELETE",
			    	data: {
			    		_token: token,
			    		id:muser_id,
			    	},
			    	success: function(response){
			    		toastr.success("Rincian telah dihapus", "Sukses")
			    	}

			    })
			  } 
			});

		});

		$(document).on("click", ".hapusbaris2", function() {
       		$(this).parent().parent().parent().remove(); 
		});
	</script>
<?php $__env->stopSection(); ?>



                  
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>