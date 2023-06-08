<?php
require 'fungsi.php';

$mahasiswa = query("Select * From mahasiswa");
//var_dump($mahasiswa);
?>
<html>

<head>
    <title>Latihan CRUD</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="datatable/datatable.bootstrape.css">
    <link rel="stylesheet" href="datatable/datatable.css">
</head>

<body>


    <div class="container">
        <h1> Daftar Mahasiswa</h1>

        <a href="tambah.php" class="btn btn-primary"> Tambah Data Mahasiswa</a>
        <br></br>
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM </th>
                    <th>Nama Mahasiswa </th>
                    <th>Email </th>
                    <th>Jurusan </th>
                    <th>Gambar </th>
                    <th>Aksi </th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php
                foreach ($mahasiswa as $row):

                    ?>
                    <tr>
                        <td>
                            <?php echo $a ?>
                        </td>
                        <td>
                            <?php echo $row["nim"]; ?>
                        </td>
                        <td>
                            <?php echo $row["nama"]; ?>
                        </td>
                        <td>
                            <?php echo $row["email"]; ?>
                        </td>
                        <td>
                            <?php echo $row["jurusan"]; ?>
                            </th>
                        <td><img src="gambar/<?php echo $row["gambar"]; ?>" width="100px"> </th>
                        <td>
                            <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Edit</a>
                            <a href="hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary"> Hapus</a>
                        </td>
                    </tr>


                    <?php $a++; ?>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</body>
<script src="datatable/jquery.js"></script>
<script src="datatable/datatable.js"></script>
<script src="datatable/datatable.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#tabel-data').DataTable();
    });
</script>

</html>