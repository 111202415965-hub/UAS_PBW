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
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembayaran | Azzaya Kafe</title>

<style>
body{
  margin:0;
  font-family:Poppins, Arial;
  background:#f5f1ec;
}

.container{
  max-width:600px;
  margin:50px auto;
  background:#fff;
  padding:30px;
  border-radius:15px;
  box-shadow:0 15px 30px rgba(0,0,0,.2);
}

h2{
  text-align:center;
  color:#3b2f2f;
}

.item{
  display:flex;
  justify-content:space-between;
  margin:10px 0;
}

.total{
  margin-top:20px;
  font-size:18px;
  font-weight:bold;
}

select, button{
  width:100%;
  padding:12px;
  margin-top:15px;
  border-radius:10px;
  border:1px solid #ccc;
}

button{
  background:#ffb347;
  border:none;
  font-weight:bold;
  cursor:pointer;
}
</style>
</head>

<body>

<div class="container">
<h2>🧾 Konfirmasi Pembayaran</h2>

<?php if($cart['kopi_susu'] > 0): ?>
<div class="item">
  <span>Kopi Susu x<?= $cart['kopi_susu'] ?></span>
  <span>Rp<?= number_format($cart['kopi_susu']*20000,0,',','.') ?></span>
</div>
<?php endif; ?>

<?php if($cart['americano'] > 0): ?>
<div class="item">
  <span>Americano x<?= $cart['americano'] ?></span>
  <span>Rp<?= number_format($cart['americano']*25000,0,',','.') ?></span>
</div>
<?php endif; ?>

<?php if($cart['latte'] > 0): ?>
<div class="item">
  <span>Latte x<?= $cart['latte'] ?></span>
  <span>Rp<?= number_format($cart['latte']*22000,0,',','.') ?></span>
</div>
<?php endif; ?>

<div class="total">
  Total Bayar: Rp<?= number_format($total,0,',','.') ?>
</div>

<form action="struk.php" method="post">
  <select name="metode" required>
    <option value="">Pilih Metode Pembayaran</option>
    <option value="Cash">Cash</option>
  </select>

  <button type="submit">Konfirmasi Bayar</button>
</form>
</div>

</body>
</html>
