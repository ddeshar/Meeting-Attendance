        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">


           <?php 
            $source = $_GET['source'];
            if ( $source == "add_member") {
          ?>
          <div class="form-group">
            <label class="control-label col-md-3">เลขที่บัตรประชาชน :</label>
            <div class="col-md-8">
              <input class="form-control" name="nationalid" type="text" value="<?=$nationalid?>">
            </div>
          </div>
          <?php } else { ?> 
          <div class="form-group">
            <label class="control-label col-md-3">เลขที่บัตรประชาชน :</label>
            <div class="col-md-8">
              <input class="form-control" name="nationalid" type="text" value="<?=$nationalid?>" readonly>
            </div>
          </div>
          <?php } ?>

           <div class="form-group">
            <label class="control-label col-md-3">ชื่อ :</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" name="name" type="text" value="<?=$name?>">
            </div>
          </div>

           <div class="form-group">
            <label class="control-label col-md-3">ฉายา :</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" name="chaya" type="text" value="<?=$chaya?>">
            </div>
          </div>

           <div class="form-group">
            <label class="control-label col-md-3">นามสกุล :</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" name="lastname" type="text" value="<?=$lastname?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">ว/ด/ป เกิด :</label>
            <div class="col-md-8">
              <input id="inputdatepicker" name="dob" value="<?=$dob?>" class="form-control col-md-8 datepicker" data-date-format="yyyy/mm/dd">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">ว/ด/ป บวช :</label>
            <div class="col-md-8">
              <input id="inputdatepicker" name="dou" value="<?=$dou?>" class="form-control col-md-8 datepicker" data-date-format="yyyy/mm/dd">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="select">ตำแหน่ง</label>
            <div class="col-lg-8">
              <select class="form-control" name="position" id="select">
                <?php
                  $query_position = "SELECT * FROM positions";
                  $select_position = mysqli_query($conn, $query_position);
                  while ($row = mysqli_fetch_array($select_position)){
                    $position_id = $row["position_id"];
                    $position_name = $row["position_name"];

                    if($positionid == $position_id) {
                      echo "<option selected value='{$position_id}'>{$position_name}</option>";
                    } else {
                      echo "<option value='{$position_id}'>{$position_name}</option>";
                    }
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="select">วัด</label>
            <div class="col-lg-8">
              <select class="form-control" name="wat" id="select">
                <?php
                  $query_wats = "SELECT * FROM wats";
                  $select_wats = mysqli_query($conn, $query_wats);
                  while ($row = mysqli_fetch_array($select_wats)){
                    $wat_id = $row["wat_id"];
								    $wat_name = $row["wat_name"];

                    if($watid == $wat_id) {
                      echo "<option selected value='{$wat_id}'>{$wat_name}</option>";
                    } else {
                      echo "<option value='{$wat_id}'>{$wat_name}</option>";
                    }
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">รูป :</label>
            <div class="col-md-8">
              <?php if ( $source == "edit_member") {
              
            if (empty($photo)) {
              $manucha = "newa.png";
            }else{
              $manucha = $photo;
            } ?>
            <p><img src="assets/images/<?php echo $manucha; ?>" height="auto" width="500" /></p>
            <?php 
            } ?>
              <img id="blah" src="#" alt="your image" width="500" height="auto" />
              <input class="form-control" name="photo" id="imgInp" type="file">
            </div>
          </div>

          <?php if ( $source == "add_member") { ?>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>เพิ่ม ประวัติพระ</button>
                </div>
              </div>
            </div>
          <?php } else { ?> 
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input name="pid" type="hidden" value="<?=$pid?>" />
                  <button class="btn btn-primary icon-btn" type="submit" name="btnEdit" value="แก้ไขสินค้า"><i class="fa fa-fw fa-lg fa-check-circle"></i>แก้ ประวัติพระ</button>
                </div>
              </div>
            </div>
          <?php } ?>

        </form>
        