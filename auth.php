<?php
session_start();
require 'koneksi.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Ambil user
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

  $_SESSION['user'] = $user['username'];
  $_SESSION['role'] = $user['role'];

  header("Location: akun.php");
  exit;

} else {
  header("Location: login.php?error=Username atau password salah");
  exit;
}
