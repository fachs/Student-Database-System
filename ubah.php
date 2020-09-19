<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  //ambil data dari tiap elemen dalam form

  //cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
      <script>
        alert('data BERHASIL diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  }
  else {
    echo "
    <script>
      alert('data GAGAL diubah!');
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
    <title>Ubah data mahasiswa</title>
  </head>
  <body>
    <h1>Ubah data mahasiswa</h1>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
      <ul>
        <li>
          <label for="nim">NIM : </label>
          <input type="text" name="nim" value="<?= $mhs["nim"]; ?>" required>
        </li>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
        </li>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
        </li>
        <li>
          <label for="prodi">Prodi : </label>
          <input type="text" name="prodi" id="prodi" required value="<?= $mhs["prodi"]; ?>">
        </li>
        <li>

          <label for="gambar">Gambar : </label> <br>
          <img src="img/<?= $mhs['gambar']; ?>" alt="" width="40"> <br>
          <input type="file" name="gambar" id="gambar">
        </li>
        <li>
          <button type="submit" name="submit">Ubah Data!</button>
        </li>
      </ul>

    </form>
    <br>
          <a href="index.php">Halaman Utama</a>
  </body>
</html>
