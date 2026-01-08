<?php
require 'koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role     = 'customer';

$query = mysqli_query($conn,
  "INSERT INTO users (username, email, password, role)
   VALUES ('$username', '$email', '$password', '$role')"
);

if ($query) {
  header("Location: login.php");
  exit;
} else {
  echo "Gagal daftar: " . mysqli_error($conn);
}
