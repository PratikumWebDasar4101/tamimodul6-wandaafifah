<?php 
session_start();
require_once("db.php");

$id = $_POST["id"];
$judul = $_POST["judul"];
$isi = $_POST["isi"];

$sql = "UPDATE posting SET judul='$judul', isi='$isi' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: daftarposting.php");
}else {
    echo "Gagal" . $sql . "<br>" . mysqli_error($conn);
}
?>