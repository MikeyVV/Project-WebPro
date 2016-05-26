<?
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");

if($_POST['resubmit']=="onclick") {
    $username = mysqli_real_escape_string($link, $_POST['reusername']);
    $password = mysqli_real_escape_string($link, $_POST['repassword']);
    $password = "zamasu" . (hash("sha256", $password));
    $email = mysqli_real_escape_string($link, $_POST['reemail']);
    $sql = "SELECT * FROM `ProjEnd_id` WHERE `ID_REG` = '".$username."' ";
    $querysql = mysqli_query($link,$sql);
    if(mysqli_num_rows($querysql) > 0){
        echo "same";
    }else{
    $sql = "INSERT INTO `it57160171`.`ProjEnd_id` (`ID`, `ID_REG`, `PASS_REG`, `EMAIL_REG`) VALUES (NULL, '" . $username . "', '" . $password . "', '" . $email . "')";
    mysqli_query($link,$sql);
    echo "ok";
    }
}
?>