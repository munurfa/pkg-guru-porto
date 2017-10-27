
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) 
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <?php
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-danger alert-dismissable"><strong>' . $this->session->flashdata('sukses') . '</strong></div>';
}
?>
                        <h1>BERANDA ADMIN</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
</div>