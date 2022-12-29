<?php


// script by saepulfariz 28/12/2022


$log = json_decode(file_get_contents('log.json'), true);

echo "============================================================";
echo "\n";
echo "\t\t View Log Kalkulasi IPK \t\t";
echo "\n";
echo "============================================================";
echo "\n";
echo "\n";

$a = 1;
$sksTotal = 0;
$nilaiTotal = 0;
foreach($log as $l){
	echo "Data ke = ".$a;
	echo "\n";
	echo "----------------------------------";
	echo "\n";
	echo "Kode Matkul \t: ".$l['kode_matkul'];
	echo "\n";
	echo "Mata Kuliah \t: ".$l['nama_matkul'];
	echo "\n";
	echo "Nilai Angka \t: ".$l['nilai_angka'];
	echo "\n";
	echo "Jumlah SKS \t: ".$l['sks'];
	$sksTotal += $l['sks'];
	
	echo "\n";
	echo "\n";
	
	echo "Nilai Huruf \t: ".$l['nilai_huruf'];
	echo "\n";
	
	echo "Bobot Nilai \t: ".$l['nilai_bobot'];
	echo "\n";
	
	echo "Total Nilai \t: ".$l['nilai_total'];
	$nilaiTotal += $l['nilai_total'];
	echo "\n";
	echo "\n";
	
	$a++;
	
}


echo "============================================================";
echo "\n";
echo "\t\t Banyak SKS Anda \t: ".$sksTotal."\t\t";
echo "\n";
echo "\t\t Total Semua Nilai \t: ".$nilaiTotal."\t\t";
echo "\n";
echo "\t\t IPK \t\t\t: ".$nilaiTotal/$sksTotal."\t\t";
echo "\n";
echo "============================================================";
echo "\n";
echo "\n";

echo "Mau Lanjut Kalkulasi IPK? (Y/N) : ";
$answer = ucfirst(trim(fgets(STDIN)));

if('y' == strtolower($answer)){
	exec('start cmd.exe php bot.php');
	
}else{
	exit();
}