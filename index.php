
<!-- <div style=position:obsolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center>[Angonwedus Hekkel]</div> -->

<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//koneksi ke database
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

//tombol cari di tekan
if ( isset($_POST["cari"]) ) {
  $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
    <style media="screen">
      .loader {
        width: 40px;
        position: absolute;
        top: 130px;
        left: 220px;
        z-index: -1;
        display: none;
      }

      @media print {
          .logout, .tambah, .form-cari, .aksi {
              display: none;
          }
      }
    </style>
    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
  </head>
  <body>

      <a href="logout.php" class="logout">Logout</a>

      <h1>Daftar Mahasiswa</h1>

      <a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
      <br><br>

      <form class="form-cari" action="" method="post">

        <input type="text" name="keyword" value="" size="30" autofocus
        placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loader.gif" class="loader">

      </form>
      <br>
      <div class="" id="container">
      <table border="1" cellpadding="10" cellspacing="0">

        <tr>
          <th>No.</th>
          <th class="aksi">Aksi</th>
          <th>Gambar</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Prodi</th>
        </tr>

      <?php $i = 1; ?>
      <?php foreach ($mahasiswa as $row) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td class="aksi">
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ?');">hapus</a>
          </td>
          <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
          <td><?= $row["nim"]; ?></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["email"]; ?></td>
          <td><?= $row["prodi"]; ?></td>
        </tr>
      <?php $i++; ?>
      <?php endforeach; ?>

      </table>
      </div>

  </body>
</html>
