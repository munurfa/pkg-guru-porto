<?php
function MasaKerja($tgl_masuk,$tahun_sekarang,$bulan_sekarang,$tanggal_sekarang){
if($tgl_masuk=='0000-00-00'){
	return 0;
}else{
	$date1 = $tgl_masuk;
	$date2 = $tahun_sekarang.'-'.$bulan_sekarang.'-'.$tanggal_sekarang;
 
	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);
 
	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);
 
	$month1 = date('m', $ts1);
	$month2 = date('m', $ts2);
 
	$day1 = date('d', $ts1);
	$day2 = date('d', $ts2);
 
	$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
 
	$tahun=round($diff/12);
	if(!is_integer($diff/12)){
		$tahun=$tahun-1;
	}
	if($tahun < 10){
		$tahun='0'.$tahun;
	}
	$sisabulan=$diff % 12;
 
	if($sisabulan < 10){
		$sisabulan='0'.$sisabulan;
	}
	$data['jumlah_bulan']=$diff;
	
 
	$d1 = new DateTime($date1);
	$d2 = new DateTime($date2);
 
	$diff = $d2->diff($d1);
 
	$data['masa_kerja']=$diff->y.' tahun '.$sisabulan. ' bulan';
	return $data;
	}
}
?>