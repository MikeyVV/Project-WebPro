<?
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");


    $ID = mysqli_real_escape_string($link, $_POST['ID']);
    $sql = "SELECT `Content` FROM `ProjEnd_text` WHERE `Titte` = '".$ID."";
    $row = mysqli_query($link,$sql);
    echo "<script>
        alert($row)
    </script>";
?>


