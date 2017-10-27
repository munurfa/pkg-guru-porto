<!-- Main content --> 
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Form Penilaian Penilaian Kinerja Guru</h3>
                </div>
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable">
                            <tr>
                                <td>NIP Guru</td>
                                <td><?php echo $nip_pegawai; ?></td>
                            </tr>
                            <tr>
                                <td>Nip Penilai</td>
                                <td><?php echo $nip_penilai; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Penilaian</td>
                                
                                <td><?php echo $tahun_penilaian; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Penilaian</td>
                                
                                <td><?php echo $tgl_penilaian; ?></td>
                            </tr>
                        </table>
                    </div>
                        
                       
                           
                                <?php foreach (range(1,14) as $k): ?>
                                <?php $btn = ($k==substr($this->uri->segment(6),2)) ? "btn-default" : "btn-danger" ; ?>
                                <?php 
                                    echo anchor('data_penilaian/mulai/'. $nip_pegawai.'/' .$nip_penilai. '/'.$tahun_penilaian. '/km'.$k.'/'.$tgl_penilaian,'Kompetensi '.$k,array('class'=>'btn '.$btn.' btn-xs','style'=>'margin:2px'))
                                ?>
                                <?php endforeach ?>
                        
                      
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th colspan="5">
                                            <?php
                                            echo 'Kompetensi '.substr($kompetensi->kode_kompetensi, 2).' : '. $kompetensi->nama_kompetensi; ?>
                                                
                                            </th>
                                        </tr>
                                        <tr valign="center">
                                            <th  style="text-align: top" rowspan="2" width="80px" valign="top">No</th>
                                            <th  style="text-align: center" rowspan="2">indikator</th>
                                            <th  style="text-align: center" colspan="3">
                                                Skor
                                            </th>
                                        </tr>
                                        <tr>
                                            
                                            <th class="text-center">0</th>
                                            <th class="text-center">1</th>
                                            <th class="text-center">2</th>
                                        </tr>
                                    </thead>
                                    <?php 
                        $action = ($nilaikom->num_rows()==0)  ? 'proses_kom' : 'proses_kom_update' ;
                        echo form_open(site_url('data_penilaian/'.$action.'/'.$this->uri->segment(6))); 
                                   
                        echo form_hidden('nip_pegawai', $nip_pegawai);
                        echo form_hidden('nip_penilai', $nip_penilai);
                        echo form_hidden('tahun_penilaian', $tahun_penilaian); 
                        echo form_hidden('count', $count);
                        echo form_hidden('tgl_penilaian', $this->uri->segment(7));

                                    ?>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        
                                        foreach ($nilai as $indikator):?>
                                        
                                    
                                        <?php echo form_hidden('kode_indikator[]', $indikator->indikator_kode); ?>
                                        <tr>
                                            <td><?php echo ++$start ?></td>
                                            <!-- <td><?php echo $indikator->nama_indikator ?></td> -->
                                            <td><?php echo $indikator->nama_indikator ?></td>
                                            <?php if ($this->session->status=="admin"): ?>
                                                <td><?php echo form_radio($indikator->indikator_kode,0,
                                                ($indikator->skor==0) ? TRUE : FALSE ); ?></td>
                                                <td><?php echo form_radio($indikator->indikator_kode,1,
                                                ($indikator->skor==1) ? TRUE : FALSE ); ?></td>
                                                <td><?php echo form_radio($indikator->indikator_kode,2,
                                                ($indikator->skor==2) ? TRUE : FALSE ); ?></td>
                                            <?php else: ?>
                                                
                                                <td><?php echo form_radio($indikator->indikator_kode,0,
                                                ($indikator->skor==0) ? TRUE : FALSE,["disabled"=>"true"]); ?></td>
                                                <td><?php echo form_radio($indikator->indikator_kode,1,
                                                ($indikator->skor==1) ? TRUE : FALSE,["disabled"=>"true"]); ?></td>
                                                <td><?php echo form_radio($indikator->indikator_kode,2,
                                                ($indikator->skor==2) ? TRUE : FALSE,["disabled"=>"true"]); ?></td>
                                                
                                            <?php endif ?>
                                            


                                        </tr>
                                       
                                       <?php endforeach ?>

                                        <tr>
                                        <th colspan="2">Total Skor <?php
                                            echo 'Kompetensi '.substr($kompetensi->kode_kompetensi, 2) ?>  </th>
                                        <th colspan="3">
                                        <?php 
                                        echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->total_skor ;
                                        ?>
                                            
                                        </th>    
                                       
                                        </tr>

                                           

                                           <tr>
                                        <th colspan="2">Skor maksimum kompetensi 2 = jumlah indiktor x 2  </th>
                                        <th colspan="3">   <?php 
                                        echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->skormax; ?>  </th>    
                                       
                                        </tr>

                                           <tr>
                                        <th colspan="2">Persentase = (total skor/12) x 100% </th>
                                        <th colspan="3">  <?php echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->presentase; ?>%</th>    
                                       
                                        </tr>


                                        <tr>
                                        <th colspan="2">Nilai untuk <?php
                                            echo $kompetensi->kode_kompetensi; ?>  (0% < X ≤ 25% = 1; 25% < X ≤ 50% = 2; 50% < X ≤ 75% = 3; 75% < X ≤ 100% = 4)</th>
                                        <th colspan="3"><?php echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->nilai_kompetensi; ?></th>    
                                       
                                        </tr>
                                        <tr>
                                        <th>
                                        <?php if ($this->session->status=="admin"): ?>
                                            <button type="submit" class="btn btn-default" > <?php 
                                        echo ($nilaikom->num_rows()==0) ? "Simpan" : "Update";
                                        ?></button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-default" disabled="false"> <?php 
                                        echo ($nilaikom->num_rows()==0) ? "Simpan" : "Update";
                                        ?></button>
                                        <?php endif ?>
                                              
                                             
                                              </th>
                                              <th>
                                               <a href="<?php echo site_url('data_penilaian') ?>" class="btn btn-default">Cancel</a>
                                             </th>
                                        </tr>
                                        


                                    </tbody>
                                    <?php echo form_close(); ?>
                                </table>
                                </div><!-- /.box-body -->
                                <!-- /.box-body -->
                                </div><!-- /.box -->
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                                </section><!-- /.content