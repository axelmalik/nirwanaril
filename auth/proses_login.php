<?php 

session_start();

include("koneksi.php");

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nama_admin = $_POST['nama_admin'];
$password = $_POST['password'];

// SQL query to check login credentials
$sql = "SELECT * FROM admin WHERE nama_admin='$nama_admin' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['nama_admin'] = $row['nama_admin']; 
    $_SESSION['nip_admin'] = $row['nip_admin'];  // Store nip_admin in the session
    header("Location: ../index.php"); 
    exit(); 
} else { 
    echo "Login gagal. <a href='../login.php'>Coba lagi</a>"; 
}

$conn->close(); 
?>
