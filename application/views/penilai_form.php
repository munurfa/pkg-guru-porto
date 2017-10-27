<!-- Main content -->
<div class="container-fluid">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PENILAI</h3>
                      <div class='box box-primary'>
                      <!-- <?php echo form_open('kepsek/create'); ?> -->
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>
	       <tr>
            <td>Nip Penilai <?php echo form_error('nip_penilai') ?></td>
            <td>
                <input type="text" class="form-control" name="nip_penilai" id="nip_penilai" placeholder="Nip Pegawai" value="<?php echo $nip_penilai; ?>" /> 
            </td>
	       <tr>
            <td>Nama Pegawai <?php echo form_error('nama') ?></td>
            <td>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Penilai" value="<?php echo $nama; ?>" /> 
            </td>
            <tr>
            <td>Pangkat <?php echo form_error('pangkat') ?></td>
            <td>
                <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Pangkat Penilai" value="<?php echo $pangkat; ?>" /> 
            </td>
            <tr>
            <td>Golongan <?php echo form_error('golongan') ?></td>
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
            </td>
        <tr>
            <td>Status</td>
            <td>
                <?php 
                    $options = array(
                            'kepsek' => 'Kepala Sekolah',
                            'dinas' => 'Luar Sekolah (Dinas)',
                    );

                    echo form_dropdown('status', $options, $status,array('class' => 'form-control' ));

                 ?>
            </td>
        </tr>
        <tr><td>Keterangan (opsional)<?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan (opsional)" value="<?php echo $keterangan; ?>" />
        </td>
	   
	    	    
	    <!-- <tr><td>Masa Kerja <?php echo form_error('masa_kerja') ?></td>
            <td><input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $masa_kerja; ?>" />
        </td> -->

	    <input type="hidden" name="id_penilai" value="<?php echo $id_penilai; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kepsek') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>