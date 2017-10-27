<?php foreach ($kompetensi->result() as $k): ?>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=483
 style='width:362.6pt;border-collapse:collapse;border:none;page-break-after:always'>
 <tr style='height:15.75pt'>
  <td width=103 nowrap colspan=2 valign=top style='width:77.6pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Nama Guru</b></p>
  </td>
  <td width=18 nowrap valign=top style='width:13.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=143 nowrap colspan=2 valign=top style='width:107.1pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><?php echo $guru->nama_pegawai ?></b></p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=219 colspan=4><p class='MsoNormal'>&nbsp;</td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr style='height:15.75pt'>
  <td width=103 nowrap colspan=2 valign=top style='width:77.6pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Nama Penilai</b></p>
  </td>
  <td width=18 nowrap valign=top style='width:13.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=143 nowrap colspan=2 valign=top style='width:107.1pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><?php echo $penilai->nama ?></b></p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=219 colspan=4><p class='MsoNormal'>&nbsp;</td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=28 nowrap valign=top style='width:20.9pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'></td>
  <td width=132 colspan=3 valign=top style='width:99.25pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  </td>
  <td width=132 colspan=2 valign=top style='width:99.25pt;border:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
  </td>
  <td style='border:none;border-bottom:solid windowtext 1.0pt' width=191
  colspan=3><p class='MsoNormal'>&nbsp;</td>
  <td style='height:15.0pt;border:none' width=0 height=20></td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=483 colspan=9 valign=top style='width:362.6pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Kompetensi <?php echo substr($k->kode_kompetensi,2) ?>: <?php echo $k->nama_kompetensi ?></b></p>
  </td>
  <td style='height:15.0pt;border:none' width=0 height=20></td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=265 colspan=5 rowspan=3 valign=top style='width:7.0cm;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:10.0pt'>Indikator</span></b></p>
  </td>
  <td width=219 nowrap colspan=4 valign=top style='width:164.15pt;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:10.0pt'>skor</span></b></p>
  </td>
  <td style='height:15.0pt;border:none' width=0 height=20></td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=95 colspan=2 rowspan=2 valign=top style='width:70.9pt;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:8.0pt'>tidak ada bukti</span></b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:8.0pt'>(Tidak terpenuhi)</span></b></p>
  </td>
  <td width=60 rowspan=2 valign=top style='width:44.85pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:8.0pt'>Terpenuhi sebagian</span></b></p>
  </td>
  <td width=65 rowspan=2 valign=top style='width:48.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:8.0pt'>Seluruhnya terpenuhi</span></b></p>
  </td>
  <td style='height:15.0pt;border:none' width=0 height=20></td>
 </tr>
 <tr style='height:4.7pt'>
  <td style='height:4.7pt;border:none' width=0 height=6></td>
 </tr>
 <?php 
$nilaiindi = 
 $this->Data_rekap_model->nilai_indikator($guru->nip_pegawai,$penilai->nip_penilai,$periode,$k->kode_kompetensi,$tanggal);
 $nilaikom = 
 $this->Data_rekap_model->nilaikomakhir($guru->nip_pegawai, $penilai->nip_penilai, $periode,$k->kode_kompetensi,$tanggal);
 $no=1;

  ?>
<?php foreach ($nilaiindi->result() as $nk): ?>
  

 <tr style='height:15.75pt'>
  <td width=28 nowrap valign=top style='width:20.9pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><?php echo $no++ ?></p>
  </td>
  <td width=237  colspan=4 valign=top style='width:177.55pt;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><?php echo $nk->nama_indikator ?></p>
  </td>
  <td width=95 nowrap colspan=2 valign=top style='width:70.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align: right;line-height:
  normal'><?php echo ($nk->skor==0) ? $nk->skor : ""  ?></p>
  </td>
  <td width=60 valign=top style='width:44.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align: right;line-height:
  normal'><?php echo ($nk->skor==1) ? $nk->skor : ""  ?></p>
  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align: right;line-height:
  normal'><?php echo ($nk->skor==2) ? $nk->skor : ""  ?></p>
  </td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>

<?php endforeach ?>
<tr style='height:15.75pt'>
  <td width=265 nowrap colspan=5 valign=top style='width:7.0cm;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Total skor untuk kompetensi <?php echo substr($k->kode_kompetensi,2) ?></p>
  </td>
  <td width=219 nowrap colspan=4 style='width:164.15pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'>
  <?php 
      echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->total_skor ;
      ?>
                                          
  </p>
  </td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr style='height:15.75pt'>
  <td width=265 nowrap colspan=5 valign=top style='width:7.0cm;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Skor maksimum kompetensi <?php echo substr($k->kode_kompetensi,2) ?> = jumlah indiktor x 2</p>
  </td>
  <td width=219 nowrap colspan=4 style='width:164.15pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'>
    <?php 
      echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->skormax; 
    ?>
  </p>
  </td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr style='height:15.75pt'>
  <td width=265 nowrap colspan=5 valign=top style='width:7.0cm;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Persentase = (total skor/12) x 100%</p>
  </td>
  <td width=219 nowrap colspan=4 style='width:164.15pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'>
  <?php echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->presentase; ?>%
  </p>
  </td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr style='height:15.75pt'>
  <td width=265 nowrap colspan=5 valign=top style='width:7.0cm;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Nilai untuk kompetensi <?php echo substr($k->kode_kompetensi,2) ?></p>
  </td>
  <td width=219 nowrap colspan=4 style='width:164.15pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'>
    <?php echo ($nilaikom->num_rows()==0) ? "0" : $nilaikom->row()->nilai_kompetensi; ?>
  </p>
  </td>
  <td style='height:15.75pt;border:none' width=0 height=21></td>
 </tr>
 <tr height=0>
  <td width=28 style='border:none'></td>
  <td width=76 style='border:none'></td>
  <td width=18 style='border:none'></td>
  <td width=38 style='border:none'></td>
  <td width=104 style='border:none'></td>
  <td width=28 style='border:none'></td>
  <td width=67 style='border:none'></td>
  <td width=60 style='border:none'></td>
  <td width=65 style='border:none'></td>
  <td style='border:none' width=0><p class='MsoNormal'>&nbsp;</td>
 </tr>
</table>
<?php endforeach ?>

