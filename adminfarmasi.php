<?php
require_once 'koneksi.php';
session_start();
?>
<div class="container">
  <div class="card-header">
    <h3>Master Data Farmasi</h3>
  </div>
  <div class="card-body">
    <form action="proses_insert_farmasi.php" method="POST">
      <div class="form-group">
        <input type="text" name="id_farmasi" required class="form-control" placeholder="Masukkan ID Farmasi">
      </div>
      <div class="form-group">
        <input type="text" name="nama_farmasi" required class="form-control" placeholder="Masukkan Nama Farmasi">
      </div>
      <div class="form-group">
        <input type="text" name="alamat_farmasi" required class="form-control" placeholder="Masukkan Alamat Farmasi">
      </div>
      <div class="form-group">
        <input type="text" name="kota" required class="form-control" placeholder="Masukkan Kota">
      </div>
      <div class="form-group">
        <input type="text" name="telepon" required class="form-control" placeholder="Masukkan Telepon">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" onclick=" return confirm('Apakah anda yakin ingin menyimpan data?')" value="Kirim" />
      </div>
    </form>
    <hr />
  </div>
  <?php
  if (isset($_SESSION['update_status'])) { ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <?= $_SESSION['update_message']; ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php }
  unset($_SESSION['update_status']);
  ?>
  <?php
  $sql = "SELECT * FROM tb_farmasi ORDER BY id_farmasi ASC";
  $result  = $koneksi->query($sql);
  ?>
  <table id="myTable" class="table table-striped table-bordered table-hover">
    <thead>
      <tr align="center">
        <th width="50">No</th>
        <th>ID Farmasi</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Telepon</th>
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
            <td><?= $row['id_farmasi']; ?></td>
            <td><?= $row['nama_farmasi']; ?></td>
            <td><?= $row['alamat_farmasi']; ?></td>
            <td><?= $row['kota']; ?></td>
            <td><?= $row['telepon']; ?></td>
            <td align="center">
              <div>
                <a href="adminfarmasiedit.php?idFarmasi=<?= $row['id_farmasi'] ?>" class="btn btn-xs btn-warning" title="Edit" onclick="return confirm('Apakah anda yakin ingin Mengubah?')">
                  <i class="fa fa-edit"></i>

                  <a href="proses_delete_farmasi.php?idFarmasi=<?= $row['id_farmasi'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Form Edit Data Farmasi</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proses_update_farmasi.php" method="POST">

          <div class="form-group">
            <input type="text" name="id" readonly required class="form-control edit-id">
          </div>
          <div class="form-group">
            <input type="text" name="nama" required class="form-control edit-nama" placeholder="Masukkan nama anda">
          </div>
          <div class="form-group">
            <input type="email" name="email" required class="form-control edit-email" placeholder="Masukkan email anda">
          </div>
          <div class="form-group">
            <textarea name="pesan" required class="form-control edit-pesan"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah data?')" value="Ubah" />
          </div>

        </form>
      </div>
    </div>
  </div>
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

</html>