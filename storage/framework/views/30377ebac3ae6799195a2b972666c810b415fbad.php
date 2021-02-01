<?php $__env->startSection('header'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('master'); ?>
<h2 class="mb-2 mt-4 text-center">PERGESERAN</h2>
<div class="row">
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fas fa-money-bill-wave"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">TOTAL</span>
        <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldoallbank(),2,',','.'); ?></span>
        <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldoalltunai(),2,',','.'); ?></span>
      </div>
    </div>
  </div>
  <div class="col-md-2 col-sm-6 col-12">
    <div class="info-box bg-success">
      <div class="info-box-content">
        <span class="info-box-text">ZAKAT</span>
        <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(4),2,',','.'); ?></span>
        <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(4),2,',','.'); ?> </span>
      </div>
    </div>
  </div>
  <div class="col-md-2 col-sm-6 col-12">
    <div class="info-box bg-warning">
      <div class="info-box-content">
        <span class="info-box-text">INFAQ</span>
        <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(5),2,',','.'); ?></span>
        <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(5),2,',','.'); ?> </span>
      </div>
    </div>
  </div>
  <div class="col-md-2 col-sm-6 col-12">
    <div class="info-box bg-danger">
      <div class="info-box-content">
        <span class="info-box-text">HIBAH</span>
        <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(999),2,',','.'); ?></span>
        <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(999),2,',','.'); ?></span>
      </div>
    </div>
  </div>
  <div class="col-md-2 col-sm-6 col-12">
    <div class="info-box bg-info">
      <div class="info-box-content">
        <span class="info-box-text">AMIL</span>
        <span class="info-box-text">Saldo Bank <?php echo number_format(carisaldobank(888),2,',','.'); ?></span>
        <span class="info-box-text">Saldo Tunai <?php echo number_format(carisaldotunai(888),2,',','.'); ?></span>
      </div>
    </div>
  </div>
  <div class="col-md-1 col-sm-6 col-12">
    <div class="info-box bg-warning">      
      <div class="info-box-content">
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Geser </button>
      </div>
    </div>
  </div>
</div>
<div class="card"> 
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
          <th>No</th>
          <th>Nomor</th>
          <th>Jenis</th>
          <th>Tanggal</th>
          <th>Bank</th>
          <th>Bukti</th>
          <th>Uraian</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
              $no=1;
          ?>
        <?php $__currentLoopData = $pergeseran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>  
          <td><?php echo e($no); ?></td>
          <td><?php echo e($data->nomor); ?></td>
          <td><?php echo e($data->jenistransaksi); ?></td>
          <td><?php echo e(Carbon\Carbon::parse($data->tanggal)->format("d/m/Y")); ?></td>
          <td><?php echo e($data->daftbank->singkatan); ?> - <?php echo e($data->daftbank->norekbank); ?></td>
          <td><?php echo e($data->bukti); ?></td>
          <td><?php echo e($data->uraian); ?></td>
          <td class="text-right"><?php echo number_format($data->jumlah,2,',','.'); ?></td>
          <td>            
            <a href="#" data-toggle="modal" data-target="#editpergeseran-<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">Ubah</a>
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
          <th>Jenis</th>
          <th>Tanggal</th>
          <th>Bank</th>
          <th>Bukti</th>
          <th>Uraian</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>     
</div> 

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Pergeseran Dana</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/pergeseran/create" method="POST">
            <?php echo e(csrf_field()); ?>

              <div class="col-12" style="text-align: center;">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kodetrans" value="1" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1"><strong>Geser Bunga Bank ke Tunai</strong></label>
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

  <!-- Modal edit -->
  <!-- <?php $__currentLoopData = $pergeseran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
  <div class="modal fade" id="editpergeseran-<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Pergeseran Dana</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/pergeseran/<?php echo e($data->id); ?>/edit" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="col-12" style="text-align: center;">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kodetrans" value="1" id="exampleCheck1" <?php if($data->kodetrans==1): ?> checked="" <?php endif; ?> >
                  <label class="form-check-label" for="exampleCheck1"><strong>Geser Bunga Bank ke Tunai</strong></label>
                </div>
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Jenis Pergeseran:</label>
                  <select name="jenistransaksi" class="form-control form-control-sm">
                    <option value="ketunai" <?php if($data->jenistransaksi=='ketunai'): ?> selected <?php endif; ?>>Bank ke Tunai</option>
                    <option value="kebank"  <?php if($data->jenistransaksi=='kebank'): ?> selected <?php endif; ?>>Tunai ke Bank</option>                           
                  </select>            
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Nomor :</label>
                  <input value="<?php echo e($data->nomor); ?>"name="nomor" class="form-control form-control-sm" type="text" placeholder="XX-XXX" required="" maxlength="7" minlength="6">           
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                    <label>Tanggal:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input value="<?php echo e($data->tanggal); ?>" name="tanggal" type="date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" value="<?php echo e(date('Y-m-d')); ?>">
                    </div>           
                  </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label >Uraian</label>
                    <textarea name="uraian" class="form-control form-control-sm"  rows="2"><?php echo e($data->uraian); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label >Rekening Bank</label>
                      <select name="daftbank_id" class="form-control form-control-sm">
                        <?php $__currentLoopData = $rekbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($rek->id); ?>"><?php echo e($rek->singkatan); ?> - <?php echo e($rek->norekbank); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                 
                      </select>          
                  </div>            
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label >Dokumen Pergeseran</label>
                    <input value="<?php echo e($data->bukti); ?>" name="bukti" type="text" class="form-control form-control-sm" placeholder="Kode...">           
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label >Jumlah</label>
                    <input value="<?php echo e($data->jumlah); ?>" name="jumlah" class="form-control form-control-sm" type="text" onKeyPress="return kodeScript(event,'0123456789.',this)"  placeholder="000.000,00">
                  </div>
                </div>
              </div>        
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  <script src="<?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
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
    <script type="text/javascript">
    $('.elemendelete').click(function(){
      var muser_id = $(this).attr('rekbank-id');
      var muser_nama = $(this).attr('rekbank-nama');
      swal({
        title: "Yakin!",
        text: "Data "+muser_nama+" akan dihapus?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/pergeseran/"+muser_id+"/delete";
        } 
      });

    });
  </script>
<?php $__env->stopSection(); ?>              	
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>