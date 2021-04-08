<?php
require_once 'koneksi.php';
session_start();

require_once 'koneksi.php';
$id = $_GET['idTamu'];
$sql = "SELECT * FROM tb_obat WHERE tb_obat='$id'";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
	$nama	= $row['nama_tamu'];
	$email	= $row['email_tamu'];
	$pesan	= $row['pesan_tamu'];
}
?>


<body>
  <div class="container">
    <div class="card-header">
      <h3>Master Data Obat</h3>
    </div>
    <div class="card-body">
      <form action="proses_insert_obat.php" method="POST">
        <div class="form-group">
          <input type="text" name="nama" required class="form-control" placeholder="Masukkan nama anda">
        </div>
        <div class="form-group">
          <input type="email" id="email" autocomplete="off" name="email" required class="form-control" placeholder="Masukkan email anda">
        </div>
        <div class="form-group">
          <textarea name="pesan" required class="form-control" placeholder="Masukkan pesan kesan anda"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-block"onclick=" return confirm('Apakah anda yakin ingin menyimpan data?')" value="Kirim" />
        </div>
      </form>
      <hr />
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
              <td><?= $row['id_farmasi']; ?></td>
              <td align="center">
                <!-- <a href="index.php?url=data_calon_lihat&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-info" title="Lihat">
                    <i class="fa fa-eye"></i>
                    </a> -->
                <div>
                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id_tamu']; ?>" data-nama="<?= $row['nama_tamu']; ?>" data-email="<?= $row['email_tamu']; ?>" data-pesan="<?= $row['pesan_tamu']; ?>"><i class="fa fa-edit"></i></button>

                  <a href="proses_delete_buku_tamu.php?idTamu=<?= $row['id_tamu'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
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
          <h3 class="modal-title" id="exampleModalLabel">Form Edit Buku Tamu</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="proses_update_buku_tamu.php" method="POST">

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
      $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // 
        var id = button.data('id')
        var nama = button.data('nama')
        var email = button.data('email')
        var pesan = button.data('pesan')
        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)

        modal.find('.modal-body .edit-id').val(id)
        modal.find('.modal-body .edit-nama').val(nama)
        modal.find('.modal-body .edit-email').val(email)
        modal.find('.modal-body .edit-pesan').html(pesan)
      })
        $('.alert').delay(500).fadeOut(1000);
    });
  </script>
</body>

</html>