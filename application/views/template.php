<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SINPKG | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('assets/js/plugins/morris/morris.css'); ?>" rel="stylesheet">
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

       
    </head>
    <body class="skin-blue">
        <div class="wrapper fixed">

            <header class="main-header">
                <!-- Logo -->
                
                <!-- <a href="<?php echo base_url().'guru'?>"> -->
                <a href="<?php echo base_url().'dashboard'?>" class="logo"><b>SINPKG</b></a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fa fa-user fa-fw"></i><?php echo $this->session->nip; ?><i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    
                                    <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>

                                    <!-- <a href="<?php echo base_url().'auth/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a> -->
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                <!-- /.dropdown -->
                    </ul>


                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                    </div>
                   
                    <ul class="sidebar-menu">
                        <!-- <li class="header">MAIN NAVIGATION</li> -->
                        <li><a href="<?php echo base_url().'beranda/index/'.$this->session->status?>"><i class="fa fa-circle-o"></i>Beranda</a></li>
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php echo ($this->uri->segment(1)=='kepsek') ? 'active' : '' ; ?>"><a href="<?php echo base_url().'kepsek'?>"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a>
                                </li>
                                <li class="<?php echo ($this->uri->segment(1)=='guru') ? 'active' : '' ; ?>">
                                    <a href="<?php echo base_url().'guru'?>"><i class="fa fa-circle-o"></i> Data Guru</a>

                                </li>
                                <li class="<?php echo ($this->uri->segment(1)=='penilai') ? 'active' : '' ; ?>">
                                <a href="<?php echo base_url().'penilai'?>"><i class="fa fa-circle-o"></i> Data Penilai</a>
                                </li>
                                <li class="<?php echo ($this->uri->segment(1)=='kompetensi') ? 'active' : '' ; ?>">
                                <a href="<?php echo base_url().'kompetensi'?>"><i class="fa fa-circle-o"></i> Data Kompetensi dan Indikator</a>
                                </li>
                                
                            </ul>
                        </li>
                         <li class="<?php echo ($this->uri->segment(1)=='data_penilaian') ? 'active' : '' ; ?>"><a href="<?php echo base_url().'data_penilaian'?>"><i class="fa fa-dashboard"></i>Data Penilaian</a></li>
                         
                        
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">

            <!-- CONTENT SUATU SAAT DIBUTUHKAN -->

            <?php echo $contents; ?>
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Gopri Studio</a>.</strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('assets/adminlte/js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url('assets/js/AdminLTE/dashboard2.js'); ?>" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/AdminLTE/demo.js'); ?>"></script> 
    </body>
</html>