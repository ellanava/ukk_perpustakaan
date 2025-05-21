<?php
session_start();
include('koneksi.php');

$message = "";
if(isset($_GET['no_buku'])){
    $id = $_GET['no_buku'];

    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE no_buku= '$id'");

    if($delete){
        $message = "Buku dengan No Buku $id berhasil dihapus.";
    } else {
        $message = "Gagal menghapus buku dengan No Buku $id.";
    }
} else {
    $message = "No Buku tidak ditemukan.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="refresh" content="3;url=admin.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hapus Buku</title>
    <style>
        /* Custom Light Purple Theme for phpMyAdmin */

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f6fb;
    color: #4b3b56;
    margin: 0;
    padding: 0;
}

/* Top Navigation Bar */
#topmenu {
    background-color: #b39ddb; /* light purple */
    border-bottom: 3px solid #9575cd; /* medium purple */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

#topmenu ul li a {
    color: #ede7f6 !important; /* very light purple/white */
    font-weight: 600;
    padding: 12px 18px;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

#topmenu ul li a:hover,
#topmenu ul li a.active {
    background-color: #9575cd !important; /* medium purple */
    color: #ede7f6 !important;
}

/* Sidebar */
#pma_navigation {
    background-color: #d1c4e9; /* lighter purple */
    color: #4b3b56;
    padding: 10px;
    border-right: 3px solid #9575cd;
}

#pma_navigation h2 {
    color: #4b3b56;
    font-weight: 700;
    margin-bottom: 15px;
}

#pma_navigation ul li a {
    color: #6a5495;
    padding: 8px 12px;
    display: block;
    border-radius: 4px;
    margin-bottom: 5px;
    transition: background-color 0.3s ease;
}

#pma_navigation ul li a:hover,
#pma_navigation ul li a.active {
    background-color: #9575cd;
    color: #ede7f6;
}

/* Main Content */
#page_content {
    background-color: #ffffff;
    padding: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 6px;
    margin: 20px;
}

/* Tables */
table {
    border-collapse: collapse;
    width: 100%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border-radius: 6px;
    overflow: hidden;
}

th {
    background-color: #9575cd;
    color: #ede7f6;
    font-weight: 600;
    padding: 12px 15px;
    text-align: left;
}

td {
    padding: 12px 15px;
    border-bottom: 1px solid #f1eaff;
    color: #4b3b56;
}

/* Alternate row colors */
table tr:nth-child(even) {
    background-color: #f3eafa;
}

/* Buttons */
a.my_button, input[type="submit"], button {
    background-color: #b39ddb;
    color: #4b3b56;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

a.my_button:hover, input[type="submit"]:hover, button:hover {
    background-color: #9575cd;
    color: #ede7f6;
}

/* Form inputs */
input[type="text"], input[type="password"], select, textarea {
    border: 1px solid #c5b0e0;
    padding: 8px 10px;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
    font-size: 14px;
    transition: border-color 0.3s ease;
    color: #4b3b56;
}

input[type="text"]:focus, input[type="password"]:focus, select:focus, textarea:focus {
    border-color: #9575cd;
    outline: none;
    background-color: #f3eafa;
}

/* Alerts and messages */
.message {
    background-color: #e1bee7;
    color: #4b3b56;
    padding: 12px 20px;
    border-radius: 4px;
    margin-bottom: 20px;
    border: 1px solid #ce93d8;
}

/* Scrollbars for better visibility */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f8f6fb;
    border-radius: 6px;
}

::-webkit-scrollbar-thumb {
    background: #9575cd;
    border-radius: 6px;
}

::-webkit-scrollbar-thumb:hover {
    background: #6a5495;
}


