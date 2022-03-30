<?php

include('koneksi.php');

if ($_GET) {
  $id = $_GET['id'];
  $query_delete = "DELETE FROM gudang_elektronik WHERE id=$id";

  if (mysqli_query($conn, $query_delete)) {
    sleep(1.5);
    header('Location: index.php');
    // echo "<script>alert('Data Rumah Sakit dengan ID : " . $id . " berhasil dihapus!');
    //   document.location.href = 'index.php';
    // </script>";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}
