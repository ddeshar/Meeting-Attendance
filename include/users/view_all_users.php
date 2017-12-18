<div class="page-title">
  <div>
    <h1>Data Table</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>Tables</li>
      <li class="active"><a href="#">Data Table</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="user.php?source=user_add"><i class="fa fa-lg fa-plus"></i></a>
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
              <th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>ราคา</th>
							<th>จำนวนเวลา</th>
							<th>แก้ไข</th>
							<th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php
							if (isset($_GET["id"])) {
								$user_id = $_GET["id"];
								$sql = "delete from tbl_users where user_id='$user_id'";
								$result = mysqli_query($conn, $sql);
							}

							$sql = "select * from tbl_users";
              $result = mysqli_query($conn, $sql);
              $i = 1;
							while ($row = mysqli_fetch_array($result)){
								$user_id = $row["user_id"];
								$username = $row["username"];
								$email = $row["email"];
								$status = $row["status"];
?>
								<tr>
										<td><?=$i++?></td>
										<td><?=$username?></td>
										<td><?=$email?></td>
										<td>
                      <?php
                        if ($status == 500) {
                          echo "admin";
                        }else if ($status == 100) {
                          echo "member";
                        }else if ($status == 0) {
                          echo "user";
                        }
                      ?>
                    </td>
										<td><a href='user.php?source=user_edit&id=<?=$user_id?>'>แก่ไข้</a></td>
										<td><a href='user.php?id=<?=$user_id?>' onclick='return confirm(\"ยืนยันการลบ\");'>ลบ</a></td>
									</tr>
                  <?php
							}
						?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
