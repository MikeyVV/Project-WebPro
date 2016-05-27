<?
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");
$ID = mysqli_real_escape_string($link, $_POST['id']);
$sql = "DELETE FROM `it57160171`.`ProjEnd_text` WHERE `ProjEnd_text`.`ID` = '".$ID."'" ;
$query = mysqli_query($link, $queryString);

?>