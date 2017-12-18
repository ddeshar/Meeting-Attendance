<div class="page-title">
  <div>
    <h1>ข้อมูลวาระการประชุม</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>หลังบ้าน</li>
      <li class="active"><a href="#">ข้อมูลวาระการประชุม</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="details.php?source=detail_add"><i class="fa fa-lg fa-plus"></i></a>
    <a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a>
    <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
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
							<th>วัด</th>
							<th>ตำแหน่ง</th>
							<th>ดำเนินการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $deatil_id = $_GET["id"];
							$sql = "SELECT
                        members.`name`,
                        members.chaya,
                        members.lastname,
                        wats.wat_name,
                        positions.position_name
                      FROM
                        members
                      INNER JOIN wats ON members.wat = wats.wat_id
                      INNER JOIN positions ON members.position = positions.position_id
                      WHERE
                        members.nationalid IN (
                          (
                            SELECT
                              members_nationalid
                            FROM
                              time
                            WHERE
                              detail_id = '$deatil_id'
                          )
                        )";
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
								$name = $row["name"];
								$chaya = $row["chaya"];
								$lastname = $row["lastname"];
								$wat_name = $row["wat_name"];
                $position_name = $row["position_name"];
                
                $time = date('h:i a', strtotime($date));
                $dates = date('m-d-Y', strtotime($date));

								echo "<tr>
                    <td>";echo $i++; echo" </td>
										<td>$name $chaya $lastname</td>
										<td>$wat_name</td>
										<td>$position_name</td>
                    <td></td>
									</tr>";
							}
						?>
            <!-- <a href='details.php?id=$detail_id' onclick='return confirm(\"ยืนยันการลบ\");'>ลบ</a> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

