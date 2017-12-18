<div class="page-title">
  <div>
    <h1>ข้อมูลวัด</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>หลังบ้าน</li>
      <li class="active"><a href="#">ข้อมูลวัด</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="wats.php?source=wat_add"><i class="fa fa-lg fa-plus"></i></a>
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
							<th>ชื่อสวัด</th>
							<th>แก้ไข</th>
							<th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php
							if (isset($_GET["id"])) {
								$wat_id = $_GET["id"];
								$sql = "DELETE FROM wats where wat_id='$wat_id'";
								$result = mysqli_query($conn, $sql);
							}

							$sql = "SELECT * FROM wats";
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
								$wat_id = $row["wat_id"];
								$wat_name = $row["wat_name"];

								echo "<tr>
										<td>";echo $i++; echo" </td>
										<td>$wat_name</td>
										<td><a href='wats.php?source=wat_edit&id=$wat_id'>แก่ไข้</a></td>
										<td><a href='wats.php?id=$wat_id' onclick='return confirm(\"ยืนยันการลบ\");'>ลบ</a></td>
									</tr>";
							}
						?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
