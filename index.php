<?php
session_start();
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>USER</title>
    <style>
        body {
            background-color: #ffc5c5; /* Warna latar belakang pink muda */
            font-family: Arial, sans-serif; /* Font yang digunakan */
        }

        h1 {
            text-align: center; /* Posisi teks di tengah */
            margin-bottom: 20px; /* Margin bawah */
        }

        table {
            width: 100%; /* Lebar penuh */
            border-collapse: collapse; /* Menghilangkan border di antara cell */
            margin: 0 auto; /* Margin atas dan bawah, serta posisi tabel di tengah */
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

        td img {
            width: 80px; /* Lebar gambar */
            height: 100px; /* Tinggi gambar */
            object-fit: cover; /* Mengatur ukuran gambar */
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table>
        <thead>
            <tr>
                <th>KODE BUKU</th>
                <th>NO BUKU</th>
                <th>JUDUL BUKU</th>
                <th>THN TERBIT</th>
                <th>PENULIS</th>
                <th>PENERBIT</th>
                <th>JUMLAH HLMN</th>
                <th>HARGA</th>
                <th>GMBAR BUKU</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM buku");
            if ($sql) {
                while ($data = mysqli_fetch_array($sql)) {
                    $gambar = htmlspecialchars($data['gmbar_buku']);
                    if (empty($gambar)) {
                        $gambar = 'placeholder.jpg';
                    }
        ?>
            <tr>
                <td><?= htmlspecialchars($data['kode_buku']); ?></td>
                <td><?= htmlspecialchars($data['no_buku']); ?></td>
                <td><?= htmlspecialchars($data['judul_buku']); ?></td>
                <td><?= htmlspecialchars($data['thn_terbit']); ?></td>
                <td><?= htmlspecialchars($data['nama_penerbit']); ?></td>
                <td><?= htmlspecialchars($data['penerbit']); ?></td>
                <td><?= htmlspecialchars($data['jumlah_hlmn']); ?></td>
                <td><?= htmlspecialchars($data['harga']); ?></td>
                <td>
                    <img src="<?= $gambar; ?>" alt="Cover Buku" />
                </td>
            </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='9'>Gagal mengambil data dari database.</td></tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
