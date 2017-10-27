<!-- Main content -->
<div class="container-fluid">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                   <h3 class='box-title'>KOMPETENSI</h3>
                      <div class='box box-primary'>
                     
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>

            <tr>
                <td>Kode Kompetensi <?php echo form_error('kode_kompetensi') ?></td>
          
                    <td>
                    <input type="text" class="form-control" name="kode_kompetensi" id="kode_kompetensi"  value="<?php echo $kode_kompetensi; ?>" readonly /> 
                </td>
            </tr>

	       
            <td>Kompetensi <?php echo form_error('nama_kompetensi') ?></td>
            <td>
                <input type="text" class="form-control" name="nama_kompetensi" id="nama_kompetensi" placeholder="Kompetensi" value="<?php echo $nama_kompetensi; ?>" /> 
            </td>

            <tr>
                <td>Jenis Kompetensi</td>
                <td>
                    <select name="jenis_kompetensi" class="form-control" placeholder="Pilih" required>
                            <option value="pedagogik">Pedagogik</option>
                            <option value="kepribadian">Kepribadian</option>
                            <option value="sosial">Sosial</option>
                            <option value="profesional">Profesional</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Cara Menilai</td>
                <td>
                    <select name="cara_menilai" class="form-control" placeholder="Pilih" required>
                            <option value="pemantauan">Pemantauan</option>
                            <option value="pengamatan">Pengamatan</option>
                            <option value="pemantauandanpengamatan">Pemantauan & Pengamatan</option>
                            <!-- <option value="profesional">Profesional</option> -->
                    </select>
                </td>
            </tr>

	        
    	   
             <!-- <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin" class="form-control" placeholder="Pilih" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr> -->
	     	    
	    
	    <input type="hidden" name="id_kompetensi" value="<?php echo $id_kompetensi; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kompetensi') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>