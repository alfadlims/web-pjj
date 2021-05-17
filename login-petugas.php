<?php 

session_start();
require 'functions.php';

//cek cookie
if(isset($_COOKIE["username"]) && isset($_COOKIE["key"])){
  $username = $_COOKIE["username"];
  $key = $_COOKIE["key"];

  //ambil username dari database
  $result = mysqli_query($conn, "SELECT Username_Petugas FROM petugas WHERE Username_Petugas = '$username'");
  $database = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if($key === hash('sha256', $database['Username_Petugas'])){
    $_SESSION["Login_Petugas"] = true;
  }
}

//cek session
if(isset($_SESSION["Login_Petugas"])){
  header("Location: menu-petugas.php");
  exit;
} 

if(isset($_POST["Login_Petugas"])){
  
  $Username_Petugas = $_POST["Username_Petugas"];
  $Password_Petugas = $_POST["Password_Petugas"];
  
  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE Username_Petugas = '$Username_Petugas'");

  //cek username
  if(mysqli_num_rows($result) === 1){
    //cek password
    $database = mysqli_fetch_assoc($result);
    if(password_verify($Password_Petugas, $database["Password_Petugas"])){
      
      //set session
      $_SESSION["Login_Petugas"] = true;

      //cek tetap masuk
      if(isset($_POST["Tetap_Login"])){
        //buat cookie
        setcookie('username', $database['Username_Petugas'], time()+300);
        setcookie('key', hash('sha256', $database['Username_Petugas']), time()+300);
      }

      header("Location: menu-petugas.php");
      exit;
    }
  }
  
  $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&family=PT+Serif&family=Proza+Libre&display=swap" rel="stylesheet" />

    <title>PJJ</title>
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid container-navbar login-navbar">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">PJJ</a>
        <div class="navbar-nav"></div>
      </nav>
    </div>
    <!-- akhir navbar -->

    <!-- login container -->
    <div class="container container-login">
      <div class="row justify-content-center">
        <!-- login content -->
        <div class="col-6 login-content">
          <!-- header login -->
          <div class="row login-header">
            <div class="login-title mt-4">
              <b>Login Petugas</b>
              <hr />
            </div>
          </div>
          <!-- akhir header login -->

          <?php if(isset($error)) : ?>
            <p style="color:red; font-style: italic;">username / password salah</p>
          <?php endif; ?>  

          <form action="" method="post">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="inputUsername">Username</label>
                  <input type="text" class="form-control" id="inputUsername" name="Username_Petugas" value="<?php if(isset($_POST["Login_Petugas"])){ echo $_POST['Username_Petugas']; }?>" required/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="inputPassword4">Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="Password_Petugas" value="<?php if(isset($_POST["Login_Petugas"])){ echo $_POST['Password_Petugas']; }?>" required/>
                </div>
              </div>
            </div>
            <div>
              <input type="checkbox" id="Tetap_Login" name="Tetap_Login"/>
              <label for="Tetap_Login">Tetap Login</label>
            </div>
            <div class="row">
              <div class="form-group col-4 offset-8">
                <button type="submit" class="btn btn-primary" name="Login_Petugas" style="width: 100%">Login</button>
              </div>
            </div>
          </form>
          <!-- akhir login content -->
          <!-- footer login -->
          <div class="row footer-login">
            <div class="link-login">
              <p>Belum terdaftar? <a href="daftar-petugas.php">Daftar</a></p>
            </div>
            <div class="link-login">
              <p>Anda anggota? <a href="login-anggota.php">Login Disini</a></p>
            </div>
          </div>
          <!-- akhir login footer -->
        </div>
      </div>
    </div>
    <!-- akhir login container -->

    <!-- footer -->
    <footer class="login-footer">
      <div class="container-fluid">
        <div class="row footer">
          <div class="col text-center">
            <p>2021. All Rights Reserved by Kelompok 2 Sisdat Kelas A</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
