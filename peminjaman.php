<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "perpustakaan";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_peminjam = $_POST['nama_peminjam'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Validasi sederhana
    if ($nama_peminjam && $judul_buku && $tanggal_pinjam && $tanggal_kembali) {
        $sql = "INSERT INTO peminjaman (nama_peminjam, judul_buku, tanggal_pinjam, tanggal_kembali)
                VALUES ('$nama_peminjam', '$judul_buku', '$tanggal_pinjam', '$tanggal_kembali')";

        if ($conn->query($sql) === TRUE) {
            $message = "Peminjaman berhasil disimpan!";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Harap isi semua data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d3e0; /* Light pink background */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #d5006d; /* Darker pink for the heading */
        }
        form {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color: #d5006d; /* Darker pink for labels */
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #d5006d; /* Darker pink border */
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #d5006d; /* Darker pink for the button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #c4005a; /* Darker shade on hover */
        }
        p {
            color: #d5006d; /* Darker pink for messages */
        }
    </style>
</head>
<body>
    <h2>Form Peminjaman Buku</h2>
    
    <?php if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>

    <form method="POST" action="">
        <label>Nama Peminjam:</label><br>
        <input type="text" name="nama_peminjam" required><br>

        <label>Judul Buku:</label><br>
        <input type="text" name="judul_buku" required><br>

        <label>Tanggal Pinjam:</label><br>
        <input type="date" name="tanggal_pinjam" required><br>

        <label>Tanggal Kembali:</label><br>
        <input type="date" name="tanggal_kembali" required><br>

        <input type="submit" value="Simpan Peminjaman">
    </form>
</body>
</html>
