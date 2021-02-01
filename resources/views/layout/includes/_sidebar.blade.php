  <aside class="main-sidebar elevation-4 sidebar-dark-info ">
    <!-- Brand Logo -->
    <a href="https://www.facebook.com/people/Baznas-Kab-Batanghari/100011366223413" target="_blank" class="brand-link">
      <img src="{{asset('admin/assets/img/logo-dark.png')}}" class="img-responsive logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="true">
          @if(auth()->user()->role == 'admin' or auth()->user()->role == 'bendahara' )
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/muser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manajemen User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/daftbank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekening Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/matangd" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/matangr" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penerimaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pergeseran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pergeseran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pengeluaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Posisi Kas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penerimaan/cetakpenerimaanform" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kas Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kas Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bku" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Kas Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Keuangan</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>