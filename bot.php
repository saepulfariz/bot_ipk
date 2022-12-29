<?php


// script by saepulfariz 28/12/2022

function kalkulasi($nilai){
	if($nilai >= 80 && $nilai <= 100){
		$huruf = 'A';
		$bobot = 4;
	}else if($nilai >= 65 && $nilai <= 79){
		$huruf = 'B';
		$bobot = 3;
	}else if($nilai >= 55 && $nilai <= 64){
		$huruf = 'C';
		$bobot = 2;
	}else if($nilai >= 40 && $nilai <= 54){
		$huruf = 'D';
		$bobot = 1;
	}else{
		$huruf = 'E';
		$bobot = 0;
	}
	
	$array = [
		'huruf' => $huruf,
		'bobot' => $bobot,
	];
	
	return $array;
}

echo "============================================================";
echo "\n";
echo "\t\t Program Penghitung IPK \t\t";
echo "\n";
echo "============================================================";
echo "\n";
echo "\n";
echo "Input banyak Mata Kuliah Yang Anda Ambil : ";
$jmlhMatkul = ucfirst(trim(fgets(STDIN)));
echo "\n";


$a = 1;
$arrayMatkul = [];
$sksTotal = 0;
$nilaiTotal = 0;
do{
	echo "Data ke = ".$a;
	echo "\n";
	echo "----------------------------------";
	echo "\n";
	
	echo "Kode Matkul \t: ";
	$kodeMatkul = ucfirst(trim(fgets(STDIN)));
	echo "Mata Kuliah \t: ";
	$matkul = ucfirst(trim(fgets(STDIN)));
	echo "Nilai Angka \t: ";
	$nilaiAngka = ucfirst(trim(fgets(STDIN)));
	echo "Jumlah SKS \t: ";
	$jmlhSKS = intval(ucfirst(trim(fgets(STDIN))));
	$sksTotal += $jmlhSKS;
	
	
	
	echo "\n";
	$kalkulasi = kalkulasi($nilaiAngka);
	
	echo "Nilai Huruf \t: ".$kalkulasi['huruf'];
	echo "\n";
	
	echo "Bobot Nilai \t: ".$kalkulasi['bobot'];
	echo "\n";
	
	$nilai = $kalkulasi['bobot'] * $jmlhSKS;
	$nilaiTotal += $nilai;
	echo "Total Nilai \t: ".$nilai;
	echo "\n";
	
	$arrayMatkul[$a]['kode_matkul'] = $kodeMatkul;
	$arrayMatkul[$a]['nama_matkul'] = $matkul;
	$arrayMatkul[$a]['sks'] = $jmlhSKS;
	$arrayMatkul[$a]['nilai_angka'] = $nilaiAngka;
	$arrayMatkul[$a]['nilai_huruf'] = $kalkulasi['huruf'];
	$arrayMatkul[$a]['nilai_bobot'] = $kalkulasi['bobot'];
	$arrayMatkul[$a]['nilai_total'] = $nilai;
	
	echo "\n";
	$a++;
} while($a == $jmlhMatkul);


echo "============================================================";
echo "\n";
echo "\t\t Banyak SKS Anda \t: ".$sksTotal."\t\t";
echo "\n";
echo "\t\t Total Semua Nilai \t: ".$nilaiTotal."\t\t";
echo "\n";
echo "\t\t IPK \t\t\t: ".$nilaiTotal/$sksTotal."\t\t";
echo "\n";
echo "============================================================";



$myfilecreate = fopen('log.json', "w");
//$datajson[$dateFormat][$timeFormat] = $update;
fwrite($myfilecreate, json_encode($arrayMatkul, JSON_PRETTY_PRINT));
fclose($myfilecreate);
