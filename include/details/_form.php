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
