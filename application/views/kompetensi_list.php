
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12   ">
                        <h2 class="page-header">
                            SINPKG (Sistem Informasi Penilaian Kinerja Guru) <small>Data Kompetensi Dan Indikator</small>
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
                                 echo anchor('kompetensi/create','Tambah Kompetensi',array('title'=>'tambah kompetensi','class'=>'btn btn-danger btn-sm')); 
                               
                                    }
                                 // echo anchor('kompetensi/create','Tambah Kompetensi',array('class'=>'btn btn-danger btn-sm')) 


                                 ?>
                                                      
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                            <tr>
                                        <th width="80px">No</th>
                                        <th>KODE KOMPETENSI</th>
                                        <th>KOMPETENSI</th>
                                        <!-- <th>JENIS KOMPETENSI</th> -->
                                        <!-- <th>CARA MENILAI</th> -->
                                                                               
                                        <th>AKSI</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($kompetensi_data as $kompetensi)
                                        {
                                            ?>
                                            <tr>
                                        <td><?php echo ++$start ?></td>
                                        <td><?php echo $kompetensi->kode_kompetensi ?></td>
                                        <td><?php echo $kompetensi->nama_kompetensi ?></td>
                                         
                                        <td style="text-align:center" width="140px">
                                        <?php

                                         if(($this->session->userdata('status')=='guru') or ($this->session->userdata('status')=='kepsek') ){
                                            echo anchor(site_url('kompetensi/read/'.$kompetensi->kode_kompetensi),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm'));  
                                             }

                                        if ($this->session->userdata('status')=='admin') {
                                            echo anchor(site_url('kompetensi/read/'.$kompetensi->kode_kompetensi),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm'));  

                                            echo anchor(site_url('kompetensi/update/'.$kompetensi->kode_kompetensi),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 

                                             echo anchor(site_url('kompetensi/delete/'.$kompetensi->kode_kompetensi),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            }


                                        // echo anchor(site_url('kompetensi/read/'.$kompetensi->kode_kompetensi),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                                        // echo '  '; 
                                        // echo anchor(site_url('kompetensi/update/'.$kompetensi->kode_kompetensi),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                                        // echo '  '; 
                                        // echo anchor(site_url('kompetensi/delete/'.$kompetensi->kode_kompetensi),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 






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