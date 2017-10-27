<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;page-break-after:always'>
 <tr style='height:32.0pt'>
  <td width=478 nowrap colspan=4 style='width:358.4pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:32.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>LEMBAR PERNYATAAN KOMPETENSI, INDIKATOR, DAN CARA MENILAI</b></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>PK GURU KELAS/MATA PELAJARAN</b></p>
  </td>
 </tr>
 <tr style='height:15.75pt'>
  <td width=113 nowrap style='width:3.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.75pt'></td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=364 colspan=3><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr style='height:16.5pt'>
  <td width=369 nowrap colspan=2 valign=top style='width:276.45pt;border:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>KOMPETENSI</b></p>
  </td>
  <td width=106 nowrap valign=top style='width:79.45pt;border:solid black 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>CARA MENILAI</b></p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=3><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <?php foreach ($kompetensi->result() as $k ): ?>
   
 <tr style='height:30.0pt'>
  <td width=113 nowrap valign=top style='width:3.0cm;border:solid black 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:30.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Kompetensi <?php echo substr($k->kode_kompetensi, 2) ?>:</b></p>
  </td>
  <td width=255 valign=top style='width:191.4pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><?php echo $k->nama_kompetensi ?></p>
  </td>
  <td width=106 valign=top style='width:79.45pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><?php echo $k->cara_menilai ?></p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=3><p class='MsoNormal'>&nbsp;</td>
 </tr>

<?php endforeach ?>

 <tr style='height:15.0pt'>
  <td width=113 nowrap valign=top style='width:2.0cm;border:none;padding:0cm 0pt 0cm 0pt;
  height:15.0pt'></td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=364 colspan=3><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=113 nowrap style='width:3.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Keterangan:</b></p>
  </td>
  <td width=255 nowrap valign=top style='width:191.4pt;border:none;padding:
  0cm 5.4pt 0cm 5.4pt;height:15.0pt'></td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=106 colspan=2><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=113 nowrap valign=top style='width:3.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Pengamatan    :</b></p>
  </td>
  <td width=293 colspan=2 style='width:219.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>adalah kegiatan untuk menilai kinerja guru melalui diskusi sebelum
  pengamatan, pengamatan selama pelaksanaan proses pembelajaran, dan diskusi
  setelah pengamatan.   </p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=68><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr style='height:15.0pt'>
  <td width=113 nowrap valign=top style='width:3.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'></td>
  <td width=255 style='width:191.4pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:15.0pt'></td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=106 colspan=2><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr style='height:30.0pt'>
  <td width=113 nowrap valign=top style='width:3.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:30.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b>Pemantauan    :</b></p>
  </td>
  <td width=293 colspan=2 style='width:219.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:30.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>adalah kegiatan untuk menilai kinerja guru melalui pemeriksaan dokumen,
  wawancara dengan guru yang dinilai, dan/atau wawancara dengan warga sekolah.</p>
  </td>
  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=68><p class='MsoNormal'>&nbsp;</td>
 </tr>
 <tr height=0>
  <td width=113 style='border:none'></td>
  <td width=255 style='border:none'></td>
  <td width=38 style='border:none'></td>
  <td width=68 style='border:none'></td>
 </tr>
</table>
</table>

