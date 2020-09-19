<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  //ambil data dari tiap elemen dalam form

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {

    echo "
      <script>
        alert('data BERHASIL ditambahkan!');
        document.location.href = 'index.php';
      </script>
    ";
  }
  else {
    echo "
    <script>
      alert('data GAGAL ditambahkan!');
      document.location.href = 'index.php';
    </script>
    ";
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah data mahasiswa</title>
  </head>
  <body>
    <h1>Tambah data mahasiswa</h1>

    <form class="" action="" method="post" enctype="multipart/form-data">

      <ul>
        <li>
          <label for="nim">NIM : </label>
          <input type="text" name="nim" value="" required>
        </li>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama" required>
        </li>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email" required>
        </li>
        <li>
          <label for="prodi">Prodi : </label>
          <input type="text" name="prodi" id="prodi" required>
        </li>
        <li>
          <label for="gambar">Gambar : </label>
          <input type="file" name="gambar" id="gambar">
        </li>
        <li>
          <button type="submit" name="submit">Tambah Data!</button>
        </li>
      </ul>

    </form>
    <br>
          <a href="index.php">Halaman Utama</a>
  </body>
</html>
