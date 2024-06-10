<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="megs.png">
  <title>Laundry Management System</title>

<?php
  session_start();
  if (!isset($_SESSION['login_id'])) {
    header('location:login.php');
  }
  include('./header.php'); 
?>

</head>
<style>
  body {
    background: #80808045;
  }
  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
</style>

<body>
  <?php include 'topbar.php'; ?>

  <!-- Updated navbar to restrict access for staff -->
  <nav id="sidebar" class='mx-lt-5 bg-dark'>
    <div class="sidebar-list">
      <?php if ($_SESSION['login_type'] == 1): // Admin ?>
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=laundry" class="nav-item nav-laundry"><span class='icon-field'><i class="fa fa-water"></i></span> Laundry List</a>
        <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Laundry Category</a>
        <a href="index.php?page=supply" class="nav-item nav-supply"><span class='icon-field'><i class="fa fa-boxes"></i></span> Supply List</a>
        <a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list-alt"></i></span> Inventory</a>
        <a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-th-list"></i></span> Reports</a>
        <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
      <?php else: // Staff ?>
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=laundry" class="nav-item nav-laundry"><span class='icon-field'><i class="fa fa-water"></i></span> Laundry List</a>
        <a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-th-list"></i></span> Reports</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white"></div>
  </div>

  <main id="view-panel">
    <?php 
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      
      // Restricting access to allowed pages only for staff
      if ($_SESSION['login_type'] != 1) { // Not an admin
        $allowed_pages = ['home', 'laundry', 'reports'];
        if (!in_array($page, $allowed_pages)) {
          $page = 'home'; // default to 'home' if unauthorized page is accessed
        }
      }
      
      include $page . '.php'; 
    ?>
  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  window.start_load = function() {
    $('body').prepend('<div id="preloader2"></div>')
  }
  window.end_load = function() {
    $('#preloader2').fadeOut('fast', function() {
      $(this).remove();
    })
  }

  window.uni_modal = function($title = '', $url = '', $size = "") {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal .modal-dialog').addClass($size)
          } else {
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal').modal('show')
          end_load()
        }
      }
    })
  }

  window._conf = function($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
  }

  window.alert_toast = function($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success bg-danger bg-info bg-warning')
    $('#alert_toast').addClass('bg-' + $bg)
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }

  $(document).ready(function() {
    $('#preloader').fadeOut('fast', function() {
      $(this).remove();
    })
  })
</script>
</html>
