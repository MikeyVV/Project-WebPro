<?php
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");
if($_SESSION['SESSION']){
   echo " <script> location.assign('CodeRunner.php') </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Code Runner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container" >
    <div class="row" id="login" style="margin-top: 20vh;display: block">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background-color: #3498DB">
            <form role="form">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Login</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn-danger pull-right" type="button" id="button-to-regist">Go To Registrar</button>
                    </div>
                </div>
            </form>
            <form role="form" id="form-login">
            <div class="form-group">
                <label for="login-name">ID</label>
                <input type="text" class="form-control" placeholder="username" id="login-name">

            </div>
            <div class="form-group">
                <label for="login-pass">Password</label>
                <input type="password" class="form-control"  placeholder="password" id="login-pass">
            </div>
                <br>
            <input type="submit" id="login-button" class="btn btn-primary btn-large btn-block" value="Login">
                <br>
            <a  onclick = "alert('ค่อยๆคิดดู')" style="color: snow" >Lost your password?</a>
        </div>
        </form>
        <div class="col-md-4"></div>
    </div>
    <div class="row" id="regist" style="margin-top: 20vh;display: none ">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background-color: #ff7f72">
            <form role="form">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Registrar</h1>
                </div>
                <div class="col-sm-6">
                    <button class="btn-primary pull-right" type="button" id="button-to-back">Back to Login</button>
                </div>
            </div>
            </form>
            <form role="form" id="form-regist">
                <div class="form-group">
                    <label for="regist-name">ID</label>
                    <input type="text" class="form-control" placeholder="username" id="regist-name">

                </div>
                <div class="form-group">
                    <label for="regist-pass">Password</label>
                    <input type="password" class="form-control"  placeholder="password" id="regist-pass">
                </div>
                <div class="form-group">
                    <label for="regist-repass">Re-Password</label>
                    <input type="password" class="form-control"  placeholder="password" id="regist-repass">
                </div>
                <div class="form-group">
                    <label for="regist-email">Email</label>
                    <input type="email" class="form-control"  placeholder="email" id="regist-email">
                </div>
                <br>
                <input type="submit" id="regist-button" class="btn btn-primary btn-large btn-block" style="background-color:#ff3f38 " value="Registrar">
                <br>

        </div>
        </form>
        <div class="col-md-4"></div>
    </div>
</div>

<script>
    $('#form-login').submit(function(event){
        event.preventDefault();
        if ($('#login-name').val().length==0&&$('#login-pass').val().length==0) {
            alert("ขอความกรุณาใส่ไอดีและรหัสผ่านของท่านด้วย")
        }else if ($('#login-name').val().length==0){
            alert("ขอความกรุณาใส่ไอดีของท่านด้วย")
        }else if ($('#login-pass').val().length==0){
            alert("ขอความกรุณาใส่รหัสผ่านของท่านด้วย")
        }else {
            $.post("login.php",
                {
                    username: $('#login-name').val(),
                    password: $('#login-pass').val(),
                    submit: "onclick"
                },
                function(data,status){
                    if(status!="success"){
                        alert("เชิฟเวอร์ล้มเหลว");
                    }else if(data=="wrong"){
                        alert("ไอดีหรือรหัสผิดพลาดขอความกรุณาใส่กรอกอีกครั้ง");
                    }else{
                        location.assign("CodeRunner.php");
                    }
                }
                    );
        }
    })
    $('#form-regist').submit(function(event){
        event.preventDefault();
        var sub = "";
        if ($('#regist-name').val().length==0){
            sub+="ขอความกรุณาใส่ไอดีของท่านด้วย\n"
        }if ($('#regist-pass').val().length==0) {
             sub+="ขอความกรุณาใส่รหัสผ่านของท่านด้วย\n"
        }if($('#regist-email').val().length==0){
            sub+="ขอความกรุณาใสอีเมลของท่านด้วย\n"
        }if ($('#regist-repass').val()!=$('#regist-pass').val()){
            sub+="ขอความกรุณาใส่รหัสผ่านให้ตรงกัน\n"
        }if(sub != ""){

            alert(sub)
        }
        else {
            $.post("Regist.php",
                {
                    reusername: $('#regist-name').val(),
                    repassword: $('#regist-pass').val(),
                    reemail: $('#regist-email').val(),
                    resubmit: "onclick"
                },
                function(data,status){
                    if(status!="success"){
                        alert("เชิฟเวอร์ล้มเหลว");
                    }else if(data=="ok"){
                        alert("ลงทะเบียนสำเร็จเรียบร้อย");
                        location.assign("index.php");
                    }else if(data=="same"){
                        alert("มีไอดีอยู่ในระบบอยู่แล้ว")
                    }
                }
            );
        }
    })
    $('#button-to-back').click(function(){
        $('#regist').css("display","none");
        $('#login').css("display","block");

    })
    $('#button-to-regist').click(function(){
        $('#login').css("display","none");
        $('#regist').css("display","block");

    })
</script>

</body>


</html>
