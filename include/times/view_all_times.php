<div class="page-title">
  <div>
    <h1>ข้อมูลเวลา</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>หลังบ้าน</li>
      <li class="active"><a href="#">ข้อมูลเวลา</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="times.php?source=check"><i class="fa fa-lg fa-plus"></i></a>
    <!-- <a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a> -->
    <!-- <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a> -->
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>ที่</th>
							<th>ชื่อ</th>
							<th>ตำแหน่ง</th>
							<th>วัด</th>
							<th>วันที่</th>
							<th>เวลา</th>
            </tr>
          </thead>
          <tbody>
            <?php
							$sql = "SELECT
                        time.date,
                        members.`name`,
                        members.chaya,
                        members.lastname,
                        positions.position_name,
                        wats.wat_name
                      FROM time
                      INNER JOIN members ON time.members_nationalid = members.nationalid
                      INNER JOIN positions ON members.position = positions.position_id
                      INNER JOIN wats ON members.wat = wats.wat_id";
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
                $name = $row["name"];
								$chaya = $row["chaya"];
								$date = $row["date"];
								$lastname = $row["lastname"];
								$position_name = $row["position_name"];
                $wat_name = $row["wat_name"];
                
                $time = date('h:i a', strtotime($date));
                $dates = date('m-d-Y', strtotime($date));

                echo "<tr>
                      <td>";echo $i++; echo" </td>
                      <td>$name $chaya $lastname</td>
                      <td>$position_name</td>
                      <td>$wat_name</td>
                      <td>$dates</td>
                      <td>$time</td>
									</tr>";
							}
						?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
