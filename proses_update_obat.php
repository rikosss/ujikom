<?php 
require_once 'koneksi.php';
//memulai session
session_start();

$id_obat = $_POST['id_obat'];
$kategori = $_POST['kategori'];
$nama_obat = $_POST['nama_obat'];
$harga_obat = $_POST['harga_obat'];
$stok_obat = $_POST['stok_obat'];
$nama_farmasi = $_POST['nama_farmasi'];
// perintah sql untuk memasukan data
$sql = "UPDATE tb_obat set kategori ='$kategori', nama_obat ='$nama_obat', harga_obat='$harga_obat', stok_obat='$stok_obat', nama_farmasi='$nama_farmasi' WHERE id_obat='$id'";

 //eksekusi perintah

if ($koneksi->query($sql) === true) {
	//nama session
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat</strong> Data berhasil diupdate';
	header("index2.php?url=adminobat.php");
// 	echo "<script>
// 		alert('Berhasil ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
} else{
	$_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong> Data gagal diupdate';
	header("index2.php?url=adminobat.php");
// 	echo "<script>
// 		alert('Gagal ter ubah');
// 		location.assign('hal_buku_tamu.php');
// 	</script>";
// }
}
