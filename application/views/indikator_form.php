<!-- Main content -->


<div class="container-fluid">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                   <h3 class='box-title'>INDIKATOR</h3>
                      <div class='box box-primary'>
                      <!-- <?php echo form_open('kepsek/create'); ?> -->
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'> 

        <tr>
                <td>Kode Indikator <?php echo form_error('kode_indikator') ?></td>
                <td>
              <?php 



                    foreach (range(1, 14) as $i) {
                        $indi[$this->uri->segment(3).'indi'.$i] = 'indikator '.$i;


                    }
                        // $ubah = ($this->uri->segment(2)=="update") ? ['readonly'] : '' ;
                        $pilih = ($this->input->post('kode_indikator')) ? $this->input->post('kode_indikator') : $kode_indikator ;

                       echo form_dropdown('kode_indikator', $indi, $pilih, array('class' => 'form-control' ));
                    ?>
                    
                </td>
            </tr>

           <!--  <tr>

           
                <td>Kode Indikator <?php echo form_error('kode_indikator') ?></td>
                <td>
                    <select name="kode_indikator" class="form-control" placeholder="Pilih" required>
                            <option value="indi01">Indikator 1</option>
                            <option value="indi02">Indikator 2</option>
                            <option value="indi03">Indikator 3</option>
                            <option value="indi04">Indikator 4</option>
                            <option value="indi05">Indikator 5</option>
                            <option value="indi06">Indikator 6</option>
                            <option value="indi07">Indikator 7</option>
                            <option value="indi08">Indikator 8</option>
                            <option value="indi09">Indikator 9</option>
                            <option value="indi10">Indikator 10</option>
                            
                            
                            
                    </select>
                </td>
            </tr> -->

           
	       
            <td>Indikator <?php echo form_error('nama_indikator') ?></td>
            <td>
                <input type="text" class="form-control" name="nama_indikator" id="nama_indikator" placeholder="indikator" value="<?php echo $nama_indikator; ?>" /> 
            </td>
    	    
	    
	    <input type="hidden" name="kode_kompetensi" value="<?php echo $this->uri->segment(3) ?>"/> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kompetensi/read/') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


</div>