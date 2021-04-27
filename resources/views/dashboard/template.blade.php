<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo text-center">
                <a href="#">
                    <img src="/images/icon/logo.png" alt="Pengadaan Barang" />
                    {{-- <h3>Pengadaan Barang</h3> --}}
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard')">
                            <a class="js-arrow" href="{{route('index')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <span style="font-size: 12px;color:#b7b9cc;font-weight: bold;">Data Master</span>
                        <li class="@yield('supplier')">
                            <a href="{{route('supplier')}}">
                                <i class="fas fa-user-plus"></i>Supplier</a>
                        </li>
                        <li class="has-sub @yield('barang')">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Barang</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('satuan_barang')}}">Satuan Barang</a>
                                </li>
                                <li>
                                    <a href="{{route('jenis_barang')}}">Jenis Barang</a>
                                </li>
                                <li>
                                    <a href="{{route('data_barang')}}">Data Barang</a>
                                </li>
                            </ul>
                        </li>
                        <span style="font-size: 12px;color:#b7b9cc;font-weight: bold;">Transaksi</span>
                        <li class="@yield('barangmasuk')">
                            <a href="{{route('barang_masuk')}}">
                                <i class="fas fa-user-plus"></i>Barang Masuk</a>
                        </li>
                        <li class="@yield('barangkeluar')">
                            <a href="{{route('barang_keluar')}}">
                                <i class="fas fa-mortar-board"></i>Barang Keluar</a>
                        </li>
                        <span style="font-size: 12px;color:#b7b9cc;font-weight: bold;">Report</span>
                        <li class="@yield('laporan')">
                            <a href="{{route('laporan')}}">
                                <i class="fas fa-address-book"></i>Cetak Laporan</a>
                        </li>
                        @if(Session::get('role')==1)
                        <span style="font-size: 12px;color:#b7b9cc;font-weight: bold;">Settings</span>
                        <li class="@yield('user_management')">
                            <a href="{{route('user_management')}}">
                                <i class="fas fa-address-book"></i>User Management</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/images/profile/{{Session::get('foto')}}" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Session::get('name')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/images/profile/{{Session::get('foto')}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="/dashboard/profile">{{Session::get('name')}}</a>
                                                    </h5>
                                                    <span class="email">{{Session::get('email')}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <!-- <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script> -->
    <script src="{{ asset('vendor/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('vendor/jquery.dataTables.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('vendor/daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/daterange/daterangepicker.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterange/daterangepicker.css') }}" />

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">
        $(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
        $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#searchtable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Cari '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#searchtable').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that.search( this.value ).draw();
                    }
                } );
            } );
        }
    });
 
} );

        function deleteSupplier(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_supplier/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteSatuan(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_satuan/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteJenis(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_jenis/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteBarang(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_barang/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteBarangMasuk(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_barangmasuk/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteBarangKeluar(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_barangkeluar/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteUser(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/delete_user/"+id,function(result){    
                    location.reload();
                });
            }
        }
    </script>


</body>

</html>
<!-- end document-->
