<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan";

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_peminjaman = $_POST["id_peminjaman"];
    $tanggal_pengembalian = date("Y-m-d");

    
    $cek = $conn->query("SELECT * FROM peminjaman WHERE id = '$id_peminjaman' AND status != 'Dikembalikan'");
    if ($cek->num_rows > 0) {
      
        $conn->query("INSERT INTO pengembalian (id_peminjaman, tanggal_pengembalian) VALUES ('$id_peminjaman', '$tanggal_pengembalian')");
        
       
        $conn->query("UPDATE peminjaman SET status = 'Dikembalikan' WHERE id = '$id_peminjaman'");
        $pesan = "⚠ ID Peminjaman tidak ditemukan atau sudah dikembalikan.";
    } else {
        $pesan = "✅ Buku berhasil dikembalikan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
    <style>
        body {
            background-color: #ffcccb; /* Warna pink muda */
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #d5006d; /* Warna teks judul */
        }
        p {
            font-weight: bold;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #d5006d;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #d5006d; /* Warna tombol */
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #c51162; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    <h2>Form Pengembalian Buku</h2>

    <?php if ($pesan != "") { echo "<p>$pesan</p>"; } ?>

    <form method="POST" action="">
        <label for="id_peminjaman">ID Peminjaman:</label>
        <input type="number" name="id_peminjaman" required>

        <input type="submit" value="Kembalikan Buku">
    </form>
</body>
</html>
