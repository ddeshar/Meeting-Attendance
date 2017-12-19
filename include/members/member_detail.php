<?php
  // Form Submit
  if (isset($_GET["view"])){
    $nationalid = $_GET["view"];
    $sql = "SELECT
              wats.wat_name,
              positions.position_name,
              members.nationalid,
              members.`name`,
              members.chaya,
              members.lastname,
              members.photo,
              members.position,
              members.wat,
              members.dob,
              members.dou
            FROM
              members
            INNER JOIN positions ON members.position = positions.position_id
            INNER JOIN wats ON members.wat = wats.wat_id
            WHERE members.nationalid = '$nationalid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
          $national_id  = $row["nationalid"];
          $name         = $row["name"];
          $chaya        = $row["chaya"];
          $lastname     = $row["lastname"];
          $wat          = $row["wat_name"];
          $position     = $row["position_name"];
          $dob          = $row["dob"];
          $dou          = $row["dou"];
          $photo     = $row["photo"];
    }else{
          $national_id  = "";
          $name         = "";
          $chaya        = "";
          $lastname     = "";
          $wat          = "";
          $position     = "";
          $dob          = "";
          $dou          = "";
          $photo        = "";
    }
  }
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h3 class="card-title">ประวัติพระ <?=$name?> <?=$chaya?> <?=$lastname?></h3>
      <div class="card-body">

        <div class="row">
            <div class="col-lg-4">
            <?php
                if (empty($photo)) {
                $manucha = "newa.png";
                }else{
                $manucha = $photo;
                } 
            ?>
            <p><img src="assets/images/<?php echo $manucha; ?>" height="auto" width="350" /></p>
            </div>
            <div class="col-lg-8">
                <p>เลขที่บัตรประชาชน : <?=$national_id?></p>
                <p>ชื่อ : <?=$name?> <?=$chaya?> <?=$lastname?></p>
                <p>ตำแหน่ง : <?=$position?></p>
                <p>วัด : <?=$wat?></p>
                <p>ว/ด/ป เกิด : <?=$dob?></p>
                <p>ว/ด/ป บวช  : <?=$dou?> </p>

                <a class="btn btn-info" href="members.php?source=edit_member&id=<?=$national_id?>">แก้ประวัติ</a>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
