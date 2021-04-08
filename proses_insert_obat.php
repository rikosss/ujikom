<?php 
require_once 'koneksi.php';

session_start();

$id_obat = $_POST['id_obat'];
$kategori = $_POST['kategori'];
$nama_obat = $_POST['nama_obat'];
$harga_obat = $_POST['harga_obat'];
$stok_obat = $_POST['stok_obat'];
$nama_farmasi = $_POST['nama_farmasi'];

// perintah sql untuk memasukan data
$sql = "INSERT INTO tb_obat values('$id_obat','$kategori','$nama_obat','$harga_obat','$stok_obat','$nama_farmasi')";
$cekdulu= "select * from tb_obat where nama_obat='$_POST[nama_obat]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu);
if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    $_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong>, Data email sudah ada';
	header("location:index2.php?url=adminobat.php");
}
else { //proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
	$koneksi->query($sql);
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat!</strong> Data Tersimpan';
	header("location:index2.php?url=adminobat.php");
}

  

 //eksekusi perintah
 // $koneksi->query($sql);
// if ($koneksi->query($sql) === true) {
// 	//nama session
// 	$_SESSION['update_status'] = 1;
// 	$_SESSION['update_message'] = '<strong>Selamat</strong> Data berhasil disimpan';
// 	header("location:hal_buku_tamu.php");
// // 	echo "<script>
// // 		alert('Berhasil ter ubah');
// // 		location.assign('hal_buku_tamu.php');
// // 	</script>";
// } else{
// 	$_SESSION['update_status'] = 0;
// 	$_SESSION['update_message'] = '<strong>Maaf</strong> Data gagal disimpan';
// 	header("location:hal_buku_tamu.php");
// // 	echo "<script>
// // 		alert('Gagal ter ubah');
// // 		location.assign('hal_buku_tamu.php');
// // 	</script>";
// // }
// }
?>


