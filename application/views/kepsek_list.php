
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) <small>Data Kepala Sekolah</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                                 <?php 

                                if ($this->session->userdata('status')=='admin') {
                                 echo anchor('kepsek/create','Tambah',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                               
                                    }

                                 ?>
                                 
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                            <tr>
                                        <th width="80px">No</th>
                                        <th>NIP</th>
                                        <th>NAMA KEPALA SEKOLAH</th>
                                        
                                        <th>ACTION</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($pegawai_data as $pegawai)
                                        {
                                            ?>
                                            <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td><?php echo $pegawai->nip_pegawai ?></td>
                                        <td><?php echo $pegawai->nama_pegawai ?></td>
                                        
                                        <td style="text-align:center" width="140px">
                                        <?php 
                                            if(($this->session->userdata('status')=='guru') or ($this->session->userdata('status')=='kepsek') ){
                                            echo anchor(site_url('kepsek/read/'.$pegawai->id_pegawai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                                             }

                                         if ($this->session->userdata('status')=='admin') {
                                            echo anchor(site_url('kepsek/read/'.$pegawai->id_pegawai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 

                                            echo anchor(site_url('kepsek/update/'.$pegawai->id_pegawai),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                                            }
                                        
                                      
                                         
                                        ?>
                                        </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>



                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
</div>