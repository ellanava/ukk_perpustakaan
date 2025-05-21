<?php
include('koneksi.php');

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', role='$role' WHERE user_id=$id");
    header('Location: superadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #6a1b9a; /* Darker shade of light purple */
            text-align: center;
        }
        form {
            background: #e1bee7; /* Light purple background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #9c27b0; /* Purple */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #7b1fa2; /* Darker purple on hover */
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required placeholder="Username">
        <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required placeholder="Password">
 
        <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>user</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="superadmin" <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>superadmin</option>
        </select>
        <input type="submit" name="update" value="UPDATE">
    </form>
</body>
</html>
