<div class="page-title">
  <div>
    <h1>ข้อมูลสมาชิก</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>หลังบ้าน</li>
      <li class="active"><a href="#">ข้อมูลสมาชิก</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="members.php?source=add_member"><i class="fa fa-lg fa-plus"></i></a>
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
							<th>วัด</th>
							<th>ตำแหน่ง</th>
							<th>แก้ไข</th>
							<th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_GET['source'])) {
                $source = $_GET['source'];
              } else {
                $source = '';
              }

							if (isset($_GET["id"])) {
								$national_id = $_GET["id"];
								$sql = "DELETE FROM members where national_id='$national_id'";
								$result = mysqli_query($conn, $sql);
              }
              
              if($source == "wat"){
                $link = $_GET["link"];
                $sql = "SELECT
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
                        INNER JOIN wats ON members.wat = wats.wat_id
                        INNER JOIN positions ON members.position = positions.position_id
                        WHERE
                          members.wat = '$link'";
              }else if($source == "position"){
                $link = $_GET["link"];
                $sql = "SELECT
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
                        INNER JOIN wats ON members.wat = wats.wat_id
                        INNER JOIN positions ON members.position = positions.position_id
                        WHERE
                          members.position = '$link'";
              }else{
							  $sql = "SELECT
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
                        ORDER BY members.position ASC";
              }
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
								$national_id = $row["nationalid"];
								$name = $row["name"];
								$chaya = $row["chaya"];
								$lastname = $row["lastname"];
								$wat = $row["wat_name"];
								$watlink = $row["wat"];
								$positionlink = $row["position"];
								$position = $row["position_name"];

								echo "<tr>
										<td>";echo $i++; echo" </td>
										<td><a href='members.php?source=member_detail&view=$national_id'>{$name} {$chaya}  {$lastname}</a></td>
										<td><a href='members.php?source=wat&link=$watlink'>$wat</a></td>
										<td><a href='members.php?source=position&link=$positionlink'>$position</a></td>
										<td><a href='members.php?source=edit_member&id=$national_id'>แก่ไข้</a></td>
										<td><a href='members.php?id=$national_id' onclick='return confirm(\"ยืนยันการลบ\");'>ลบ</a></td>
									</tr>";
							}
						?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
