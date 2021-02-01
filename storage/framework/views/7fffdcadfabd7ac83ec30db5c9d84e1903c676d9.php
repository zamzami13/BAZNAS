<!DOCTYPE html>
<html>
<head>
<style>
	table {
	  font-family: "Times New Roman", Times, serif;
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
</style>
</head>
<body>

<h2>Penerimaan Baznas Kabupaten Batang Hari</h2>
<p>Dari Tanggal <?php echo e(Carbon\Carbon::parse($data['tanggalawal'])->format("d/m/Y")); ?> Sampai dengan <?php echo e(Carbon\Carbon::parse($data['tanggalakhir'])->format("d/m/Y")); ?></p>
<p>Akun : <?php echo e($nmrek); ?></p>

<table>
  	<tr>
    	<th>No</th>
		<th>Nomor</th>
		<th>Tanggal</th>
		<th>Donatur</th>
		<th>Bukti</th>
		<th>Rekening</th>
		<th>Jumlah</th>
  	</tr>
  	<?php  
	    $no=1;
	    $total=0
	?>
	<?php $__currentLoopData = $penerimaandet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>  
		<td><?php echo e($no); ?></td>
		<td><?php echo e($d->penerimaan->nomasuk); ?></td>
		<td><?php echo e(Carbon\Carbon::parse($d->penerimaan->tanggal)->format("d/m/Y")); ?></td>
		<td><?php echo e($d->penerimaan->donatur); ?></td>
		<td><?php echo e($d->penerimaan->bukti); ?></td>								    
		<td><?php echo e($d->penerimaan->daftbank->singkatan); ?> - <?php echo e($d->penerimaan->daftbank->norekbank); ?></td>
		<td style="text-align: right;"><?php echo number_format($d->jumlah,2,',','.'); ?>
		</td>
	</tr>
	<?php
		$total=$total+($d->jumlah);
	    $no++;
	?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td colspan="6">Total</td>
		<td style="text-align: right;"><?php echo number_format($total,2,',','.'); ?></td>
	</tr>
</table>

</body>
</html>


