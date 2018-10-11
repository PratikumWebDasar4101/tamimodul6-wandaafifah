<?php
session_start();
if(isset($_SESSION["pesan_login"])) {
    $pesan_login = $_SESSION["pesan_login"];
}else {
    $pesan_login = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="proseslogin.php" method="post">
        <h2>Masuk</h2>
        <?php if(isset($_SESSION["pesan_login"])) { ?>
        <p><?php echo $pesan_login; ?></p>
        <?php } ?>
        <table cellpadding="5">
            <tr>
                <th colspan="2" align="left">Username</th>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="username"></td>
            </tr>
            <tr>
                <th align="left" colspan="2">Password</th>
            </tr>
            <tr>
                <td colspan="2"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td align="left"><a href="form.php">form registrasi</a></td>
                <td align="right"><input type="submit" name="submit" value="Masuk"></td>
            </tr>
        </table>
    </form>
</body>
</html>