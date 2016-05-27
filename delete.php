<?
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");


    $ID = mysqli_real_escape_string($link, $_POST['data']);
    $sql = "Delete * FROM `ProjEnd_text` WHERE `ID` = '".$ID."'";
    $querysql = mysqli_query($link,$sql);

?>