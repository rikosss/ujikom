<?php 
require_once 'koneksi.php';
//memulai session
session_start();

$id_farmasi = $_POST['id_farmasi'];
$nama_farmasi = $_POST['nama_farmasi'];
$alamat_farmasi = $_POST['alamat_farmasi'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];
// perintah sql untuk memasukan data
$sql = "UPDATE tb_farmasi set nama_farmasi ='$nama_farmasi', alamat_farmasi='$alamat_farmasi' WHERE id_farmasi='$id_farmasi'";

 //eksekusi perintah

if ($koneksi->query($sql) === true) {
	//nama session
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat</strong> Data berhasil diupdate';
	header("location:index2.php?url=adminfarmasi.php");
// 	echo "<script>
// 		alert('Berhasil ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
} else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong> Data gagal diupdate';
	header("location:index2.php?url=adminfarmasi.php");
// 	echo "<script>
// 		alert('Gagal ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
// }
}
