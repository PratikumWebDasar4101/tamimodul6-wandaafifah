<?php
require_once("db.php");
session_start();

if(isset($_SESSION["user_nim"])) {
	$nim = $_SESSION["user_nim"];
    $sql = "SELECT * FROM user WHERE nim=$nim";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
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
<form action="update.php" method="post">
        <table>
			<tr>
				<td>Edit Profil</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
                    <input type="text" name="nama" value="<?php echo $row["nama"] ?>">
                    <?php if(isset($_SESSION["pesan_nama"])) { ?>
                    <p><?php echo $pesan_nama ?></p>
                    <?php } ?>
                </td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>
                    <input type="text" value="<?php echo $row["nim"] ?>" disabled>
                </td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<input type="radio" name="kelas" value="1" <?php if($row["kelas"] == 1):echo "checked"; endif ?>>01
					<input type="radio" name="kelas" value="2" <?php if($row["kelas"] == 2):echo "checked"; endif ?>>02
					<input type="radio" name="kelas" value="3" <?php if($row["kelas"] == 3):echo "checked"; endif ?>>03
					<input type="radio" name="kelas" value="4" <?php if($row["kelas"] == 4):echo "checked"; endif ?>>04
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
					<input type="radio" name="jk" value="laki-laki" <?php if($row["jeniskelamin"] == "laki-laki"):echo "checked"; endif ?>>Laki-laki
					<input type="radio" name="jk" value="perempuan" <?php if($row["jeniskelamin"] == "perempuan"):echo "checked"; endif ?>>Perempuan
				</td>
			</tr>
			<tr>
				<td>Hobi</td>
                <?php $hobi = explode(",",$row["hobi"]); ?>
				<td>
					<input type="checkbox" name="hobi[]" value="Olahraga" <?php if(in_array("Olahraga",$hobi)):echo "checked"; endif ?>>Olahraga
					<input type="checkbox" name="hobi[]" value="Membaca" <?php if(in_array("Membaca",$hobi)):echo "checked"; endif ?>>Membaca
					<input type="checkbox" name="hobi[]" value="Menulis" <?php if(in_array("Menulis",$hobi)):echo "checked"; endif ?>>Menulis
					<input type="checkbox" name="hobi[]" value="Bercerita" <?php if(in_array("Bercerita",$hobi)):echo "checked"; endif ?>>Bercerita
					<input type="checkbox" name="hobi[]" value="Berkomedi" <?php if(in_array("Berkomedi",$hobi)):echo "checked"; endif ?>>Berkomedi<br>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>
					<select name="fak">
						<option <?php if($row["fakultas"] == "Ilmu Terapan"):echo "selected";endif ?>>Ilmu Terapan</option>
						<option <?php if($row["fakultas"] == "Informatika"):echo "selected";endif ?>>Informatika</option>
						<option <?php if($row["fakultas"] == "Teknik Elektro"):echo "selected";endif ?>>Teknik Elektro</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" id="" cols="26" rows="1"><?php echo $row["alamat"] ?></textarea></td>
			</tr>
			<tr>
                <input type="hidden" name="nim" value="<?php echo $row["nim"] ?>">
				<td><input type="submit" name="submit" value="Kirim"></td>
			</tr>
        </table>
    </form>
</body>
</html>
<?php 
}else {
    echo "Belum Membuat Akun";
} ?>