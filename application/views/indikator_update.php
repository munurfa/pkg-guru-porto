<!-- Main content -->


<div class="container-fluid">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                   <h3 class='box-title'>INDIKATOR update</h3>
                      <div class='box box-primary'>
                      <!-- <?php echo form_open('kepsek/create'); ?> -->
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>

        <tr>
                <td>Kode Indikator <?php echo form_error('kode_indikator') ?></td>
               
            

                  <td>
                    
                    
                         <input type="text" class="form-control" name="kode_indikator" id="kode_indikator"  value="<?php echo $kode_indikator; ?>" readonly /> 
                  </td>
                    
                
            </tr>
       
	       
            <td>Indikator <?php echo form_error('nama_indikator') ?></td>
            <td>
                <input type="text" class="form-control" name="nama_indikator" id="nama_indikator" placeholder="indikator" value="<?php echo $nama_indikator; ?>" /> 
            </td>
    	    
	    
	    <input type="hidden" name="kode_kompetensi" value="<?php echo $kode_kompetensi ?>"/> 



	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kompetensi/read/'. $kode_kompetensi ) ?>" class="btn btn-default">Cancel</a></td></tr>
      <!-- 'kompetensi/read/'. $kode_kompetensi -->
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>