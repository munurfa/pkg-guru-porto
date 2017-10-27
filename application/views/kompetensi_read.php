
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Data Lengkap Kompetensi dan Indikator</h3>
                </div>
                <div>
        <table class="table table-bordered">


	    <tr><td>Kode Kompentensi</td><td><?php echo $kode_kompetensi; ?></td></tr>
	    <tr><td>Kompetensi</td><td><?php echo $nama_kompetensi; ?></td></tr>
	    <tr><td>Jenis Kompetensi</td><td><?php echo $jenis_kompetensi; ?></td></tr>
	    <tr><td>Cara Menilai</td><td><?php echo $cara_menilai; ?></td></tr>
      <!-- <tr><td>Indikator</td><td><?php echo $indikator; ?></td></tr> -->
      
	    
	    <!-- <tr><td></td><td><a href="<?php echo site_url('kompetensi') ?>" class="btn btn-default">Kembali</a></td></tr> -->
	</table>
 
    <!-- <div class="panel-body"> -->
    <div class="panel-heading">
      <?php 
      if ($this->session->userdata('status')=='admin') 
      {
      echo anchor('indikator/create/'.$kode_kompetensi,'Tambah Indikator',array('class'=>'btn btn-danger btn-sm')) ;
        }


      ?>  
    </div>
    
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                            <tr>
                                        <th width="80px">No</th>
                                        <th>kode indikator</th>
                                        <th>indikator</th>
                                                                           
                                        <th>ACTION</th>
                                       
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($indikator as $indikator)
                                        {
                                            ?>
                                            <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td><?php echo $indikator->kode_indikator ?></td>
                                        <td><?php echo $indikator->nama_indikator ?></td>
                                        
                                        <td style="text-align:center" width="140px">
                                        
                                        <?php 
                                       if ($this->session->userdata('status')=='admin') {
                                        echo anchor(site_url('indikator/update/'.$indikator->kode_indikator),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                                        echo '  '; 
                                        echo anchor(site_url('indikator/delete/'.$indikator->kode_indikator),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    }
                                        ?>
                                        </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->