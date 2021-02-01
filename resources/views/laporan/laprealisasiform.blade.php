@extends('layout.master')
@section ('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop
@section ('master')



	<div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Laporan Keuangan</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Perubahan Dana</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Rinci</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <form action="/laporan/perubahandanaexportpdf" method="POST" target="_blank">
							{{csrf_field()}}
					        <div class="card-body">
					        	<div class="row">
									<div class="col-2">
										<div class="form-group">
											<label>Tanggal Awal</label>
						                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
						                        <input name="tanggalawal" id="tanggalawal"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
						                    </div>
						                </div>
									</div>
									<div class="col-2">
										<div class="form-group">
											<label>Tanggal Akhir</label>
						                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
						                        <input name="tanggalakhir" id="tanggalakhir"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
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
                     <form action="/penerimaan/exportrincipdf" method="POST" target="_blank">
						{{csrf_field()}}
				        <div class="card-body">
				        	<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label>Tanggal Awal</label>
					                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					                        <input name="tanggalawal" id="tanggalawal"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
					                    </div>
					                </div>
								</div>
								<div class="col-2">
									<div class="form-group">
										<label>Tanggal Akhir</label>
					                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					                        <input name="tanggalakhir" id="tanggalakhir"type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="{{date('Y-m-d')}}">
					                    </div>
					                </div>
								</div>				
							</div>
							<div class="row">
								<div class="col-2">
									<div class="form-group">
										<label>Akun Penerimaan</label>
										<select name="matangd_id" class="form-control form-control-sm">
											@foreach($matangd as $r)
												<option value="{{$r->id}}">{{$r->nmrek}}</option>
											@endforeach                          
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


@stop

@section ('footer')

	</script>
	<!-- DataTables -->
	<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<!-- page script -->
@stop