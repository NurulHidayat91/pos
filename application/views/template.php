<?php if ($this->fungsi->user_login()->level == 1) { ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Point Of Sales</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/sweetalert2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/animate.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- SEARCH FORM -->


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item">
                        <a href="#" class="d-block mr-3"><?= ucfirst($this->fungsi->user_login()->username); ?></a>

                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?= base_url('dashboard') ?>" class="brand-link">
                    <img src="<?= base_url() ?>assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url() ?>assets/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?= ucfirst($this->fungsi->user_login()->name); ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview menu-open" <?= $this->uri->segment(1) == 'dashboard' ? 'class ="active"' : '' ?>>
                                <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>

                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'customer' || $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Data Master
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li <?= $this->uri->segment(1) == 'customer' ? 'class ="active"' : '' ?>>
                                        <a href="<?= base_url('customer') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Customers</p>
                                        </a>
                                    </li>
                                    <li class="" <?= $this->uri->segment(1) == 'supplier' ? 'class ="active"' : '' ?>>
                                        <a href="<?= site_url('supplier') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Suppliers</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <!-- <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-archive"></i>
                                    <p>
                                        Products
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'category' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('category') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'category' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('unit') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Units</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'item' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('item') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-shopping-cart"></i>
                                    <p>
                                        Transaction
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
                                        <a href="<?= site_url('sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'stock' && $this->uri->segment(1) == 'in' ? 'active' : '' ?>">
                                        <a href="<?= site_url('stock/in') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock In</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'stock' && $this->uri->segment(1) == 'out' ? 'active' : '' ?>">
                                        <a href="<?= site_url('stock/out') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock Out</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-mug-hot"></i>
                                    <p>
                                        Penjualan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
                                        <a href="<?= site_url('Data_sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Oderan</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fa fa-chart-pie"></i>
                                    <p>
                                        Reports
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                                        <a href="<?= site_url('report/sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-header">SETTINGS</li>
                            <li <?= $this->uri->segment(1) == 'user' ? 'class ="active"' : '' ?>>
                                <a href="<?= site_url('user') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Users</p>
                                </a>
                            </li>

                            <li <?= $this->uri->segment(1) == 'logout' ? 'class ="active"' : '' ?>>
                                <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
            <script src="<?= base_url() ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $contents ?>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.4
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <!-- <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script> -->
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>assets/template/dist/js/demo.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url() ?>assets/sweetalert2/js/sweetalert2.min.js"></script>
        <!-- page script -->

        <script>
            var flash = $('#flash').data('flash');
            if (flash) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: flash,
                    showClass: {
                        popup: 'animate__animated animate__bounceInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
            }

            $(document).on('click', '#btn-hapus', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                })
            })
        </script>
        <script>
            $(function() {
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
    </body>

    </html>

<?php } else { ?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Point Of Sales</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/sweetalert2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/css/animate.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- SEARCH FORM -->


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item">
                        <a href="#" class="d-block mr-3"><?= ucfirst($this->fungsi->user_login()->username); ?></a>

                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?= base_url('dashboard') ?>" class="brand-link">
                    <img src="<?= base_url() ?>assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url() ?>assets/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?= ucfirst($this->fungsi->user_login()->name); ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview menu-open" <?= $this->uri->segment(1) == 'dashboard' ? 'class ="active"' : '' ?>>
                                <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>

                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                            <!-- <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'customer' || $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Data Master
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li <?= $this->uri->segment(1) == 'customer' ? 'class ="active"' : '' ?>>
                                        <a href="<?= base_url('customer') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Customers</p>
                                        </a>
                                    </li>
                                    <li class="" <?= $this->uri->segment(1) == 'supplier' ? 'class ="active"' : '' ?>>
                                        <a href="<?= site_url('supplier') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Suppliers</p>
                                        </a>
                                    </li>

                                </ul>
                            </li> -->

                
                            <!-- <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-archive"></i>
                                    <p>
                                        Products
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'category' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('category') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'category' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('unit') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Units</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'item' ? 'class ="active"' : '' ?>">
                                        <a href="<?= site_url('item') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Items</p>
                                        </a>
                                    </li>

                                </ul>
                            </li> -->
                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-shopping-cart"></i>
                                    <p>
                                        Transaction
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
                                        <a href="<?= site_url('sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales</p>
                                        </a>
                                    </li>
                                   
                                    <li class="<?= $this->uri->segment(1) == 'stock' && $this->uri->segment(1) == 'in' ? 'active' : '' ?>">
                                        <a href="<?= site_url('stock/in') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock In</p>
                                        </a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'stock' && $this->uri->segment(1) == 'out' ? 'active' : '' ?>">
                                        <a href="<?= site_url('stock/out') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock Out</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-shopping-cart"></i>
                                    <p>
                                        Penjualan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
                                        <a href="<?= site_url('sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Sales</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>

                            <!-- <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fa fa-chart-pie"></i>
                                    <p>
                                        Reports
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="<?= $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                                        <a href="<?= site_url('report/sale') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sales</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock</p>
                                        </a>
                                    </li>

                                </ul>
                            </li> -->

                            <li class="nav-header">SETTINGS</li>
                    
                            <li <?= $this->uri->segment(1) == 'logout' ? 'class ="active"' : '' ?>>
                                <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
            <script src="<?= base_url() ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $contents ?>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.4
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <!-- <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script> -->
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>assets/template/dist/js/demo.js"></script>


        <!-- SweetAlert2 -->
        <script src="<?= base_url() ?>assets/sweetalert2/js/sweetalert2.min.js"></script>

        <!-- page script -->

        <script>
            var flash = $('#flash').data('flash');
            if (flash) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: flash,
                    showClass: {
                        popup: 'animate__animated animate__bounceInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
            }

            $(document).on('click', '#btn-hapus', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                })
            })
        </script>
        <script>
            $(function() {
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
    </body>

    </html>


<?php } ?>