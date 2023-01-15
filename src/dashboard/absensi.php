<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Performa</th>
    </tr>
    <?php
    include("../connection.php");
    date_default_timezone_set('Asia/Jakarta');

    $tgl = date('Y-m-d');
    $clock = date('H:i:s');
    $employee_id = $_SESSION['employee_id'];

    $sql = "SELECT * FROM attendances WHERE employee_id = $employee_id";
    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['tgl'] . "</td>";
        echo "<td>" . $row['clock_in'] . "</td>";

        if(empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']){
            echo "<td>
            <form action='' method='POST' onsubmit='return alert(`Terima kasih sudah bekerja hari ini`)'>
            <button type='submit' name='keluar'>Keluar</button>
            </form>
            </td>";
        }else{
            echo "<td>" . $row['clock_out'] . "</td>";
        }

        echo "<td> 🥰 </td>";
        echo "</tr>";
    }
    ?>
</table>

<form action="action.php" method="post">
    <button type="submit" name="absen">Absen Sekarang</button>
</form>

<?php 
if(isset($_POST['keluar'])){
    $update = "UPDATE attendances SET clock_out = '$clock' WHERE employee_id = $employee_id AND tgl = '$tgl'";

    $result = $db->query($update);
    if ($result == TRUE) {
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }
}

?>