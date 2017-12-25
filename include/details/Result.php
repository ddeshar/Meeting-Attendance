  <div class="page-title">
    <div>
      <h1>ข้อมูลวาระการประชุม</h1>
      <ul class="breadcrumb side">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>หลังบ้าน</li>
        <li class="active"><a href="#">ข้อมูลวาระการประชุม</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
      <div class="col-md-7">
          <?php 
              $deatil_id = $_GET["id"];

              $memid = $_GET["del"];
              if (isset($memid , $deatil_id )) {
                $del ="DELETE FROM `php_meeting_atten`.`time` WHERE `time`.`members_nationalid` = '$memid' AND `time`.`detail_id` = '$deatil_id'";
                $deltime = mysqli_query($conn, $del);
              }

              $present = "SELECT
                        members.`name`,
                        members.`chaya`,
                        members.`lastname`,
                        wats.`wat_name`,
                        positions.`position_name`,
                        time.date_scan,
                        time.members_nationalid
                      FROM members
                      LEFT JOIN meeting_mem ON meeting_mem.meeting_nationalid = members.nationalid
                      INNER JOIN positions ON positions.position_id = members.position
                      INNER JOIN wats ON wats.wat_id = members.wat
                      INNER JOIN time ON time.members_nationalid = members.nationalid
                      WHERE meeting_mem.meeting_detail_id = '$deatil_id'
                      AND meeting_mem.meeting_nationalid IN (
                        ( SELECT members_nationalid
                          FROM time
                          WHERE detail_id = '$deatil_id')
                      )ORDER BY time.date_scan ASC";
              $respresent = mysqli_query($conn, $present);
              if (mysqli_num_rows($respresent) > 0) {
              $p = 1;
          ?>
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <div>
                <a class="btn btn-primary btn-flat" href="include/details/_pdf_present.php?id=<?=$deatil_id?>"><i class="fa fa-lg fa-file-pdf-o"></i></a>
                <h3>สรุปคนที่มาร่วมประชุม</h3>
              </div>
              <thead>
                <tr>
                  <th>ที่</th>
                  <th>ชื่อ</th>
                  <th>วัด</th>
                  <th>ตำแหน่ง</th>
                  <th>เวลา</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ( $prow = mysqli_fetch_array($respresent)){
                          $pname                = $prow["name"];
                          $pchaya               = $prow["chaya"];
                          $plastname            = $prow["lastname"];
                          $pwat_name            = $prow["wat_name"];
                          $pposition_name       = $prow["position_name"];
                          $pdate_scan           = $prow["date_scan"];
                          $pmembers_nationalid  = $prow["members_nationalid"];

                    echo "<tr>
                        <td>";echo $p++; echo" </td>
                        <td>$pname $pchaya $plastname</td>
                        <td>$pwat_name</td>
                        <td>$pposition_name</td>
                        <td>$pdate_scan | <a href='details.php?source=result&id=$deatil_id&del=$pmembers_nationalid' onclick='return confirm(\"ยืนยันการลบ\");'>ลบ</a></td>
                      </tr>";
                  }
                ?>            
              </tbody>
            </table>
          </div>
        </div>
            <?php } else {
                echo '<div class="alert  alert-danger">
                  <h1 class="text-center"> <strong>Sorry !</strong> ยังไม่มีข้อมูลการประชุม</h1>
                </div>'; 
              } 
            ?>
      </div>

      <div class="col-md-5">
        <?php 
          $absent = "SELECT
                        members.`name`,
                        members.chaya,
                        members.lastname,
                        wats.wat_name,
                        positions.position_name
                      FROM members
                      LEFT JOIN meeting_mem ON meeting_mem.meeting_nationalid = members.nationalid
                      INNER JOIN positions ON positions.position_id = members.position
                      INNER JOIN wats ON wats.wat_id = members.wat
                      WHERE meeting_mem.meeting_detail_id = '$deatil_id'
                      AND meeting_mem.meeting_nationalid NOT IN (
                        (
                          SELECT  members_nationalid
                          FROM time
                          WHERE detail_id = '$deatil_id'
                        )
                      )ORDER BY positions.position_id ASC";
          $absentres = mysqli_query($conn, $absent);
          if (mysqli_num_rows($absentres) > 0) {
          $a = 1;
        ?>
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <div>
                <a class="btn btn-danger btn-flat" href="include/details/_pdf_absent.php?id=<?=$deatil_id?>"><i class="fa fa-lg fa-file-pdf-o"></i></a>
                <h3>สรุปคนที่ยังไม่มาร่วมประชุม</h3>
              </div>
              <thead>
                <tr>
                  <th>ที่</th>
                  <th>ชื่อ</th>
                  <th>วัด</th>
                  <th>ตำแหน่ง</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($arow = mysqli_fetch_array($absentres)){
                    $aname = $arow["name"];
                    $achaya = $arow["chaya"];
                    $alastname = $arow["lastname"];
                    $awat_name = $arow["wat_name"];
                    $aposition_name = $arow["position_name"];

                    echo "<tr>
                        <td>";echo $a++; echo" </td>
                        <td>$aname $achaya $alastname</td>
                        <td>$awat_name</td>
                        <td>$aposition_name</td>
                      </tr>";
                  }
                ?>
                
                </tbody>
              </table>
            </div>
          </div>
            <?php } else {
                echo '<div class="alert  alert-success">
                  <h1 class="text-center">  ประชุมครั้งนี้มาครบ</h1>
                </div>'; 
              } 
            ?>
      </div>
  </div>

