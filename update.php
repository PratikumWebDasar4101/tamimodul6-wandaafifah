<?php
session_start();
require_once("db.php");

$nama = $_POST["nama"];
$nim = $_POST["nim"];
$kelas = $_POST["kelas"];
$jk = $_POST["jk"];
$hobi = $_POST["hobi"];
$fakultas = $_POST["fak"];
$alamat = $_POST["alamat"];

$conn = "UPDATE user SET nama='$nama', kelas='$kelas', jk='$jk', hobi='" . implode(",",$hobi) . "', fakultas='$fakultas', alamat='$alamat' WHERE nim='$nim'";

if (mysqli_query($conn, $conn)) {
    mysqli_close($conn);
    $_SESSION["user_nama"] = $nama;
    echo "Data berhasil diperbarui";
    echo "<a href='logout.php'>Logout</a> | <a href='index.php'>Index</a>";
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>