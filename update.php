<?php
require 'fungsi.php';

$id = $_GET["id"];

$mahasiswa = query ("Select * From Mahasiswa Where id = $id")[0];

if (isset ($_POST["submit"])){
    if (ubah ($_POST) > 0){
        echo "
        <script>
        alert ('Data Berhasil Diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('Data Gagal Diubah');
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
    <h1>Update Halaman Formulir Data Mahasiswa</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mahasiswa["id"];?>">
        <input type="hidden" name="gambarLama" value="<?php echo $mahasiswa["gambar"];?>">
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan NIM" value="<?php echo $mahasiswa["nim"];?>" required />

        </div>
        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $mahasiswa["nama"];?>" required/>

        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" value="<?php echo $mahasiswa["email"];?>" required/>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukan Jurusan" value ="<?php echo $mahasiswa["jurusan"];?>" required/>
        </div>



        <div class="form-group">
            <label for="gambar">Foto:</label>
            <img src="gambar/<?php echo $mahasiswa["gambar"];?>" width="100px">
            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Foto Mahasiswa" />
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>