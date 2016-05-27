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
            <div id="showid"><?
                echo "ID : ";
                echo $_SESSION['SESSION'];
                echo " ";
                ?>
            </div>
            <div id="title">
                <input type="text" id="title-text" placeholder="Title">
            </div>
            <div id="button-save">
                <button type="submit" class="btn-primary" id="save-button" onclick="
                var savebutton =confirm('Do you want to save?');
                if(savebutton==true){
                    $('#save-button').click(function(){
                        $.post('savetext.php',{
                            title: $('#title-text').val(),
                            content: $('#htmlCode').val(),
                            submit: 'onclick'
            },function (){

            }
            )
            })
                }else{

                }
                ">Save
                </button>
            </div>
            <div id="buttonDiv">
                <button id="runButton" class="btn-success">Run</button>
            </div>
            <div class="btn-group" id="toggles" style="margin-left: 15px;margin-top: 2px">
                <button class="btn btn-primary toggle">HTML</button>
                <button class="btn btn-primary toggle">CSS</button>
                <button class="btn btn-primary toggle">Result</button>
            </div>
        </div>
        <div class="clear"></div>
        <div class="codeContainer" id="HTMLContainer">
            <div class="codeLable">HTML</div>
            <textarea id="htmlCode"></textarea>
        </div>
        <div class="codeContainer" id="CSSContainer">
            <div class="codeLable">CSS</div>
            <textarea id="cssCode"></textarea>
        </div>
        <div class="codeContainer" id="ResultContainer">
            <div class="codeLable">Result</div>
            <iframe id="resultFrame"></iframe>
        </div>
    </div>
</div>
<script>
    var windowHeight = $(window).height();
    var menuBarHeight = $("#menuBar").height();
    var codeContainerHeight = windowHeight - menuBarHeight - 1;
    $(".codeContainer").height(codeContainerHeight + "px");
    $(".toggle").click(function () {
        $(this).toggleClass("selected");

        var activeDiv = $(this).html();

        $("#" + activeDiv + "Container").toggle();


        var showingDivs = $(".codeContainer").filter(function () {
            return ($(this).css("display") != "none");
        }).length;

        var width = 100 / showingDivs;

        $(".codeContainer").width(width + "%");
    });

    $("#runButton").click(function () {
        $("iframe").contents().find("html").html('<style>' + $("#cssCode").val() + '</style>' + $("#htmlCode").val());
        //document.getElementById("resultFrame").contentWindow.eval($("#jsCode").val());
    });

    var htmlCode = document.getElementById('htmlCode');
    var cssStyle = document.getElementById('cssCode');

    htmlCode.onkeyup = htmlCode.onkeypress = htmlCode.onkeydown = cssStyle.onkeyup = cssStyle.onkeypress = htmlCode.onkeydown = function () {
        $("iframe").contents().find("html").html('<style>' + $("#cssCode").val() + '</style>' + $("#htmlCode").val());
    }
    $('#logoutcode').click(function () {
        $.get("logout.php", function () {
            location.assign("index.php");
        });
    })
    $('#save-button').click(function () {
        event.preventDefault();
        if ($('#title-text').val().length==0){
            alert("กรุณาใส่หัวเรื่อง")
        }else{
        $.post("savetext.php", {
                title: $('#title-text').val(),
                content: $('#htmlCode').val(),
                submit: "onclick"
            }, function () {

            }
        )
        }
    })


</script>
</body>
</html>
