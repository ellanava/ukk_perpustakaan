<?php
session_start();
include('koneksi.php');

// Tambah user
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')");
}

// Ambil data user
$data_user = mysqli_query($koneksi, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen User</title>
    <style>
        body {
            background-color: #ffc5c5; /* Warna latar belakang pink muda */
            font-family: Arial, sans-serif; /* Font yang digunakan */
        }

        h2 {
            text-align: center; /* Posisi teks di tengah */
            margin-bottom: 20px; /* Margin bawah */
        }

        form {
            background-color: white; /* Warna latar belakang form */
            padding: 20px; /* Ruang dalam form */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
            width: 50%; /* Lebar form */
            margin: 0 auto; /* Margin atas dan bawah, serta posisi form di tengah */
        }

        input[type="text"],
        select {
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
            margin: 20px auto; /* Margin atas dan bawah, serta posisi tabel di tengah */
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

        a {
            text-decoration: none; /* Menghilangkan garis bawah */
            color: blue; /* Warna teks link */
        }

        a:hover {
            color: red; /* Warna teks link saat hover */
        }
    </style>
</head>
<body>
   <h2>Tambah User</h2>
    <form action="superadmin.php" method="post">
        <input type="text" name="username" placeholder="username" required>
        <input type="text" name="password" placeholder="password" required>
        <select name="role">
            <option value="user">user</option>
            <option value="admin">admin</option>
            <option value="superadmin">superadmin</option>
        </select>
        <input type="submit" name="tambah" value="TAMBAH">
    </form>

    <h2>Data User</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($data_user)) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['role'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['user_id'] ?>">Edit</a> | 
                <a href="hapus_user.php?id=<?= $row['user_id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="login.php">keluar</a>
</body>
</html>
