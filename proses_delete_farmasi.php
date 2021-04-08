<?php 
require_once 'koneksi.php';
session_start();
$id_farmasi = $_GET['idFarmasi'];

// perintah sql untuk memasukan data
$sql = "DELETE FROM tb_farmasi WHERE id_farmasi='$id_farmasi'";

 //eksekusi perintah
 // $koneksi->query($sql);
 if ($koneksi->query($sql) === true) {
	//nama session
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat</strong> Data berhasil dihapus';
	header("location:index2.php?url=adminfarmasi.php");
// 	echo "<script>
// 		alert('Berhasil ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
} else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong> Data gagal dihapus';
	header("location:ndex2.php?url=adminfarmasi.php");
// 	echo "<script>
// 		alert('Gagal ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
// }
}

 ?>


