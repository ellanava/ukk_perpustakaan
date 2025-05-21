<?php
session_start();
include('koneksi.php');

if (isset($_POST['edit'])) {
    $no_lama = $_POST['no_lama'];
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $thn_terbit = $_POST['thn_terbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $penerbit = $_POST['penerbit'];
    $jumlah_hlmn = $_POST['jumlah_hlmn'];
    $harga = $_POST['harga'];
    $gmbar_buku = $_POST['gmbar_buku'];

    $update_query = "UPDATE buku SET 
        kode_buku='$kode_buku', 
        no_buku='$no_buku', 
        judul_buku='$judul_buku', 
        thn_terbit='$thn_terbit', 
        nama_penerbit='$nama_penerbit', 
        penerbit='$penerbit', 
        jumlah_hlmn='$jumlah_hlmn', 
        harga='$harga', 
        gmbar_buku='$gmbar_buku' 
        WHERE no_buku='$no_lama'";

    if (mysqli_query($koneksi, $update_query)) {
        header('Location: admin.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

if (isset($_GET['no_buku'])) {
    $id = $_GET['no_buku'];
    $sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE no_buku='$id'");

    if (mysqli_num_rows($sql) === 0) {
        header('Location: admin.php');
        exit();
    }

    $data = mysqli_fetch_assoc($sql);
} else {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        body {
            background-color: #ffc5c5; /* Warna latar belakang pink muda */
            font-family: Arial, sans-serif; /* Font yang digunakan */
        }

        form {
            background-color: white; /* Warna latar belakang form */
            padding: 20px; /* Ruang dalam form */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
            width: 50%; /* Lebar form */
            margin: 40px auto; /* Margin atas dan bawah, serta posisi form di tengah */
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%; /* Lebar penuh */
            padding: 10px; /* Ruang dalam input */
            margin: 10px 0; /* Margin atas dan bawah */
            border: 1px solid #ccc; /* Border */
            border-radius: 4px; /* Sudut membulat */
        }

        input[type="submit"] {
            background-color: #ffc5c5; /* Warna tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghilangkan border */
            padding: 10px; /* Ruang dalam tombol */
            border-radius: 4px; /* Sudut membulat */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
        }

        input[type="submit"]:hover {
            background-color: #ffb6c1; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    

    <form action="" method="post">
        <input type="hidden" name="no_lama" value="<?= htmlspecialchars($data['no_buku']) ?>" required>
        <input type="text" name="kode_buku" value="<?= htmlspecialchars($data['kode_buku']) ?>" required placeholder="Kode Buku">
        <input type="text" name="no_buku" value="<?= htmlspecialchars($data['no_buku']) ?>" required placeholder="No Buku">
        <input type="text" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']) ?>" required placeholder="Judul Buku">
        <input type="date" name="thn_terbit" value="<?= htmlspecialchars($data['thn_terbit']) ?>" required placeholder="Tahun Terbit">
        <input type="text" name="nama_penerbit" value="<?= htmlspecialchars($data['nama_penerbit']) ?>" required placeholder="Nama Penulis">
        <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required placeholder="Penerbit">
        <input type="number" name="jumlah_hlmn" value="<?= htmlspecialchars($data['jumlah_hlmn']) ?>" required placeholder="Jumlah Halaman">
        <input type="number" name="harga" value="<?= htmlspecialchars($data['harga']) ?>" required placeholder="Harga">
        <input type="text" name="gmbar_buku" value="<?= htmlspecialchars($data['gmbar_buku']) ?>" required placeholder="Gambar Buku">

        <input type="submit" name="edit" value="EDIT">
    </form>
</body>
</html>
