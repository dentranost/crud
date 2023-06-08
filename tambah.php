<?php
require 'fungsi.php';

if (isset ($_POST["submit"])){

    if (tambah ($_POST) > 0){
        echo "
        <script>
        alert ('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}

?>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Latihan CRUD</title>

</head>
<body>
    <h1>Halaman Formulir Data Mahasiswa</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan NIM" required />

        </div>
        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>

        <div class="form-group">
            <label for="gambar">Foto:</label>
            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Foto Mahasiswa" />
        </div>

        

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>