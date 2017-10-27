Main content -->
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
                            <tr>
                                <td>Golongan</td>
                                
                                <td><?php echo $guru->golongan; ?></td>
                            </tr>
                            <tr>
                                <td>Jam Ajar</td>
                                
                                <td><?php echo $guru->jam_ajar; ?></td>
                            </tr>
                        </table>
                        
                
                            </table>
                            <tr>
                            </div>
                            <a href="<?php echo site_url('datarekap/identitas_pdf/'.$nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$tgl_penilaian) ?>" class="btn btn-danger btn-lg"  target="_blank">Cetak Identitas</a>
                            <a href="<?php echo site_url('datarekap/laporan_pdf/'.$nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$tgl_penilaian) ?>" class="btn btn-danger btn-lg"  target="_blank">Cetak Nilai</a>
                            <a href="<?php echo site_url('datarekap/laporan_rekap_pdf/'.$nip_pegawai.'/'.$nip_penilai.'/'.$tahun_penilaian.'/'.$tgl_penilaian) ?>" class="btn btn-danger btn-lg"  target="_blank">Cetak Rekap</a>
                             <a href="<?php echo site_url('datarekap') ?>" class="btn btn-danger btn-lg">Pilih Guru</a>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Rekap Nilai</th>
                                        </tr>
                                        <tr valign="center">
                                            <th  style="text-align: top" rowspan="2" width="80px" valign="top">No</th>
                                            <th  style="text-align: center" rowspan="2">Kompetensi</th>
                                            <th  style="text-align: center" >
                                                Skor
                                            </th>
                                        </tr>
                                        
                                    </thead>
                                    

                                    <tbody>
                                        <?php
                                        $start = 0;
                                        
                                        foreach ($nilaikom->result() as $indikator)
                                        {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo ++$start ?></td>
                                            <!-- <td><?php echo $indikator->nama_indikator ?></td> -->
                                            <td><?php echo $indikator->nama_kompetensi ?></td>
                                            
                                            <td align="right"><?php 
                                            echo ($indikator->nilai_kompetensi==NULL) ? "0" : $indikator->nilai_kompetensi ?></td>
                                        </tr>
                                       
                                        <?php
                                        }
                                        ?>

                                        <tr>
                                        <th colspan="2">Nilai PKG / Mata Pelajaran</th>
                                        <th colspan="3">
                                        <?php 
                                            echo ($totalnilaikom->total>0) ? $totalnilaikom->total : "Belum Ada Data" ;;
                                        ?>
                                            
                                        </th>    
                                       
                                        </tr>

                                           <tr>
                                        <th colspan="2">NILAI PKG(100)=(NILAI PKG/NILAI PKG TERTINGGI) x 100</th>
                                        <th colspan="3"> <?php 
                                        if($totalnilaikom->total>0){
                                           $pkg = $totalnilaikom->total;
                                            $pkgmax = $nilaikom->num_rows()*4;
                                            $pkg100 = ($pkg/$pkgmax)*100;
                                            echo round($pkg100,2); 
                                        }else{
                                            echo "Belum Ada Data";
                                        }
                                            

                                        ?> 

                                        </th>    
                                       
                                        </tr>

                                           <tr>
                                        <th colspan="2">Sebutan</th>
                                        <th colspan="3"><?php 
                                        $this->load->helper('golongan_helper');
                                        if($totalnilaikom->total>0){
                                            $konversi = konversi(floatval($pkg100));
                                            echo $konversi['sebut'];
                                        }else{
                                            echo "Belum Ada Data";
                                        }
                                        ?></th>    
                                       
                                        </tr>


                                        <tr>
                                        <th colspan="2">Nilai Prensentase</th>
                                        <th colspan="3"><?php 
                                        if($totalnilaikom->total>0){
                                            echo $konversi['presen']."%";
                                        }else{
                                            echo "Belum Ada Data";
                                        }?>
                                        </th>    
                                       
                                        </tr>

                                        <tr>
                                        <?php 
                                        if($totalnilaikom->total>0){
                                            $gol = golongan($guru->golongan);
                                            $golke = golongan($gol['golke']);
                                            $akk = floatval($gol['akk']);
                                            $akpkb = floatval($gol['akpkb']);
                                            $akp = floatval($golke['akp']);
                                            $npk = floatval($konversi['presen'])/100;
                                            $jam_ajar = intval($guru->jam_ajar);
                                            if ($jam_ajar>= 24) {
                                                $jm = 1;
                                            }else if($jam_ajar<24){
                                                $jm = $jam_ajar;
                                            }
                                            $jwm = 24;
                                            $ak = (($akk-$akpkb-$akp)*$jm*$npk)/4;
                                        }else{
                                            $ak = 0;
                                        }
                                         ?>
                                        <th colspan="2">Angka Kredit Satu Tahun 
                                        </th>
                                        <th colspan="3"><?php echo round($ak,2);?></th>    
                                       
                                        </tr>
                                        


                                    </tbody>
                                </table>
                                </div><!-- /.box-body -->
                                <!-- /.box-body -->
                                </div><!-- /.box -->
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                                </section><!-- /.content