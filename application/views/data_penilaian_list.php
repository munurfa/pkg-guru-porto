<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) <small>Data Penilaian</small>
                        </h2>
                    </div>
                </div> 


          <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                            
                            <form action="<?php echo $action; ?>" method="post">
                            <!-- <div class="panel-body"> -->
                                <table class='table table-bordered'>
            <tr>
            <td>NIP guru <?php echo form_error('nip_pegawai') ?></td>
            <td>
                <?php 
                    echo form_dropdown('nip_pegawai', $guru, set_value('nip_pegawai'),array('class' => 'form-control'));

                ?> 
            </td>
           </tr>

           <tr>
            <td>NIP penilai <?php echo form_error('nip_penilai') ?></td>
            <td>
                <?php 
                    echo form_dropdown('nip_penilai', $penilai, set_value('nip_penilai'),array('class' => 'form-control'));

                ?> 
            </td>
           </tr>
          
            
            <tr>
                <td>Tahun Penilaian</td>
                <td>
                    <select name="tahun_penilaian" class="form-control" placeholder="Pilih" required>
                            <option value="2017.1">2017.1</option>
                            <option value="2017.2">2017.2</option>
                            <option value="2018.1">2018.1</option>
                            <option value="2018.2">2018.2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Penilaian</td>
                <td>
                    <input type="date" name="tgl_penilaian" class="form-control" >
                </td>
            </tr>
        <input type="hidden" name="id_nilai_kompetensi" value="<?php echo $id_nilai_kompetensi; ?>" />
         <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
         <a href="<?php echo site_url('datarekap') ?>" class="btn btn-default">Lihat Data Rekap</a>
       
        </table></form>

                              
                                
                            
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
</div>