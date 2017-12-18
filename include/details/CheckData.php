<?php
    // include_once dirname($_SERVER['DOCUMENT_ROOT']) .'/meeting/include/function.php';  // for server
    include_once dirname($_SERVER['PHP_SELF']) .'/include/function.php'; // For local


    if (isset($_POST["check"])) {
        $check = $_POST["check"];
        $pid = $_POST["pid"];
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

            $sql = "INSERT INTO `time` (`members_nationalid`, `date_scan`,`detail_id`) VALUES ('$check', CURRENT_TIMESTAMP, '$pid')";
            // echo $sql; exit;
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Code for sending message on line
                $message = $mesg."\n".'ชื่อ: '.$name."\n".'วัด: '.$wat."\n".'ตำแหน่ง: '.$position."\n".'มาแล้ครับผม: '."\n".'เวลา: '.$date;
                sendlinemesg();
                // header('Content-Type: text/html; charset=utf-8');
                $res = notify_message($message);
            }else{
                if(mysqli_errno($conn) == 1062)
                       $dublicate = "ท่านสแกนบัตร ซ้ำ <br>";
                    else
                        $error = "db insertion error:".$query."<br>";
            }
        } else {
            $test = "ชื่อท่านยังไม่ได้บันทึกในฐานข้อมูลกรุณติดต่อ เจ้าหน้าที่คัรบผม";
        }
    }

    if(isset($_GET["id"])){
        $detail_id = $_GET["id"];
        $sql = "SELECT * FROM detail WHERE detail_id='$detail_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $pid        = $row["detail_id"];
            $subject    = $row["subject"];
            $agenda     = $row["agenda"];
            $president  = $row["president"];
            $date       = DateThai($row["date"]);
            $note       = $row["note"];
        }else{
            $pid        = "";
            $subject    = "";
            $agenda     = "";
            $president  = "";
            $date       = "";
            $note       = "";;
        }
    }


?>
<div class="row">
  <div class="col-md-9">
    <div class="card">

    <div class="text-center">

        <?php if($dublicate){ ?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-danger">
                    <button class="close" type="button" data-dismiss="alert">×</button><?=$dublicate?>
                </div>
            </div>
        <?php }else if($error){ ?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-danger">
                    <button class="close" type="button" data-dismiss="alert">×</button><?=$error?>
                </div>
            </div>
        <?php }else if($test){ ?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-danger">
                    <button class="close" type="button" data-dismiss="alert">×</button><?=$test?>
                </div>
            </div>
        <?php } ?>

        <h3 class="card-title">การประชุมพระสังฆาธิการ,<br><br> ในเขตปกครองคณะสงฆ์อำเภอเมืองฉะเชิงเทรา </h3>
        <h4>เรื่อง <?=$subject?> </h4>
        <h4>ในวันที่  <?=$date?> </h4>
        <h4>ณ สำนักงานเจ้าคณะอำเภอเมืองฉะเชิงเทรา</h4>
        <h4>วัดบางปรงธรรมโชติการราม ตำบลบางพระ อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา</h4>
    </div>

        <div class="card-body">
             <form action="" method="post">
                <input type="text" name="check" class="form-control" placeholder="Search" autofocus />
                <input type="hidden" name="pid" value="<?=$pid?>">
            </form>
            <br>
            <div class="profile">
                <div class="info">

                <div class="row">
                  <div class="col-lg-3">
                    <div class="bs-component">
                        <?php 
                            if (isset($photo) && !empty($photo)) {
                                echo "<img src='assets/images/" . $photo . "' width='200' height='auto'></a></td>";
                            } else {
                                echo "<img src='assets/images/newa.png' width ='150' height = 'auto'></a></td>";
                            }
                        ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="bs-component">
                        <h4>ชื่อ : <?=$name?></h4>
                        <p>วัด : <?=$wat?></p>
                        <p>ตำแหน่ง :<?=$position?></p>
                    </div>
                  </div>
                </div>
            
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

