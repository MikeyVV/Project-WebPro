<?php
session_start();
$link = mysqli_connect("localhost", "it57160171", "0840799660za", "it57160171");



    $search = mysqli_real_escape_string($link, $_GET['search']);
    $id = $_SESSION['SESSION'];
    $sql = "SELECT * FROM `ProjEnd_text` WHERE `Titte` like '%".$search."%' AND `user` = '".$id."'";
    $query = mysqli_query($link,$sql);
    echo "<div class='container'>";
    while($fetch =mysqli_fetch_array($query)){
        if ($num == 3) $num = 0;
        if ($num == 0) {
            echo "<div class='row' style='margin: 20px'> ";
        }
        echo " <div class='col-sm-4 '>
                <div class='box' style='padding: 5px 2px'>
                <button class='btn-link' id='show-titte'><font size='4px'>".$fetch['Titte']." </font></button><br>
                <font>".$fetch['DATE']." </font> <br>
                <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#myModal_".$fetch['ID']."\">Delete</button>
    <!-- Modal -->
        <div id=\"myModal_".$fetch['ID']."\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">ลบข้อมูล</h4>
      </div>
      <div class=\"modal-body\">
        <p>ต้องการลบหรือไม่?</p>
      </div>
      <div class=\"modal-footer\">
        <button type='submit' class=\"btn btn-default\" id='confin' onclick='delete(this,".$fetch['ID'].")'>ใช่</button>
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">ไม่</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>";
        $num++;
        if ($num == 3) {
            echo "</div>";
        }
    }
if ($num < 3) echo "</div>";
echo "</div>";




?>
<script>
    function delete(Del,id){
        var dataset = id;
       $.post("delete.php",
            {
                data: dataset;
            },
    function (){
            location.assign("History.php");
        }
    );
    }

    $('#show-titte').onclick(function(event){
        event.preventDefault();
        $.post("open.php",
            {
                ID: $('#show-titte').val()
            },
            function(data,status){

            }
        );
    }
</script>
