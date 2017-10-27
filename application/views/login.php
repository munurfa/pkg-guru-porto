<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php
echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php
echo base_url('assets/css/startmin.css');?>" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

 <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Silahkan Login</h3>
                        </div>
                           <?php
// Cetak jika ada notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-danger alert-dismissable"><strong>' . $this->session->flashdata('sukses') . '</strong></div>';
}
?>
                        <div class="panel-body">
                            <?php echo form_open('login'); ?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus value="<?php echo set_value('username'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo set_value('password');?>">
                                    </div>
                                 
                                    <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                                </fieldset>
                            <?php echo form_close(); ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
<script src="<?php
echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js');
?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php
echo base_url('assets/js/bootstrap.min.js');;
?>"></script>



</body>
</html>
