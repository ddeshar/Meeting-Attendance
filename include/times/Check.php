<?php
    include_once dirname($_SERVER['PHP_SELF']) .'/include/function.php';

    if (isset($_POST["check"])) {
        $check = $_POST["check"];
        $q_member = "SELECT
                        wats.wat_name,
                        positions.position_name,
                        members.nationalid,
                        members.`name`,
                        members.chaya,
                        members.lastname,
                        members.photo,
                        members.position,
                        members.wat
                    FROM
                        members
                    INNER JOIN positions ON members.position = positions.position_id
                    INNER JOIN wats ON members.wat = wats.wat_id
                    WHERE `nationalid` = '$check'";
        $result = mysqli_query($conn, $q_member);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $nationalid = $row["nationalid"];
        
        if ($check == $nationalid) {
            $name = $row["name"] ." ".$row["chaya"]." ".$row["lastname"];
            $photo = $row["photo"];
            $wat = $row["wat_name"];
            $position = $row["position_name"];
            $date = date("D M d, Y G:i");

                // Code for sending message on line
                $message = $mesg."\n".'ชื่อ: '.$name."\n".'วัด: '.$wat."\n".'ตำแหน่ง: '.$position."\n".'มาแล้ครับผม: '."\n".'เวลา: '.$date;
                sendlinemesg();
                // header('Content-Type: text/html; charset=utf-8');
                $res = notify_message($message);	

            $sql = "INSERT INTO `time` (`members_nationalid`, `date`) VALUES ('$check', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                $status = "OK";
            }else{
                $status = "NO";
                die("Query Failed" . mysqli_error($conn));
            }
        } else {
            $test = "Sorry you dont have data on our database";
        }
    }

?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
        <h3 class="card-title">Scan Card</h3>
        <div class="card-body">
        <?=$check?>55
        
        <?=$test?>
        <?=$status?>
            <form action="" method="post">
                <input type="text" name="check" class="form-control" placeholder="Search" autofocus />
            </form>
            <br>
            <div class="profile">
                <div class="info">
                    <img class="user-img" src="assets/images/<?=$photo?>" width="100px">
                    <h4><?=$name?></h4>
                    <p><?=$wat?></p>
                    <p><?=$position?></p>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

