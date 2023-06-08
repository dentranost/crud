<?php

$koneksi = mysqli_connect("localhost", "root", "", "cruddendi");



function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $kotak = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kotak[] = $row;

    }
    return $kotak;
}

function tambah($data)
{
    global $koneksi;
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    // upload file (gambar)
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "Insert Into Mahasiswa Values ('','$nim','$nama','$email','$jurusan','$gambar')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    //mengetahui gambar di upload atau tidak
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //pengecekan tidak ada gambar yang di upload // 4 tidak ada di upload
    if ($error === 4) {

        echo "
        <script>
        alert ('Silahkan Memilih Gambar Dahulu');
        
        </script>
        ";
        return false;

    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    //explode = untuk memecahkan sebuah string menjadi array
    $ekstensiGambar = explode('.', $namaFile); // contoh nama file Andri.jpg akan diubah jadi ['andri']['jpg']
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // mengambil gambar array terakhir dan strlower ekstensi gambar kecil semua
    // mencari gambar valid filter inputan user // yang di upload harus ada di gambar valid di array
    // fungsi in_array digunakan untuk mencari string dalam array andri.maulana.si.JPG
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

        echo "
        <script>
        alert ('Yang Anda Upload Bukan Gambar'); 
        
        </script>
        ";
        return false;
    }

    //cek ukuran gambar gak boleh lebih 1 juta byte
    if ($ukuranFile > 1000000) {
        echo "
        <script>
        alert ('Ukuran Gambar Terlalu Besar'); 
        
        </script>
        ";
        return false;
    }
    //lolos pengecekan
    //generate nama baru beda dengan nama foto asli
    $namaFileBaru = uniqid(); // akan membangkitkan string random
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
    return $namaFileBaru;


}

function ubah($data)
{
    global $koneksi;
    $id = $data["id"];
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    //pengecekan user ganti gambar atau engga
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;

    } else {
        $gambar = upload();
    }

    $query = "Update mahasiswa set nim ='$nim',
                                   nama ='$nama',
                                   email = '$email',
                                   jurusan = '$jurusan',
                                   gambar = '$gambar'
                                   Where id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}

function hapus($id)
{
    global $koneksi;
    $query = "Delete From Mahasiswa Where id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}



?>