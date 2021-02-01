<!DOCTYPE html>
<html>
<head>
<style>
	table {
	  font-family: "Times New Roman", Times, serif;
	  font-size: 12px;
	  border-collapse: collapse;
	  width: 100%;
	}

	td, th {
	  border: 1px solid #000000;
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(odd) {
		border: 1px solid #000000;
	  background-color: #dddddd;
	}
	th {
		text-align: center;
		background-color: #dddddd;
	}
	.detailuraian {
	    font-size: 10px;
	    margin-block-start: 0em;
	    margin-block-end: 0em;

	}
</style>
</head>
<body>

<h2>Penerimaan Baznas Kabupaten Batang Hari</h2>
<p>Dari Tanggal <?php echo e(Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")); ?> Sampai dengan <?php echo e(Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")); ?></p>

<table>
  	<tr>
    	<th>No</th>
		<th>Nomor</th>
		<th>Tanggal</th>
		<th>Donatur</th>
		<th>Bukti</th>
		<th>Uraian</th>
		<th>Rekening</th>
		<th>Jumlah</th>
  	</tr>
  	<?php  
	    $no=1;
	    $total=0
	?>
	<?php $__currentLoopData = $penerimaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>  
		<td><?php echo e($no); ?></td>
		<td><?php echo e($d->nomasuk); ?></td>
		<td><?php echo e(Carbon\Carbon::parse($d->tanggal)->format("d/m/Y")); ?></td>
		<td><?php echo e($d->donatur); ?></td>
		<td><?php echo e($d->bukti); ?></td>
		<td><?php echo e($d->uraian); ?>

			<hr>
			<?php $__currentLoopData = $d->penerimaandet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p class="detailuraian"><?php echo e($det->matangd->nmrek); ?> = <?php echo number_format($det->jumlah,2,',','.'); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</td>						    
		<td><?php echo e($d->daftbank->singkatan); ?></td>
		<td style="text-align: right;"><?php echo number_format($d->penerimaandet->sum('jumlah'),2,',','.'); ?>
		</td>
	</tr>
	<?php
		$total=$total+($d->penerimaandet->sum('jumlah'));
	    $no++;
	?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td colspan="7">Total</td>
		<td style="text-align: right;"><?php echo number_format($total,2,',','.'); ?></td>
	</tr>
</table>

</body>
</html>


