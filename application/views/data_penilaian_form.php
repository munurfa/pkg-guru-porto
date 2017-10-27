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
                
                   <!-- <h3 class='box-title'>Form penilainilaian</h3> -->
                      <!-- <div class='box box-primary'> -->
                     
        <form action="<?php echo $action; ?>" method="post">
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
          <!--  <tr>
            <td>NIP kepala sekolah <?php echo form_error('nip_pegawai') ?></td>
            <td>
                <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" placeholder="Isi NIP kepsek" value="<?php echo $nip_pegawai; ?>" /> 
            </td>
            </tr> -->
            
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
        <input type="hidden" name="id_nilai_kompetensi" value="<?php echo $id_nilai_kompetensi; ?>" /> 
        <tr>
            <td colspan='2'>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </td>
            <td><a href="<?php echo site_url('data_penilaian') ?>" class="btn btn-default">Cancel</a></td>
        </tr>
        </table></form>


        
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>