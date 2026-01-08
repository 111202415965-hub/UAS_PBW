<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}


// Inisialisasi keranjang
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = [
    "kopi_susu" => 0,
    "americano" => 0,
    "latte" => 0
  ];
}
// Kosongkan seluruh pesanan
if(isset($_POST['clear_cart'])){
  $_SESSION['cart'] = [
    "kopi_susu" => 0,
    "americano" => 0,
    "latte" => 0
  ];
  header("Location: akun.php");
  exit;
}
// Update cart
if(isset($_POST['action'], $_POST['item'])){
  $item = $_POST['item'];

  if($_POST['action'] === 'plus'){
    $_SESSION['cart'][$item]++;
  }

  if($_POST['action'] === 'minus' && $_SESSION['cart'][$item] > 0){
    $_SESSION['cart'][$item]--;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Akun | Azzaya Kafe</title>
<div class="welcome">
  <h1>Selamat Datang <b>Customer</b></h1>
  <p>Silahkan pesan menu kami ☕</p>
</div>

<style>
body{
  margin:0;
  font-family:Poppins, Arial;
}

header{
  background:#3b2f2f;
  color:#fff;
  padding:15px 30px;
  display:flex;
  justify-content:space-between;
  align-items:center;
}

header a{
  color:#ffb347;
  text-decoration:none;
  font-weight:bold;
}
.welcome{
  text-align:center;
  margin:30px 0 10px;
}

.welcome h1{
  font-size:32px;
  font-weight:800;
  color:#3b2f2f;
}

.welcome p{
  font-size:16px;
  color:#555;
}

.container{
  padding:30px;
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:25px;
  background :url("MesinKopi.jpg") center/cover no-repeat fixed;
  /* TAMBAHAN PENTING */
  padding-bottom:220px;
}

.card{
  background:#fff;
  border-radius:15px;
  padding:20px;
  box-shadow:0 10px 20px rgba(0,0,0,.15);
  text-align:center;
}

.card img{
  width:100%;
  height:180px;
  object-fit:cover;
  border-radius:10px;
}

.card h3{
  margin:10px 0 5px;
}

.card p{
  font-size:14px;
  color:#666;
}

.counter{
  display:flex;
  justify-content:center;
  align-items:center;
  gap:10px;
  margin-top:15px;
}

.counter button{
  width:35px;
  height:35px;
  border:none;
  border-radius:50%;
  background:#ffb347;
  font-size:18px;
  cursor:pointer;
}

.counter span{
  font-size:18px;
  font-weight:bold;
}

/* Tombol Bayar */
.checkout{
  position:fixed;
  bottom:20px;
  right:20px;
  background:#3b2f2f;
  color:#fff;
  padding:20px;
  border-radius:15px;
  width:280px;
  box-shadow:0 15px 30px rgba(0,0,0,.4);
}

.checkout h4{
  margin-bottom:10px;
  color:#ffb347;
}

.checkout p{
  font-size:14px;
  margin:4px 0;
}

.checkout button{
  width:100%;
  margin-top:10px;
  padding:10px;
  background:#ffb347;
  border:none;
  border-radius:10px;
  font-weight:bold;
  cursor:pointer;
}
.clear-btn{
  background:#b30000;
  margin-top:8px;
}

.clear-btn:hover{
  background:#800000;
}


/* Footer */
footer{
  background:#3b2f2f;
  color:#fff;
  text-align:center;
  padding:20px;
  margin-top:40px;
}
</style>
</head>

<body>

<header>
  <h2>☕ Azzaya Kafe</h2>
  <a href="logout.php">Logout</a>
</header>

<div class="container">

<!-- PRODUK 1 -->
<div class="card">
  <img src="GulaAren.jpg">
  <h3>Kopi Susu Gula Aren</h3>
  <p>Rp20.000</p>
  <p class="desc">
    Perpaduan kopi robusta pilihan dengan susu segar yang lembut,
    menghasilkan rasa seimbang, creamy, dan nikmat diminum kapan saja.
  </p>
  <form method="post" class="counter">
    <input type="hidden" name="item" value="kopi_susu">
    <button name="action" value="minus">−</button>
    <span><?= $_SESSION['cart']['kopi_susu'] ?></span>
    <button name="action" value="plus">+</button>
  </form>
</div>

<!-- PRODUK 2 -->
<div class="card">
  <img src="Americano.jpeg">
  <h3>Americano</h3>
  <p>Rp25.000</p>
  <p class="desc">
    Kopi hitam dengan karakter strong dan aroma khas,
    cocok untuk pecinta kopi sejati yang menyukai rasa bold tanpa gula.
  </p>
  <form method="post" class="counter">
    <input type="hidden" name="item" value="americano">
    <button name="action" value="minus">−</button>
    <span><?= $_SESSION['cart']['americano'] ?></span>
    <button name="action" value="plus">+</button>
  </form>
</div>

<!-- PRODUK 3 -->
<div class="card">
  <img src="latte.jpg">
  <h3>Latte</h3>
  <p>Rp22.000</p>
  <p class="desc">
    Espresso berpadu dengan susu hangat dan foam lembut,
    memberikan cita rasa creamy yang ringan dan menenangkan.
  </p>
  <form method="post" class="counter">
    <input type="hidden" name="item" value="latte">
    <button name="action" value="minus">−</button>
    <span><?= $_SESSION['cart']['latte'] ?></span>
    <button name="action" value="plus">+</button>
  </form>
</div>

</div>

<?php
$total =
  $_SESSION['cart']['kopi_susu'] * 20000 +
  $_SESSION['cart']['americano'] * 25000 +
  $_SESSION['cart']['latte'] * 22000;
?>

<?php if($total > 0): ?>
<div class="checkout">
  <h4>🧾 Ringkasan Pesanan</h4>
  <p>Kopi Susu: <?= $_SESSION['cart']['kopi_susu'] ?></p>
  <p>Americano: <?= $_SESSION['cart']['americano'] ?></p>
  <p>Latte: <?= $_SESSION['cart']['latte'] ?></p>
  <hr>
  <p><b>Total: Rp<?= number_format($total,0,',','.') ?></b></p>
  <button onclick="location.href='bayar.php'">BAYAR SEKARANG</button>
  <form method="post">
  <button type="submit" name="clear_cart" class="clear-btn">
    Kosongkan Pesanan
  </button>
</form>
</div>
<?php endif; ?>

<footer>
  <p>&copy; 2025 Azzaya Kafe • Semua Hak Dilindungi</p>
</footer>

</body>
</html>
