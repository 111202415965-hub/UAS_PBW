<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: akun.php");
  exit;
}
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Azzaya</title>
<style>
*{
  box-sizing:border-box;
  font-family:'Poppins', Arial, sans-serif;
}

body{
  margin:0;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background:linear-gradient(135deg,#3b2f2f,#1c1816);
}

.auth-box{
  background:#fff;
  width:360px;
  padding:35px;
  border-radius:15px;
  box-shadow:0 20px 40px rgba(0,0,0,.35);
  text-align:center;
  animation:fadeIn .5s ease;
}

.auth-box h2{
  margin-bottom:10px;
  color:#3b2f2f;
}

.auth-box p{
  font-size:14px;
  color:#777;
  margin-bottom:20px;
}

input{
  width:100%;
  padding:12px;
  margin-bottom:15px;
  border-radius:8px;
  border:1px solid #ccc;
  font-size:14px;
}

input:focus{
  outline:none;
  border-color:#ffb347;
}

button{
  width:100%;
  padding:12px;
  background:#ffb347;
  border:none;
  border-radius:8px;
  font-size:16px;
  font-weight:bold;
  color:#fff;
  cursor:pointer;
  transition:.3s;
}

button:hover{
  background:#d17a00;
  transform:translateY(-2px);
}

.error{
  background:#ffe5e5;
  color:#b30000;
  padding:10px;
  border-radius:8px;
  margin-bottom:15px;
  font-size:14px;
}

.links{
  margin-top:15px;
  font-size:14px;
}

.links a{
  color:#ffb347;
  text-decoration:none;
  font-weight:600;
}

@keyframes fadeIn{
  from{opacity:0; transform:scale(.9)}
  to{opacity:1; transform:scale(1)}
}
.back-home{
  margin-top:15px;
  text-align:center;
}

.back-home a{
  color:#C4A484;
  font-size:14px;
  text-decoration:none;
  font-weight:500;
  transition:.3s;
}

.back-home a:hover{
  color:brown;
  text-decoration:underline;
}

</style>

</head>
<body>
<div class="auth-box">
<h2>Login Azzaya Kafe</h2>

<?php if($error): ?>
  <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form action="auth.php" method="post">
  <input type="text" name="username" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit">Login</button>
</form>

<p>Belum punya akun? <a href="signup.php">Daftar</a></p>
<!-- 🔽 LINK KEMBALI -->
<div class="back-home">
  <a href="index.php">← Kembali ke Daftar Menu</a>
</div>
</div>
</body>
</html>
