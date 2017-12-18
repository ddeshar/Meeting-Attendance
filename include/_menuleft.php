<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
        <?php
        if (empty($s_login_avatar)) {
          $manucha = "user.png";
        }else{
          $manucha = $s_login_avatar;
       }
        ?> 
      <div class="pull-left image"><img class="img-circle" src="assets/images/users/<?=$manucha?>" alt="User Image"></div>
      <div class="pull-left info">
        <p><?=$s_login_username?></p>
        <p class="designation"><?=$s_login_email?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li <?php if($page == 'dashboard'){ echo 'class="active"';} ?>><a href="admin.php"><i class="fa fa-dashboard"></i><span>แผงควบคุม</span></a></li>
      <li <?php if($page == 'wat') {echo 'class="active"';} ?>><a href="wats.php"><i class="fa fa-dashboard"></i><span>วัด</span></span></a></li>
      <li <?php if($page == 'positions') {echo 'class="active"';} ?>><a href="positions.php"><i class="fa fa-dashboard"></i><span>ตำแหน่ง</span></span></a></li>
      <li <?php if($page == 'members') {echo 'class="active"';} ?>><a href="members.php"><i class="fa fa-dashboard"></i><span>ประวัติพระ</span></span></a></li>
      <hr>
      <li <?php if($page == 'details') {echo 'class="active"';} ?>><a href="details.php"><i class="fa fa-dashboard"></i><span>รายละเอียด</span></span></a></li>
      <li <?php if($page == 'user') {echo 'class="active"';} ?>><a href="user.php"><i class="fa fa-dashboard"></i><span>ผู้ใช้งาน</span></span></a></li>
    </ul>
  </section>
</aside>
