<?php 
require_once 'koneksi.php';
session_start();
$id_obat = $_GET['idObat'];

// perintah sql untuk memasukan data
$sql = "DELETE FROM tb_obat WHERE id_obat='$id_obat'";

 //eksekusi perintah
 // $koneksi->query($sql);
 if ($koneksi->query($sql) === true) {
	//nama session
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat</strong> Data berhasil dihapus';
	header("location:index2.php?url=adminobat.php");
// 	echo "<script>
// 		alert('Berhasil ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
} else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong> Data gagal dihapus';
	header("location:index2.php?url=adminobat.php");
// 	echo "<script>
// 		alert('Gagal ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
// }
}

 ?>


