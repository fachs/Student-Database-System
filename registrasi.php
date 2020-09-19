<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if(registrasi($_POST) > 0) {
        echo "<script>
              alert('user baru berhasil ditambahkan!');
              </script>
        ";
    } else {
      echo mysqli_error($db_conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Registrasi</title>
    <style media="screen">
      label {
        display: block;
      }
    </style>
  </head>
  <body>

    <h1>Halaman Registrasi</h1>

    <form class="" action="" method="post">

      <ul>

        <li>
          <label for="username">username : </label>
          <input type="text" name="username" id="username" required>
        </li>
        <li>
          <label for="password">password : </label>
          <input type="password" name="password" id="password" required>
        </li>
        <li>
          <label for="password2">konfirmasi password : </label>
          <input type="password" name="password2" id="password2" required>
        </li>
        <li>
          <button type="submit" name="register">Register!</button>
        </li>
      </ul>

    </form>

  </body>
</html>