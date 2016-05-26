<?php
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");
if(!$_SESSION['SESSION']){
   echo"<script> location.assign('index.php');</script>";
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
        <div id="logo">CodeRunner</div>
        <div id="showid"><?
            echo "ID : ";
        echo $_SESSION['SESSION'];
           echo" <button type='button' style='background-color: palevioletred' id='logoutcode'>Logout</button>";
            ?>
        </div>
        <div id="title">
            <input type="text" id="title-text" placeholder="Title">
        </div>
        <div id="button-save">
            <button type="submit" class="btn-primary" id="savebutton">Save</button>
        </div>
        <div id="buttonDiv">
            <button id="runButton" class="btn-success">Run</button>
        </div>
        <ul id="toggles">
            <li class="toggle selected">HTML</li>
            <li class="toggle">CSS</li>
            <li class="toggle selected" style="border:none">Result</li>
        </ul>
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
    $(".toggle").click(function(){
        $(this).toggleClass("selected");

        var activeDiv=$(this).html();

        $("#"+activeDiv+"Container").toggle();


        var showingDivs=$(".codeContainer").filter(function(){
            return($(this).css("display")!="none");
        }).length;

        var width=100/showingDivs;

        $(".codeContainer").width(width+"%");
    });

    $("#runButton").click(function(){
        $("iframe").contents().find("html").html('<style>'+$("#cssCode").val()+'</style>'+$("#htmlCode").val());
        //document.getElementById("resultFrame").contentWindow.eval($("#jsCode").val());
    });

    var htmlCode = document.getElementById('htmlCode');
    var cssStyle = document.getElementById('cssCode');

    htmlCode.onkeyup = htmlCode.onkeypress = htmlCode.onkeydown = cssStyle.onkeyup = cssStyle.onkeypress = htmlCode.onkeydown = function(){
        $("iframe").contents().find("html").html('<style>'+$("#cssCode").val()+'</style>'+$("#htmlCode").val());
    }
    $('#logoutcode').click(function(){
        $.get("logout.php",function(){
            location.assign("index.php");
        });
    })
    $('#savebutton').click(function(){
        $.post("savetext.php",{
                title: $('#title-text').val(),
                content: $('#htmlCode').val(),
                submit: "onclick"
        },function (){

        }
        )
    })


</script>
</body>
</html>
