<?php
session_start();
require_once("db.php");

$nim = $_SESSION["user_nim"];

$sql = "SELECT id, judul, isi, gambar FROM posting";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Semua Post</title>
</head>
<body>
<header>
    <table align="center">
    <td align="center">
    <a href="index.php">Awal</a> -
    <a href="daftarposting.php">Daftar Posting</a> - 
    <a href="semuaposting.php">Semua Posting</a> - 
    <a href="editprofil.php">Edit Profil</a> - 
    <a href="posting.php">Post</a> - 
    <a href="logout.php">Logout</a>
    </td>
    </table>
    </header>
    <table width="70%" align="center" border=1 cellpadding="6" style="border-collapse: collapse;">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Gambar</th>
        </tr>
    <?php 
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while($i < mysqli_num_rows($result)) {   
            $row = mysqli_fetch_assoc($result);    
    ?>
        <tr>
            <td>
            <?php 
                echo $i+1 . ".";
            ?>
            </td>
            <td><b><?php echo $row["judul"] ?></b></td>
            <td><?php echo implode(" ",array_slice(explode(" ",$row["isi"]), 0, 5)) . "..." ?></td>
            <td align="center"><img height="60px" width="100px" border="1" src="uploads/<?php echo $row['gambar'] ?>" alt=""></td>
        </tr>
    <?php 
        $i++;
        }
    }else {
    ?>
        <tr>
            <td colspan="4" align="center">0 results.</td>
        </tr>
    <?php
    }
    ?>
    </table>
</body>
</html>