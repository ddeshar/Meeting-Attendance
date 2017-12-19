        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-md-3">เรื่อง :</label>
            <div class="col-md-8">
              <input class="form-control" name="subject" type="text" value="<?=$subject?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">วาระที่ :</label>
            <div class="col-md-8">
              <input class="form-control" name="agenda" type="text" value="<?=$agenda?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">ประธาน :</label>
            <div class="col-md-8">
              <input class="form-control" name="president" type="text" value="<?=$president?>">
            </div>
          </div>

          <div class="form-group">
            <label for="dtp_input1" class="control-label col-md-3">วันที่ / เวลา :</label>
            <div class="input-group date form_datetime col-md-8" data-date-format="yyyy MM dd - HH:ii p" data-link-field="dtp_input1">
              <input class="form-control" size="16" name="date" type="text" value="<?=$date?>" readonly>
              <span class="input-group-addon"><span class="fa fa-times"></span></span>
              <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input1" value="" />
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">หมายเหตุ :</label>
            <div class="col-md-8">
              <input class="form-control" name="note" type="text" value="<?=$note?>">
            </div>
          </div>

          <?php 
            $source = $_GET['source'];
            if ( $source == "detail_add") {
          ?>
                  <div class="form-group">
                    <label class="control-label col-md-3">เรียก เชิญประชุม:</label>
                    <div class="col-md-8">
                    <div class="animated-checkbox">
                      <label><input type="checkbox" id="select_all"><span class="label-text">เลือกทั้งหมด </span></label>
                    </div>
                      <?php
                         $users_query = "SELECT
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
                          $select_users = mysqli_query($conn,$users_query);
                          while($row = mysqli_fetch_assoc($select_users)) {
                                $national_id = $row["nationalid"];
                                $name = $row["name"];
                                $chaya = $row["chaya"];
                                $lastname = $row["lastname"];
                                $wat = $row["wat_name"];
                                $position = $row["position_name"]; 
                           echo "<div class=\"animated-checkbox\">
                                  <label><input type=\"checkbox\" class=\"checkbox\" name=\"invite[]\" value='{$national_id}'><span class=\"label-text\">{$name}{$chaya}{$lastname} {$position} </span></label>
                                </div>";
                         }
                       ?>
                       
                        <input type="checkbox" class="chk_boxes" label="check all"  />check all
                        <input type="checkbox" class="unchk_boxes"   /> un-check all
                    </div>
                  </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>เพิ่ม ข้อมูลวาระการประชุม</button>
                </div>
              </div>
            </div>
          <?php } else { ?> 
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input name="pid" type="hidden" value="<?=$pid?>" />
                  <button class="btn btn-primary icon-btn" type="submit" name="btnEdit" value="แก้ไขสินค้า"><i class="fa fa-fw fa-lg fa-check-circle"></i>แก้ชื่อ ข้อมูลวาระการประชุม</button>
                </div>
              </div>
            </div>
          <?php } ?>

        </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

