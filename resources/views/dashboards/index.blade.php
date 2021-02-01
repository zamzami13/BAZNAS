@extends('layout.master')

@section ('master')
	<div class="card-body pad table-responsive">
	    <table class="table table-bordered text-center">
	      <tr>
	        <td>
	        	PENERIMAAN
	          	<button type="button" class="btn btn-block btn-success btn-lg">@rupiah(total('penerimaan'))</button>
	        </td>
	        <td>
	        	PENGELUARAN
	          	<button type="button" class="btn btn-block btn-warning btn-lg">@rupiah(total('pengeluaran'))</button>
	        </td>
	        <td>
	        	SALDO BANK
	          	<button type="button" class="btn btn-block btn-primary btn-lg">@rupiah(carisaldoallbank())</button>
	        </td>
	        <td>
	        	SALDO TUNAI
	          	<button type="button" class="btn btn-block btn-info btn-lg">@rupiah(carisaldoalltunai())</button>
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
	        					Penerimaan <span class="float-right badge bg-primary">@rupiah(jumlahpenerimaan('4.1.1.01.'))</span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Penyaluran <span class="float-right badge bg-warning">@rupiah(jumlahpengeluaran('Z'))</span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          Saldo Bank <span class="float-right badge bg-success">@rupiah(carisaldobank(4))</span>
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
								                    	@foreach($rekbank->where('sumberdana','Zakat')->where('kodebank','!=','0000') as $data)
											      		<tr>
											      			<td>{{$data->singkatan}} - {{$data->norekbank}} </td>
											      			<td class="align-right">@rupiah(saldobankrinci($data->id))</td>
											      			<td class="align-right"></i>@rupiah(saldobunga($data->id))</i></td>
											      		</tr>
											      			<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
											      		@endforeach
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
			                  Saldo Tunai <span class="float-right badge bg-info">@rupiah(carisaldotunai(4))</span>
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
	        					Penerimaan <span class="float-right badge bg-primary">@rupiah(jumlahpenerimaan('4.1.1.02.'))</span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Penyaluran <span class="float-right badge bg-warning">@rupiah(jumlahpengeluaran('I'))</span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          Saldo Bank <span class="float-right badge bg-success">@rupiah(carisaldobank(5))</span>
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
							                    	@foreach($rekbank->where('sumberdana','Infaq') as $data)
										      		<tr>
										      			<td>{{$data->singkatan}} - {{$data->norekbank}} </td>
										      			<td class="align-right">@rupiah(saldobankrinci($data->id))</td>
										      			<td class="align-right"></i>@rupiah(saldobunga($data->id))</i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		@endforeach
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
			                  Saldo Tunai <span class="float-right badge bg-info">@rupiah(carisaldotunai(5))</span>
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
	        					Penerimaan <span class="float-right badge bg-primary">@rupiah(jumlahpenerimaan('4.1.2.%'))</span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Belanja <span class="float-right badge bg-warning">@rupiah(jumlahpengeluaran('H'))</span>
	                		</a>
	              		</li>
		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingTwo">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Saldo Bank <span class="float-right badge bg-success">@rupiah(carisaldobank(999))</span>
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
							                    	@foreach($rekbank->where('sumberdana','Hibah') as $data)
										      		<tr>
										      			<td>{{$data->singkatan}} - {{$data->norekbank}} </td>
										      			<td class="align-right">@rupiah(saldobankrinci($data->id))</td>
										      			<td class="align-right"></i>@rupiah(saldobunga($data->id))</i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		@endforeach
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
			                  Saldo Tunai <span class="float-right badge bg-info">@rupiah(carisaldotunai(999))</span>
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
	        					Penerimaan <span class="float-right badge bg-primary">@rupiah(jumlahpenerimaan('amil'))</span>
	        				</a>
	        			</li>
	        			<li class="nav-item">
	        				<a href="#" class="nav-link">
	                  			Belanja <span class="float-right badge bg-warning">@rupiah(jumlahpengeluaran('A'))</span>
	                		</a>
	              		</li>

		              	<li class="nav-item">
		                	<div class="panel-group nav-link" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingTwo">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Saldo Bank <span class="float-right badge bg-success">@rupiah(carisaldobank(888))</span>
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
							                    	@foreach($rekbank->where('sumberdana','Semua') as $data)
										      		<tr>
										      			<td>{{$data->singkatan}} - {{$data->norekbank}} </td>
										      			<td class="align-right">@rupiah(saldobankrinci($data->id))</td>
										      			<td class="align-right"></i>@rupiah(saldobunga($data->id))</i></td>
										      		</tr>
										      		<?php $saldobungaallbank=$saldobungaallbank+saldobunga($data->id); ?>
										      		@endforeach
										      		<tr>
										      			<td>Bunga di luar Rekening Amil</td>
										      			<td class="align-right">@rupiah($saldobungaallbank-saldobunga($data->id))</td>
										      			<td class="align-right"></i>@rupiah($saldobungaallbank-saldobunga($data->id))</i></td>
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
			                  Saldo Tunai <span class="float-right badge bg-info">@rupiah(carisaldotunai(888))</span>
			                </a>
		              	</li>
	            	</ul>
	          	</div>
	        </div>
	    </div>
    	
    	<!-- BAZNAS -->
    </div>



@stop