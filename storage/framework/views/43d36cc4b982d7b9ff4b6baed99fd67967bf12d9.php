<?php $__env->startSection('master'); ?>
	<div class="card-body pad table-responsive">
	    <table class="table table-bordered text-center">
	      <tr>
	        <td>
	        	PENERIMAAN
	          	<button type="button" class="btn btn-block btn-success btn-lg"><?php echo number_format(total('penerimaan'),2,',','.'); ?></button>
	        </td>
	        <td>
	        	PENGELUARAN
	          	<button type="button" class="btn btn-block btn-warning btn-lg"><?php echo number_format(total('pengeluaran'),2,',','.'); ?></button>
	        </td>
	        <td>
	        	SALDO BANK
	          	<button type="button" class="btn btn-block btn-primary btn-lg"><?php echo number_format(carisaldoallbank(),2,',','.'); ?></button>
	        </td>
	        <td>
	        	SALDO TUNAI
	          	<button type="button" class="btn btn-block btn-info btn-lg"><?php echo number_format(carisaldoalltunai(),2,',','.'); ?></button>
	        </td>
	      </tr>
	    </table>
	</div>

    <div class="row">
    	<!-- ZAKAT -->
    	<div class="col-md-6">
	        <div class="card card-widget widget-user-2">
	        	<div class="widget-user-header bg-primary">
	        		<h3 class="widget-user-username"><strong>Z A K A T</strong></h3>
	        	</div>
	        	<div class="card-footer p-0">
	        		<ul class="nav flex-column">
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	        					Penerimaan <span class="float-right badge bg-primary"><?php echo number_format(jumlahpenerimaan('4.1.1.01.'),2,',','.'); ?></span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Penyaluran <span class="float-right badge bg-warning"><?php echo number_format(jumlahpengeluaran('Z'),2,',','.'); ?></span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          Saldo Bank <span class="float-right badge bg-success"><?php echo number_format(carisaldobank(4),2,',','.'); ?></span>
							        </a>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							    	<div class="panel-body">
								      	<div class="card">
								            <div class="card-body p-0">
								                <table class="table table-striped">
								                  	<thead>
									                    <tr>
									                      <th>Bank/Rekening</th>
									                      <th>Total</th>
									                      <th>Bagi Hasil Bank</th>
									                    </tr>
								                  	</thead>
								                  	<tbody>
								                  		<?php $saldobungaallbank=0; ?>
								                    	<?php $__currentLoopData = $rekbank->where('sumberdana','Zakat')->where('kodebank','!=','0000'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											      		<tr>
											      			<td><?php echo e($data->singkatan); ?> - <?php echo e($data->norekbank); ?> </td>
											      			<td class="align-right"><?php echo number_format(saldobankrinci($data->id),2,',','.'); ?></td>
											      			<td class="align-right"></i><?php echo number_format(saldobunga($data->id),2,',','.'); ?></i></td>
											      		</tr>
											      			<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
											      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								                  	</tbody>
								                </table>
								            </div>
							            </div>
							      	</div>
							    </div>
							  </div>
							</div>
		              	</li>

		              	<li class="nav-item">
			                <a href="#" class="nav-link">
			                  Saldo Tunai <span class="float-right badge bg-info"><?php echo number_format(carisaldotunai(4),2,',','.'); ?></span>
			                </a>
		              	</li>
	            	</ul>
	          	</div>
	        </div>
	    </div>
	    <!-- INFAQ -->
	    <div class="col-md-6">
	        <div class="card card-widget widget-user-2">
	        	<div class="widget-user-header bg-success">
	        		<h3 class="widget-user-username"><strong>I N F A Q</strong></h3>
	        	</div>
	        	<div class="card-footer p-0">
	        		<ul class="nav flex-column">
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	        					Penerimaan <span class="float-right badge bg-primary"><?php echo number_format(jumlahpenerimaan('4.1.1.02.'),2,',','.'); ?></span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Penyaluran <span class="float-right badge bg-warning"><?php echo number_format(jumlahpengeluaran('I'),2,',','.'); ?></span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          Saldo Bank <span class="float-right badge bg-success"><?php echo number_format(carisaldobank(5),2,',','.'); ?></span>
							        </a>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body">
							      	<div class="card">
							            <div class="card-body p-0">
							                <table class="table table-striped">
							                  	<thead>
								                    <tr>
								                      <th>Bank/Rekening</th>
								                      <th>Total</th>
								                      <th>Bagi Hasil Bank</th>
								                    </tr>
							                  	</thead>
							                  	<tbody>
							                    	<?php $__currentLoopData = $rekbank->where('sumberdana','Infaq'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										      		<tr>
										      			<td><?php echo e($data->singkatan); ?> - <?php echo e($data->norekbank); ?> </td>
										      			<td class="align-right"><?php echo number_format(saldobankrinci($data->id),2,',','.'); ?></td>
										      			<td class="align-right"></i><?php echo number_format(saldobunga($data->id),2,',','.'); ?></i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                  	</tbody>
							                </table>
							            </div>
							        </div>							      	
							      </div>
							    </div>
							  </div>
							</div>
		              	</li>
		              	<li class="nav-item">
			                <a href="#" class="nav-link">
			                  Saldo Tunai <span class="float-right badge bg-info"><?php echo number_format(carisaldotunai(5),2,',','.'); ?></span>
			                </a>
		              	</li>
	            	</ul>
	          	</div>
	        </div>
	    </div>
	</div>
	    <!-- HIBAH -->
	<div class="row">
	    <div class="col-md-6">
	        <div class="card card-widget widget-user-2">
	        	<div class="widget-user-header bg-info">
	        		<h3 class="widget-user-username"><strong>H I B A H</strong></h3>
	        	</div>
	        	<div class="card-footer p-0">
	        		<ul class="nav flex-column">
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	        					Penerimaan <span class="float-right badge bg-primary"><?php echo number_format(jumlahpenerimaan('4.1.2.%'),2,',','.'); ?></span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Belanja <span class="float-right badge bg-warning"><?php echo number_format(jumlahpengeluaran('H'),2,',','.'); ?></span>
	                		</a>
	              		</li>
		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingTwo">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Saldo Bank <span class="float-right badge bg-success"><?php echo number_format(carisaldobank(999),2,',','.'); ?></span>
							        </a>
							    </div>
							    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      								<div class="panel-body">
							      	<div class="card">
							            <div class="card-body p-0">
							                <table class="table table-striped">
							                  	<thead>
								                    <tr>
								                      <th>Bank/Rekening</th>
								                      <th>Total</th>
								                      <th>Bagi Hasil Bank</th>
								                    </tr>
							                  	</thead>
							                  	<tbody>
							                    	<?php $__currentLoopData = $rekbank->where('sumberdana','Hibah'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										      		<tr>
										      			<td><?php echo e($data->singkatan); ?> - <?php echo e($data->norekbank); ?> </td>
										      			<td class="align-right"><?php echo number_format(saldobankrinci($data->id),2,',','.'); ?></td>
										      			<td class="align-right"></i><?php echo number_format(saldobunga($data->id),2,',','.'); ?></i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                  	</tbody>
							                </table>								            
							            </div>							      	
							      	</div>							      	
							    </div>
							  </div>
							</div>
		              	</li>

		              	<li class="nav-item">
			                <a href="#" class="nav-link">
			                  Saldo Tunai <span class="float-right badge bg-info"><?php echo number_format(carisaldotunai(999),2,',','.'); ?></span>
			                </a>
		              	</li>
	            	</ul>
	          	</div>
	        </div>
	    </div>
        	<!-- AMIL -->
    	<div class="col-md-6">
	        <div class="card card-widget widget-user-2">
	        	<div class="widget-user-header bg-warning">
	        		<h3 class="widget-user-username"><strong>A M I L</strong></h3>
	        	</div>
	        	<div class="card-footer p-0">
	        		<ul class="nav flex-column">
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	        					Penerimaan <span class="float-right badge bg-primary"><?php echo number_format(jumlahpenerimaan('amil'),2,',','.'); ?></span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Belanja <span class="float-right badge bg-warning"><?php echo number_format(jumlahpengeluaran('A'),2,',','.'); ?></span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingTwo">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Saldo Bank <span class="float-right badge bg-success"><?php echo number_format(carisaldobank(888),2,',','.'); ?></span>
							        </a>
							    </div>
							    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							      <div class="panel-body">
							      	<div class="card">
							            <div class="card-body p-0">
							                <table class="table table-striped">
							                  	<thead>
								                    <tr>
								                      <th>Bank/Rekening</th>
								                      <th>Total</th>
								                      <th>Bagi Hasil Bank</th>
								                    </tr>
							                  	</thead>
							                  	<tbody>
							                    	<?php $__currentLoopData = $rekbank->where('sumberdana','Semua'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										      		<tr>
										      			<td><?php echo e($data->singkatan); ?> - <?php echo e($data->norekbank); ?> </td>
										      			<td class="align-right"><?php echo number_format(saldobankrinci($data->id),2,',','.'); ?></td>
										      			<td class="align-right"></i><?php echo number_format(saldobunga($data->id),2,',','.'); ?></i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										      		<tr>
										      			<td>Bunga di luar Rekening Amil</td>
										      			<td class="align-right"><?php echo number_format($saldobungaallbank-saldobunga($data->id),2,',','.'); ?></td>
										      			<td class="align-right"></i><?php echo number_format($saldobungaallbank-saldobunga($data->id),2,',','.'); ?></i></td>
										      		</tr>
							                  	</tbody>
							                </table>
							            </div>
							        </div>	
							      </div>
							    </div>
							  </div>
							</div>
		              	</li>

		              	<li class="nav-item">
			                <a href="#" class="nav-link">
			                  Saldo Tunai <span class="float-right badge bg-info"><?php echo number_format(carisaldotunai(888),2,',','.'); ?></span>
			                </a>
		              	</li>
	            	</ul>
	          	</div>
	        </div>
	    </div>
    	
    	<!-- BAZNAS -->
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>