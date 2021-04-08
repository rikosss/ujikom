<?php 
require_once 'koneksi.php';

session_start();

$id_farmasi = $_POST['id_farmasi'];
$nama_farmasi = $_POST['nama_farmasi'];
$alamat_farmasi = $_POST['alamat_farmasi'];
$kota = $_POST['kota'];
$telepon = $_POST['telepon'];


// perintah sql untuk memasukan data
$sql = "INSERT INTO tb_farmasi values('$id_farmasi','$nama_farmasi','$alamat_farmasi','$kota','$telepon')";
$cekdulu= "select * from tb_farmasi where nama_farmasi='$_POST[nama_farmasi]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu);
if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    $_SESSION['update_status'] = 0;
	$_SESSION['update_message'] = '<strong>Maaf</strong>, Data id sudah ada';
	header("location:adminfarmasi.php");
}
else { //proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
	$koneksi->query($sql);
	$_SESSION['update_status'] = 1;
	$_SESSION['update_message'] = '<strong>Selamat!</strong> Data Tersimpan';
	header("location:adminfarmasi.php");
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


