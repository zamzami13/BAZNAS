<table class="table" style="border: 1px solid #ddd">
	<thead>
		<tr>
			<th>Kode Bank</th>
			<th>Nama Bank</th>
			<th>Singkatan</th>
			<th>Rekenig Bank</th>
			<th>Nama Rekening</th>
			<th>Alamat Bank</th>
			<th>Telepon Bank</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $daftbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($data->kodebank); ?></td>
				<td><?php echo e($data->namabank); ?></td>
				<td><?php echo e($data->singkatan); ?></td>
				<td><?php echo e($data->norekbank); ?></td>
				<td><?php echo e($data->nmrekbank); ?></td>
				<td><?php echo e($data->alamat); ?></td>
				<td><?php echo e($data->telpon); ?></td>
				
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
	
</table>