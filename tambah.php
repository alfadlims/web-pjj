<?php  

require 'functions.php';

if(isset($_POST["submit"])){
  //cek berhasil atau tidak
  if(tambah($_POST) > 0){
    echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }else{
    echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu-anggota.html">PJJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="katalog.html">Katalog</a>
            <a class="nav-link" href="order.html">Order</a>
            <a class="nav-link" href="tambah.php">Tambah Buku</a>
            <a class="nav-link" href="index.html">Kelola Buku</a>
            <a class="nav-link" href="landing.html">Keluar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid small-jumbotron">
      <div class="container menu-title">
        <h2 class="display-4">TAMBAH BUKU</h2>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- form -->
    <div class="container-fluid form-balik">
      <div class="row justify-content-center">
        <!-- signup content -->
        <div class="col-10">
          
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="KodeBuku">Kode</label>
                <input type="text" class="form-control" id="KodeBuku" placeholder="Harus Unik!" name="Kode_Buku" required/>
              </div>
              <div class="form-group col-sm-10">
                <label for="JudulBuku">Judul</label>
                <input type="text" class="form-control" id="JudulBuku" name="Judul" required/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="penulisBuku">Penulis</label>
                <input type="text" class="form-control" id="penulisBuku" name="Penulis" required/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-9">
                <label for="gambar">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="Gambar"/>
              </div>
              <div class="form-group col-3">
                <label for="tahunTerbit">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahunTerbit" placeholder="YYYY" name="Tahun_Terbit" required/>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="form-group col-3">
                <button type="submit" class="btn btn-primary" style="width: 100%" name="submit" onclick="return confirm('Tambahkan Buku?')">Tambahkan</button>
              </div>
            </div>
          </form>
          <!-- akhir signup content -->
        </div>
      </div>
    </div>
    <!-- akhir form -->

    <!-- footer -->
    <footer class="landing">
      <div class="container-fluid container-footer">
        <div class="row footer">
          <div class="col text-center">
            <p>2021. All Rights Reserved by Kelompok 2</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>
