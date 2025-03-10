<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL kamu
$pass = ""; // Kosongkan jika pakai XAMPP
$dbname = "arnolt_porto"; // Nama database yang dibuat tadi

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Email Send!</p>";
    } else {
        echo "<p style='color:red;'>G!</p>";
    }
    $stmt->close();
}

$conn->close();
?>
