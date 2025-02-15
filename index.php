<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
?>

<style>
  header.masthead {
    background: url(assets/img/<?= $_SESSION['setting_cover_img'] ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<body id="page-top">
  <!-- Navigation-->
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="./"><i class="fas fa-toolbox mr-3"></i><?= $_SESSION['setting_name'] ?></a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home"><i class="fas fa-home"></i> Home</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span>  <i class="fa fa-shopping-cart"></i> </span>Cart <span class="ml-2 badge badge-danger item_count"></span></a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about"><i class="fas fa-info-circle"></i> Info</a></li>
          <?php if (isset($_SESSION['login_user_id'])) : ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2">Logout <i class="fa fa-power-off"></i></a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger"  style='text-transform:capitalize' href="index.php?page=profile"><?=($_SESSION['login_first_name'])?> </a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=orders">Orders</a></li>
          <?php else : ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now"><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>
<main>
  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  include $page . '.php';
  ?>
</main>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            x
          </button>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright © <?= date('Y') ?> - TYIT BOOK STORE </div>
    </div>
  </footer>

  <?php include('footer.php') ?>
</body>

<?php $conn->close() ?>

</html>