<?php
session_start();
require_once("db.php");

$id = $_GET["post_id"];
$sql = "DELETE FROM posting WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: daftarposting.php");
}else {
    echo "Gagal";
}
?>