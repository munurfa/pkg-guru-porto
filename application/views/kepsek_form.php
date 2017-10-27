<!-- Main content -->
<div class="container-fluid">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>KEPALA SEKOLAH</h3>
                      <div class='box box-primary'>
                      <!-- <?php echo form_open('kepsek/create'); ?> -->
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>
	       <tr>
            <td>Nip Pegawai <?php echo form_error('nip_pegawai') ?></td>
            <td>
                <input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" placeholder="Nip Pegawai" value="<?php echo $nip_pegawai; ?>" /> 
            </td>
	       <tr>
            <td>Nama Pegawai <?php echo form_error('nama_pegawai') ?></td>
            <td>
                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" /> 
            </td>
	       <tr>
            <td>Nuptk <?php echo form_error('nuptk') ?></td>
            <td><input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Nuptk" value="<?php echo $nuptk; ?>" /></td>
	       <tr>
            <td>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td>
            <td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
            </td>
    	    <tr><td>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td>
                <td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
            </td>

           <!--  <tr><td>Pangkat <?php echo form_error('pangkat') ?></td>
                <td><input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Pangkat" value="<?php echo $pangkat; ?>" />
            </td> -->

            <tr><td>Golongan <?php echo form_error('golongan') ?></td>
                <td>
                <?php 
                    // $selected= $this->input->post('golongan') ? TRUE : FALSE ;
                 
                 $options = array(
                            'III.a' => 'III.a',
                            'III.b' => 'III.b',
                            'III.c' => 'III.c',
                            'III.d' => 'III.d',
                            'IV.a' => 'IV.a',
                            'IV.b' => 'IV.b',
                            'IV.c' => 'IV.c',
                            'IV.d' => 'IV.d',
                            'IV.e' => 'IV.e',

                    );

                    echo form_dropdown('golongan', $options, $golongan,array('class' => 'form-control' ));
                ?>
                 
                <!-- <input type="text" class="form-control" name="golongan" id="golongan" placeholder="Golongan" value="<?php echo $golongan; ?>" /> -->
            </td>

    	    <!-- <tr><td>Jabatan Fungsional <?php echo form_error('jabatan_fungsional') ?></td>
                <td><input type="text" class="form-control" name="jabatan_fungsional" id="jabatan_fungsional" placeholder="Jabatan Fungsional" value="<?php echo $jabatan_fungsional; ?>" />
            </td> -->
    	    <tr><td>Tamat Sbguru <?php echo form_error('tamat_sbguru') ?></td>
                <td><input type="date" class="form-control" name="tamat_sbguru" id="tamat_sbguru" placeholder="Tamat Sbguru" value="<?php echo $tamat_sbguru; ?>" />
            </td>
    	    <tr><td>Tgl Awalkerja <?php echo form_error('tgl_awalkerja') ?></td>
                <td><input type="date" class="form-control" name="tgl_awalkerja" id="tgl_awalkerja" placeholder="Tgl Awalkerja" value="<?php echo $tgl_awalkerja; ?>" />
            </td>

             <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin" class="form-control" placeholder="Pilih" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
	    <tr><td>Pendidikan Terakhir <?php echo form_error('pendidikan_terakhir') ?></td>
            <td><input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" value="<?php echo $pendidikan_terakhir; ?>" />
        </td>

        <tr><td>Spesialisasi <?php echo form_error('spesialisasi') ?></td>
            <td><input type="text" class="form-control" name="spesialisasi" id="spesialisasi" placeholder="Spesialisasi" value="<?php echo $spesialisasi; ?>" />
        </td>

	    <tr><td>Program Keahlian <?php echo form_error('program_keahlian') ?></td>
            <td><input type="text" class="form-control" name="program_keahlian" id="program_keahlian" placeholder="Program Keahlian" value="<?php echo $program_keahlian; ?>" />
        </td>
         <tr><td>Jumlah Jam Ajar <?php echo form_error('jam_ajar') ?></td>
            <td><input type="text" class="form-control" name="jam_ajar" id="jam_ajar" placeholder="Jumlah Jam Ajar" value="<?php echo $jam_ajar; ?>" />
        </td>
        <tr><td>Password <?php echo form_error('password') ?></td>
            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </td>
	    
      <!--   <tr>
            <td>Status</td>
            <td> -->
                <!-- <select name="status" class="form-control" placeholder="Pilih" required> -->
                 <!-- <option value="guru">Guru</option> -->
                 <!-- <option value="kepsek">Kepala Sekolah</option> -->
                <!-- <option value="penilai">Penilai</option> -->
                 <!-- </select> -->
            <!-- </td> -->
        <!-- </tr> -->

	   
	    	    
	    <!-- <tr><td>Masa Kerja <?php echo form_error('masa_kerja') ?></td>
            <td><input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $masa_kerja; ?>" />
        </td> -->

	    <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kepsek') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>