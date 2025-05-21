<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $thn_terbit = $_POST['thn_terbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $penerbit = $_POST['penerbit'];
    $jumlah_hlmn = $_POST['jumlah_hlmn'];
    $harga = $_POST['harga'];
    $gmbar_buku = $_POST['gmbar_buku'];

    $sql = "INSERT INTO buku(kode_buku, no_buku, judul_buku, thn_terbit, nama_penerbit, penerbit, jumlah_hlmn, harga, gmbar_buku)
            VALUES('$kode_buku','$no_buku','$judul_buku','$thn_terbit','$nama_penerbit','$penerbit','$jumlah_hlmn','$harga','$gmbar_buku')";
    mysqli_query($koneksi, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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

        input[type="number"],
        input[type="text"],
        input[type="date"] {
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

        table {
            width: 100%; /* Lebar penuh */
            border-collapse: collapse; /* Menghilangkan border di antara cell */
            margin-top: 20px; /* Margin atas */
        }

        th, td {
            border: 1px solid #ddd; /* Border */
            padding: 10px; /* Ruang dalam cell */
            text-align: left; /* Posisi teks di kiri */
        }

        th {
            background-color: #ffc5c5; /* Warna latar belakang header */
            color: white; /* Warna teks header */
        }
    </style>
</head>
<body>
    <form action="admin.php" method="post">
        <input type="number" name="kode_buku" placeholder="Kode Buku" required><br>
        <input type="number" name="no_buku" placeholder="No Buku" required><br>
        <input type="text" name="judul_buku" placeholder="Judul Buku" required><br>
        <input type="date" name="thn_terbit" placeholder="Tahun Terbit" required><br>
        <input type="text" name="nama_penerbit" placeholder="Nama Penerbit" required><br>
        <input type="text" name="penerbit" placeholder="Penerbit" required><br>
        <input type="number" name="jumlah_hlmn" placeholder="Jumlah Halaman" required><br>
        <input type="number" name="harga" placeholder="Harga" required><br>
        <input type="text" name="gmbar_buku" placeholder="Gambar Buku" required><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
    <table border="1">
        <tr>
            <th>NO BUKU</th>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>THN TERBIT</th>
            <th>NAMA PENERBIT</th>
            <th>PENERBIT</th>
            <th>JUMLAH HLMN</th>
            <th>HARGA</th>
            <th>GMBAR</th>
            <th>AKSI</th>
        </tr>
        <?php
        $mysqli_query = mysqli_query($koneksi, "SELECT * FROM buku");
        while ($data = mysqli_fetch_array($mysqli_query)) {
            ?>
            <tr>
                <td><?= $data['no_buku']; ?></td>
                <td><?= $data['kode_buku']; ?></td>
                <td><?= $data['judul_buku']; ?></td>
                <td><?= $data['thn_terbit']; ?></td>
                <td><?= $data['nama_penerbit']; ?></td>
                <td><?= $data['penerbit']; ?></td>
                <td><?= $data['jumlah_hlmn']; ?></td>
                <td><?= $data['harga']; ?></td>
                <td><img src="<?= $data['gmbar_buku']; ?>" alt="cover" width="80px"></td>
                <td>
                    <a href="edit.php?no_buku=<?= $data['no_buku']; ?>">EDIT</a>
                    <a href="hapus.php?no_buku=<?= $data['no_buku']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
