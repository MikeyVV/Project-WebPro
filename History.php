<?php
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");
if (!$_SESSION['SESSION']) {
    echo "<script> location.assign('index.php');</script>";
}

?>
<!doctype html>
<html>
<head>
    <title>CodeRunner</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!--CSS-->

    <!--script-->
    <script src="Script/jquery-2.1.4.min.js"></script>
    <!--script-->

</head>
<body>
<div class="container-fluid">
    <div id="wrapper">
        <div id="menuBar">
            <input id="toggle" type="checkbox"><label for="toggle"></label>
            <div class="slide-menu">
                <h1>Menu</h1>
                <nav class="menu">
                    <li><a href="http://angsila.cs.buu.ac.th/~57160171/887371/EndProject/CodeRunner.php">Home</a></li>
                    <li><a href="http://angsila.cs.buu.ac.th/~57160171/887371/EndProject/History.php">History</a></li>
                    <li><a href="#">Download-DATABASE</a></li>
                    <li><a href="#"><button type='button' class="btn-link" style="color: white" id='logoutcode' >Logout</button></a> </li>
                </nav>
            </div>
            <div id="logo">CodeRunner</div>
            <form id="form-search">
            <div id="showid"><?
                echo "ID : ";
                echo $_SESSION['SESSION'];
                echo " ";
                ?>

                <input type="search" id="serach-input" placeholder="Title">
                <button type="submit">ค้นหา</button>
            </div>
            </form>

    </div>
</div>
    <div class="row" id="showseach">

    </div>
    </div>
</body>
<script>
    $('#form-search').submit(function(event){
        event.preventDefault();
        var search = $('#serach-input').val();
        var url = "showseach.php?search="+search;
        $('#showseach').load(url);
    });
</script>
</html>