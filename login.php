<?php
session_start();
include('koneksi.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        if ($data['role'] == 'user') {
            header('Location: index.php');
            exit();
        } else if ($data['role'] == 'admin') {
            header('Location: admin.php');
            exit();
        } else {
            header('Location: superadmin.php');
            exit();
        }
    } else {
        echo 'LOGIN GAGAL';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LOGIN</title>
    <style>
        body {
            background-color: pink; /* Warna latar belakang pink */
            font-family: Arial, sans-serif; /* Font yang digunakan */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengatur tinggi halaman */
            margin: 0; /* Menghilangkan margin default */
        }

        .box {
            background-color: white; /* Warna latar belakang form */
            padding: 20px; /* Ruang dalam form */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; /* Lebar penuh */
            padding: 10px; /* Ruang dalam input */
            margin: 10px 0; /* Margin atas dan bawah */
            border: 1px solid #ccc; /* Border */
            border-radius: 4px; /* Sudut membulat */
        }

        input[type="submit"] {
            background-color: pink; /* Warna tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghilangkan border */
            padding: 10px; /* Ruang dalam tombol */
            border-radius: 4px; /* Sudut membulat */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
        }

        input[type="submit"]:hover {
            background-color: #ff69b4; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="login.php" method="post" novalidate>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
</body>
</html>
