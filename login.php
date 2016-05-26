<?
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");

if($_POST['submit']=="onclick"){

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $password = "zamasu" . (hash("sha256", $password));
    $sql = "SELECT * FROM `ProjEnd_id` WHERE `ID_REG` = '".$username."' AND `PASS_REG` = '".$password."'";
    $querysql = mysqli_query($link,$sql);
    if(mysqli_num_rows($querysql) == 1){
        $_SESSION['SESSION']=$username;
    }
    else {
        echo ("wrong");
    }
}
?>