<?php 

	function golongan($golongan)
	{
        
		if ($golongan=='III.a') {
    		$pangkat = 'Penata Muda';
    		$jabatan = 'Guru Pertama';
    		$akk = 50;
            $akpkb = 3;
            $akp = 5;
            $golke = 'III.b';
    	}else if ($golongan=='III.b') {
    		$pangkat = 'Penata Muda Tingkat I';
    		$jabatan = 'Guru Pertama';
    		$akk = 50;
            $akpkb = 7;
            $akp = 5;
            $golke = 'III.c';
    	}else if ($golongan=='III.c') {
    		$pangkat = 'Penata';
    		$jabatan = 'Guru Muda';
    		$akk = 100;
            $akpkb = 9;
            $akp = 10;
            $golke = 'III.d';
    	}else if ($golongan=='III.d') {
    		$pangkat = 'Penata Tingkat 1';
    		$jabatan = 'Guru Muda';
    		$akk = 100;
            $akpkb = 12;
            $akp = 10;
            $golke = 'IV.a';
    	}else if ($golongan=='IV.a') {
    		$pangkat = 'Pembina';
    		$jabatan = 'Guru Madya';
    		$akk = 150;
            $akpkb = 16;
            $akp = 15;
            $golke = 'IV.b';
    	}else if ($golongan=='IV.b') {
    		$pangkat = 'Pembina Tingkat 1';
    		$jabatan = 'Guru Madya';
    		$akk = 150;
            $akpkb = 16;
            $akp = 15;
            $golke = 'IV.c';
    	}else if ($golongan=='IV.c') {
    		$pangkat = 'Pembina Utama Muda 1';
    		$jabatan = 'Guru Madya';
    		$akk = 150;
            $akpkb = 19 ;
            $akp = 15;
            $golke = 'IV.d';
    	}else if ($golongan=='IV.d') {
    		$pangkat = 'Pembina Utama Madya';
    		$jabatan = 'Guru Utama';
    		$akk = 200;
            $akpkb = 25;
            $akp = 20;
            $golke = 'IV.e';
    	}else if ($golongan=='IV.e') {
    		$pangkat = 'Pembina Utama';
    		$jabatan = 'Guru Utama';
            $akk = 200;
            $akpkb = 0 ;
            $akp = 0;
            $golke = '';
    	}else if ($golongan=='Wiyata') {
            $pangkat = 'belum';
            $jabatan = 'belum';
            $akk = 0;
            $akpkb = 0 ;
            $akp = 0;
            $golke = 'non';
        }
        else if ($golongan=='non') {
            $pangkat = 'belum';
            $jabatan = 'belum';
            $akk = 0;
            $akpkb = 0 ;
            $akp = 0;
            $golke = '';
        }

    	$gol = array(
    		'pangkat' => $pangkat,
    		'jabatan' => $jabatan ,
    		'akk' => $akk,
            'akpkb' => $akpkb,
            'akp' => $akp,
            'golke' => $golke

    	);

    	return $gol;
	}

    function konversi($pkg100)
    {
        if($pkg100<=50){
            $sebut = "Kurang";
            $presen = "25";
        }elseif (($pkg100 >=51) && ($pkg100<=60)){
            $sebut = "Sedang";
            $presen = "50";
        }elseif (($pkg100>=61) && ($pkg100<=75)){
            $sebut = "Cukup";
            $presen = "75";
        }elseif (($pkg100>=76) && ($pkg100<=90)){
            $sebut = "Baik";
            $presen = "100";
        }elseif (($pkg100>=91) && ($pkg100<=100)){
            $sebut = "Amat Baik";
            $presen = "125";
        }

        $konv = array(
            'sebut' => $sebut,
            'presen' => $presen

        );

        return $konv;
    }
 ?>