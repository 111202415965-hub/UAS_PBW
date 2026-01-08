<?php
$conn = mysqli_connect("localhost", "root", "", "azzaya");

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
