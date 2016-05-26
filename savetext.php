<?
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");
if($_POST['submit']=="onclick"){
    $titte = mysqli_real_escape_string($link, $_POST['title']);
    $content = mysqli_real_escape_string($link, $_POST['content']);
    $user = $_SESSION['SESSION'];
    $sql = "INSERT INTO `it57160171`.`ProjEnd_text` (`ID`, `user`, `Titte`, `Content`, `DATE`) VALUES (NULL, '$user', '$titte', '$content', CURRENT_TIMESTAMP);";
    $querysql = mysqli_query($link,$sql);
}
?>