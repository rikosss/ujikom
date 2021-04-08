<?php
require_once 'koneksi.php';
session_start();
?>
<body>
  <div class="container">
    <div class="card-header">
      <h3>Lihat Data Obat</h3>
    </div>
   
   
    <?php
    if (isset($_SESSION['update_status'])) { ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <?= $_SESSION['update_message'];?>
      
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <?php }
    unset($_SESSION['update_status']);
    ?>
    <?php
    $sql = "SELECT * FROM tb_obat ORDER BY id_obat ASC";
    $result  = $koneksi->query($sql);
    ?>
    <table id="myTable" class="table table-striped table-bordered table-hover">
      <thead>
        <tr align="center">
          <th width="50">No</th>
          <th>ID Obat</th>
          <th>Kategori</th>
          <th>Nama Obat</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Farmasi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          $no = 1;
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr align="center">
              <td><?= $no; ?></td>
              <td><?= $row['id_obat']; ?></td>
              <td><?= $row['kategori']; ?></td>
              <td><?= $row['nama_obat']; ?></td>
              <td><?= $row['harga_obat']; ?></td>
              <td><?= $row['stok_obat']; ?></td>
              <td><?= $row['nama_farmasi']; ?></td>
              <td align="center">
                <div>
                <a href="pegobatedit.php?idObat=<?= $row['id_obat'] ?>" class="btn btn-xs btn-warning" title="Hapus" onclick="return confirm('Apakah anda yakin ingin Mengubah?')">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="proses_delete_obat.php?idObat=<?= $row['id_obat'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
        <?php
            $no++;
          }
        }
        ?>


      </tbody>

    </table>


  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        pageLength: 5,
      });
    });
  </script>
</body>
</div>

</html>