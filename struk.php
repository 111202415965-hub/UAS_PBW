<?php
session_start();

if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}

$cart = $_SESSION['cart'] ?? [
  'kopi_susu' => 0,
  'americano' => 0,
  'latte' => 0
];

$metode = $_POST['metode'] ?? '';

if($metode == ''){
  header("Location: bayar.php");
  exit;
}

$harga = [
  "kopi_susu" => 20000,
  "americano" => 25000,
  "latte" => 22000
];

$total = 0;
foreach($cart as $item => $qty){
  $total += $qty * $harga[$item];
}

if($total == 0){
  header("Location: akun.php");
  exit;
}

/* 🔥 kosongkan cart setelah transaksi */
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Struk Pembayaran</title>

<style>
body{
  margin:0;
  font-family:Poppins, Arial;
  background:#f5f1ec;
}

.box{
  max-width:500px;
  margin:50px auto;
  background:#fff;
  padding:30px;
  border-radius:15px;
  box-shadow:0 15px 30px rgba(0,0,0,.3);
  text-align:center;
}

h2{
  color:#3b2f2f;
}

p{
  margin:8px 0;
}

a{
  display:block;
  margin-top:20px;
  text-decoration:none;
  color:#ffb347;
  font-weight:bold;
}
</style>
</head>

<body>

<div class="box">
<h2>✅ Pembayaran Berhasil</h2>

<p>Terima kasih <b><?= $_SESSION['username'] ?></b></p>
<p>Metode Pembayaran: <b><?= $metode ?></b></p>
<p>Total Bayar: <b>Rp<?= number_format($total,0,',','.') ?></b></p>

<hr>

<p>Pesanan sedang diproses ☕</p>

<a href="akun.php">← Kembali ke Menu</a>
</div>

</body>
</html>
