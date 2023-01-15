<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../index.php?message=Sampai jumpa lagi");
}

if (!isset($_SESSION['status'])) {
    header("Location: ../index.php?message=Silahkan login terlebih dahulu broww");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>

<body>
    <div>
        <section>
            <h3>Hallo <?php echo $_SESSION['fullname']; ?></h3>
            <p>Status Pegawai : <?php echo $_SESSION['role']; ?></p>
            <br>
            <?php
            if (isset($_GET['message'])) {
                echo $_GET['message'];
            }
            ?>
            <!-- Table Absen -->
            <?php include("absensi.php") ?>
            <br>

            <form action="" method="post">
                <button name="logout" type="submit">Logout</button>
            </form>
        </section>
    </div>
</body>

</html>