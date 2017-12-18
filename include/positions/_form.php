        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-md-3">ชื่อวัด :</label>
            <div class="col-md-8">
              <input class="form-control" name="position_name" type="text" value="<?=$position_name?>">
            </div>
          </div>

          <?php 
            $source = $_GET['source'];
            if ( $source == "product_add") {
          ?>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>เพิ่ม ตำแหน่ง</button>
                </div>
              </div>
            </div>
          <?php } else { ?> 
            <div class="card-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input name="pid" type="hidden" value="<?=$pid?>" />
                  <button class="btn btn-primary icon-btn" type="submit" name="btnEdit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>แก้ชื่อ ตำแหน่ง</button>
                </div>
              </div>
            </div>
          <?php } ?>

        </form>