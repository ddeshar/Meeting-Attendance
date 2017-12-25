<?php 
    // include_once dirname($_SERVER['DOCUMENT_ROOT']) .'/meeting/include/function.php';  // for server
    include_once dirname($_SERVER['PHP_SELF']) .'/include/function.php'; // For local
?>

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
    <!-- <a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a> -->
    <!-- <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a> -->
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable1">
          <thead>
            <tr>
              <th>ที่</th>
							<th>เรื่อง</th>
							<th>วันที่</th>
							<th>หมายเหตุ</th>
							<th>ดำเนินการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
							if (isset($_GET["id"])) {
								$detail_id = $_GET["id"];
								$sql = "DELETE FROM detail where detail_id='$detail_id'";
								$result = mysqli_query($conn, $sql);
							}

							$sql = "SELECT * FROM detail";
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
								$detail_id = $row["detail_id"];
								$subject = $row["subject"];
								$agenda = $row["agenda"];
								$date = DateThai($row["date"]);
                $note = $row["note"];

								echo "<tr>
										<td>";echo $i++; echo" </td>
										<td>$subject</td>
										<td>$date</td>
										<td>$note</td>
                    <td><a href='details.php?source=check&id=$detail_id'>สแกนบัตร</a> | 
                    <a href='details.php?source=result&id=$detail_id'>สรุป</a>
                    </td>
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

