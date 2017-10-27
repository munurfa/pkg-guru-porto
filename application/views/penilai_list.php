
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) <small>Data Penilai</small>
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
                                 echo anchor('penilai/create','Tambah',array('title'=>'tambah','class'=>'btn btn-danger btn-sm')); 

                                    }

                                 // echo anchor('penilai/create','Tambah Data',array('class'=>'btn btn-danger btn-sm')) 



                                 ?>


                                 <!-- P -->
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                            <tr>
                                        <th width="80px">No</th>
                                        <th>NIP</th>
                                        <th>NAMA PENILAI</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                      
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
                                        <td><?php echo $pegawai->nip_penilai ?></td>
                                        <td><?php echo $pegawai->nama ?></td>

                                        
                                         <td><?php echo $pegawai->status ?></td>
                                          <td><?php echo $pegawai->keterangan ?></td>
                                       
                                        <td style="text-align:center" width="140px">
                                        <?php 
                                            if(($this->session->userdata('status')=='guru') or ($this->session->userdata('status')=='kepsek') ){
                                            echo anchor(site_url('penilai/read/'.$pegawai->id_penilai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                                             }

                                            if ($this->session->userdata('status')=='admin') {
                                            echo anchor(site_url('penilai/read/'.$pegawai->id_penilai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 

                                            echo anchor(site_url('penilai/update/'.$pegawai->id_penilai),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm'));

                                             echo anchor(site_url('penilai/delete/'.$pegawai->id_penilai),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            }




                                        // echo anchor(site_url('penilai/read/'.$pegawai->id_penilai),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                                        // echo '  '; 
                                        // echo anchor(site_url('penilai/update/'.$pegawai->id_penilai),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                                        // echo '  '; 
                                        // echo anchor(site_url('penilai/delete/'.$pegawai->id_penilai),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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