<?php
include('koneksi.php');

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM user WHERE user_id=$id");

header('Location: superadmin.php');
?>

body {
  background-color: #f3e8ff; /* very light purple background */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #5a3e85; /* medium-dark purple text */
  margin: 0;
  padding: 20px;
}

h1, h2, h3, h4, h5, h6 {
  color: #7e57c2; /* moderate purple for headings */
}

a {
  color: #9c78d6; /* soft light purple for links */
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
  color: #6f4bb7; /* darker purple on hover */
}

button, input[type="submit"], .btn {
  background-color: #b3a1f6; /* gentle light purple button */
  border: none;
  color: white;
  padding: 10px 16px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover, input[type="submit"]:hover, .btn:hover {
  background-color: #8e72d2; /* darker purple on hover */
}
