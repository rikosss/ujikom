<?php 

$servername = 'localhost';
$username	= 'root';
$password	= '';
$db_name	= 'db_apotek';

//membuat koneksi
$koneksi	= new mysqli($servername, $username, $password, $db_name);

//cek koneksi

//fungsi '->' adalah untuk memanggil property/method 
//property tanpa() kalau method pakai ()

if ($koneksi->connect_error) {
	die("Koneksi Gagal ".$koneksi->connect_error);
}



 ?>