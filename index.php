<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Azzaya Kafe</title>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Poppins,Arial;
}

body{
  background:#fdf6f0;
  color:#3e2f22;
}

/* NAVBAR */
nav{
  background:#3b2f2f;
  padding:15px 30px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  color:white;
}

nav a{
  color:#ffb347;
  text-decoration:none;
  margin-left:20px;
  font-weight:600;
}

/* BANNER */
.hero{
  height:60vh;
  background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.6)),
  url("img/coffee-bg.jpg");
  background-size:cover;
  background-position:center;
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
  color:white;
  text-align:center;
}

.hero h1{
  font-size:48px;
}
.hero p{
  font-size:18px;
  margin-top:10px;
}

/* PRODUK */
.section{
  padding:50px 30px;
  text-align:center;
}

.products{
  display:flex;
  justify-content:center;
  gap:30px;
  flex-wrap:wrap;
}

.card{
  background:white;
  width:280px;
  border-radius:15px;
  overflow:hidden;
  box-shadow:0 8px 15px rgba(0,0,0,.15);
  transition:.3s;
}

.card:hover{
  transform:translateY(-10px);
}

.card img{
  width:100%;
  height:200px;
  object-fit:cover;
}

.card .info{
  padding:20px;
}

.card h3{
  margin-bottom:8px;
}

.card p{
  margin-bottom:15px;
}

.card button{
  background:#ffb347;
  border:none;
  padding:10px 20px;
  border-radius:8px;
  cursor:pointer;
  font-weight:bold;
}

.card button:hover{
  background:#d17a00;
}

/* FOOTER */
footer{
  background:#3b2f2f;
  color:white;
  text-align:center;
  padding:20px;
  margin-top:50px;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav>
  <h2>☕ Azzaya Kafe</h2>
  <div>
    <?php if(isset($_SESSION['user'])): ?>
      <a href="akun.php">Akun</a>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <h1>Kopi Nusantara Terbaik</h1>
  <p>Nikmati rasa kopi pilihan dengan cita rasa khas</p>
</div>

<!-- PRODUK -->
<div class="section">
  <h2>Menu Andalan</h2>
  <br>

  <div class="products">

    <div class="card">
      <img src="GulaAren.jpg" alt="Kopi Gula Aren">
      <div class="info">
        <h3>Kopi Gula Aren</h3>
        <p>Manis alami dengan aroma karamel</p>
        <p><b>Rp20.000</b></p>
        <button onclick="location.href='login.php'">Beli</button>
      </div>
    </div>

    <div class="card">
      <img src="Americano.jpeg" alt="Americano">
      <div class="info">
        <h3>Americano</h3>
        <p>Ringan, pahit, dan menyegarkan</p>
        <p><b>Rp25.000</b></p>
        <button onclick="location.href='login.php'">Beli</button>
      </div>
    </div>

    <div class="card">
      <img src="latte.jpg" alt="Latte">
      <div class="info">
        <h3>Latte</h3>
        <p>Lembut, creamy, dan nikmat</p>
        <p><b>Rp22.000</b></p>
        <button onclick="location.href='login.php'">Beli</button>
      </div>
    </div>

  </div>
</div>

<!-- FOOTER -->
<footer>
  <p>&copy; 2025 Azzaya Kafe</p>
</footer>

</body>
</html>
