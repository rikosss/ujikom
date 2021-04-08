<?php
require_once 'koneksi.php';
$id = $_GET['idFarmasi'];
$sql = "SELECT * FROM tb_farmasi WHERE id_farmasi='$id'";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_farmasi  = $row['id_farmasi'];
  $nama_farmasi  = $row['nama_farmasi'];
  $alamat_farmasi  = $row['alamat_farmasi'];
  $kota  = $row['kota'];
  $telepon  = $row['telepon'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CPANEL Admin</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link href="asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!-- <link href="asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="asset/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="asset/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CPANEL Admin</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Top Navigation: Left Menu -->
            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Ke Halaman Persediaan</a></li>
            </ul>

            <!-- Top Navigation: Right Menu -->
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown navbar-inverse">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>Administrator<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

           
<div class="card-body">
  <form action="proses_update_farmasi.php?id=<?php echo $_GET['idFarmasi'] ?>" method="post">

    <div class="form-group">
      <input type="text" name="id_farmasi" value="<?php echo $_GET['idFarmasi'] ?>" readonly required class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="nama_farmasi" value="<?php echo $nama_farmasi ?>" required class="form-control" placeholder="Masukkan nama anda">
    </div>
    <div class="form-group">
      <input type="text" name="alamat_farmasi" value="<?php echo $alamat_farmasi ?>" required class="form-control" placeholder="Masukkan email anda">
    </div>
    <div class="form-group">
      <div class="form-group">
        <input type="text" name="kota" value="<?php echo $kota ?>" required class="form-control" placeholder="Masukkan email anda">
      </div>
      <div class="form-group">
        <div class="form-group">
          <input type="text" name="telepon" value="<?php echo $telepon ?>" required class="form-control" placeholder="Masukkan email anda">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah data?')" value="Ubah" />
        </div>
      </div>
    </div>
  

  </form>
</div>
<?php
$sql = "SELECT * FROM tb_farmasi ORDER BY id_farmasi ASC";
$result  = $koneksi->query($sql);
?>
        

        <!-- jQuery -->
        <script src="asset/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="asset/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="asset/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="asset/js/startmin.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>

<