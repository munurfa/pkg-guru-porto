
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) - <?php echo $this->session->status ?> <small>SD Negeri 6 Adiwerna</small>
                        </h2>
                    </div>
                </div> 
                                                                <?php
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-danger alert-dismissable"><strong>' . $this->session->flashdata('sukses') . '</strong></div>';
}
?>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> 

                                 <div>
                                    <img src="<?php echo base_url(); ?>assets/img/dashboard.png" width='500px' class='img-responsive center-block'>
                                    <!-- <img src="<? php ">     -->
                                 </div>                    
                            </div>
                            
                           <div class="panel-body">
                                <h3>PROFIL SD NEGERI 6 ADIWERNA</h3>
                                <p class="text-justify">&nbsp &nbsp &nbsp 
                                    SD Negeri Adiwerna 6 adalah salah satu SD negeri di kecamatan Adiwerna. SD Negeri Adiwerna 6 terletak di jalan Pagenjahan RT 26/03 Adiwerna. SD Negeri Adiwerna 6 sudah berdiri pada masa pemerintah belanda pada tahun 1926. Pada saat itu SD Adiwerna 6 masih bernama SR atau biasa disebut Sekolah Rakyat dan hanya ada 2 ruang kelas.
                                    <br><br>
                                    &nbsp &nbsp &nbsp Pada Tahun 1960 SR atau Sekolah Rakyat berganti nama yaitu SD Adiwerna Wetan. Setelah berjalannya waktu pada tahun 1976 SD SD Adiwerna Wetan berganti nama yaitu SD Negeri Adiwerna 6 sampai dengan saat ini. SD Negeri Adiwerna 6 memiliki luas tanah 846 m2 dan mempunyai tenaga pendidik dengan total 13 orang yang terdiri dari laki-laki 4 orang dan perempuan 9 orang. SD Negeri Adiwerna 6 berdasarkan data terbaru pada tahun 2016 memiliki total siswa 204 yang terdiri dari laki-laki 104 orang dan perempuan 100 orang.
                                </p>
                                <h3>Visi SD Negeri 6 Adiwerna</h3>
                                <p>
Membentuk anak didik yang taqwa, cerdas, trampil, cinta tanah air dan berbudi pekerti luhur.
</p>
<h3>Misi SD Negeri 6 Adiwerna </h3>
<p>
a)   Membiasakan siswa patuh terhadap guru, agama dan tata  
     tertib siswa.
     <br>
b)  Meningkatkan efektifitas kegiatan belajar mengajar.
<br>
c)  Melatih siswa bersikap sopan santu terhadap orang tua maupun teman dalam kehidupan sehari-hari.

                                </p>

                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
</div>