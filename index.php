<?php

include('koneksi.php');
$barang_elektronik = mysqli_query($conn, "SELECT * FROM gudang_elektronik");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>CRUD</title>
</head>

<body>
  <div class="container py-5">
    <h1>Data Elektronik</h1>
    <a class="btn btn-primary mb-4" href="tambah.php">Tambah Data Elektronik</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis</th>
          <th scope="col">Harga</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($barang_elektronik) > 0) : ?>
          <?php $number = 0; ?>
          <?php while ($elektronik = mysqli_fetch_assoc($barang_elektronik)) { ?>
            <tr>
              <th scope="row"><?= ++$number; ?></th>
              <td><?= $elektronik['nama']; ?></td>
              <td><?= number_format($elektronik['stok']); ?></td>
              <td>Rp <?= number_format($elektronik['harga']); ?></td>
              <td class="text-center">
                <a href="edit.php?id=<?= $elektronik['id']; ?>" class="btn btn-warning"><i class="far fa-edit"></i> Ubah</a>
                <a href="delete.php?id=<?= $elektronik['id']; ?>" class="btn btn-danger" id="tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php } ?>
        <?php else : ?>
          <tr>
            <td colspan="6" class="text-center">Tidak ada Data Elektronik</td>
          </tr>
        <?php endif;  ?>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    $("#tombol-hapus").each(function(index) {
      $(this).on("click", function(e) {
        e.preventDefault();
        let href = e.currentTarget.getAttribute('href');

        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Kamu gak bakal bisa ngebalikin data ini loh",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus aja!',
          cancelButtonText: "Gak jadi"
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Berhasil!',
              'Data rumah sakit berhasil dihapus',
              'success'
            )
            window.location.href = href;
          }
        })
      });
    });
  </script>
</body>

</html>