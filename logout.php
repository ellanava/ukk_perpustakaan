<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Jika sesi menggunakan cookie, hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <meta http-equiv="refresh" content="2;url=login.php">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffcccb; /* Warna pink muda */
            text-align: center;
            padding-top: 100px;
        }
        .message {
            background-color: #ffffff; /* Warna latar belakang pesan */
            display: inline-block;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message h2 {
            color: #d5006d; /* Warna teks judul */
        }
        .message p {
            color: #333333; /* Warna teks paragraf */
        }
    </style>
</head>
<body>
    <div class="message">
        <h2>Anda telah berhasil logout.</h2>
        <p>Anda akan diarahkan ke halaman login dalam 2 detik.</p>
    </div>
</body>
</html>
