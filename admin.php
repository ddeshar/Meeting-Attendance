<?php
$page = 'dashboard';
$title = 'Dashboard';
$css = <<<EOT
    <!--page level css -->
    <!--end of page level css-->
EOT;
  include 'include/_header.php';
  include 'include/_navbar.php';
  include 'include/_menuleft.php';
?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
            <p>Start a beautiful journey here</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Blank Page</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b>5</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Likes</h4>
                <p><b>25</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Uploades</h4>
                <p><b>10</b></p>
              </div>
            </div>
          </div>
          <?php if (isset($_SESSION['is_admin'])): ?>
            <div class="col-md-3">
              <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                  <h4>Stars</h4>
                  <p><b>500</b></p>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
<?php
  include 'include/_footer.php';
?>
</body>
</html>
