<?php include("Admin/includes/function.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vacant Houses</title>
  <link rel="shortcut icon" href="images/logo.png" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <link href='https://fonts.googleapis.com/css?family=Rubik Wet Paint' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Pacifico Script' rel='stylesheet'>
  
  <!-- End plugin css for this page -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <!-- inject:css -->
  <link rel="stylesheet" href="style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="logo.png" /> -->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- -------- slick slide --------- -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <!-- using alertify js message -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</head>
<style>
  .accordion-button {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .strong-text {
    display: -webkit-box;
    -webkit-line-clamp: 7;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
<body>
<?php
if (isset($_SESSION["success"])) {
    ?>
    <script type="text/javascript">
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION["success"] ?>');
    </script>
    <?php
    // Clear the session message after displaying it
    unset($_SESSION["success"]);
}
// Danger message
if (isset($_SESSION["danger"])) {
    ?>
    <script type="text/javascript">
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('<?= $_SESSION["danger"] ?>');
    </script>
    <?php
    unset($_SESSION["danger"]);
}
// Warning message
if (isset($_SESSION["warning"])) {
    ?>
    <script type="text/javascript">
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('<?= $_SESSION["warning"] ?>');
    </script>
    <?php
    unset($_SESSION["warning"]);
}
// ===================================================================================
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
$page == 'index.php' ? 'active':'';
?>
<!-- ================================fetching code ==================================== -->
<?php
$current = date("Y-m-d");
$tim = date("H:i:s");
$services = mysqli_query($con, "SELECT * FROM `services` ORDER BY `date`, `start_time`");
$services_count = mysqli_num_rows($services);


?>

<nav class="navbar navbar-expand-lg shadow" data-bs-theme="dark" style="background:#3b5d50">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo.png" style="width:60px;height:40px;mix-blend-mode:multiply"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                   <a class="nav-link <?= $page == 'index.php' ? 'active':''; ?> " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ministries
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Youth</a></li>
                        <li><a class="dropdown-item" href="#">Sunday School</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link <?= $page == 'events.php' ? 'active':''; ?> " href="events.php">Events</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link <?= $page == 'services.php' ? 'active':''; ?> " href="services.php">Services</a>
                </li>
                <li class="nav-item">
                   <button class="nav-link" data-bs-toggle="modal" data-bs-target="#prayer">Prayer Request</button>
                </li>
                <li class="nav-item">
                   <button class="nav-link" data-bs-toggle="modal" data-bs-target="#special">Special ConsultationByPastor</button>
                </li>
                <li class="nav-item">
                   <a class="nav-link <?= $page == 'contactUs.php' ? 'active':''; ?> " href="contactUs.php">ContactUs</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link <?= $page == 'give.php' ? 'active':''; ?> " href="give.php">Give</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ============================== Prayer Request ===================================== -->
<div class="modal fade" id="prayer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <form action="EditCode.php" method="POST" enctype="multipart/form-data">
                <div class="row text-center">
                    <div class="col-md-12 mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Your Name</label>
                            <input type="text" name="usernameL" placeholder="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Whom To send To</label>
                            <select name="" class="form-select" required>
                                <option value="everyone">All Group</option>
                                <option value="individual">Someone from Group</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-group">
                            <textarea class="form-control" aria-label="With textarea" rows="5" placeholder="Write Your Prayer request here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login" class="btn" style="background:#13372f;color:white">Send Your Prayer Request <i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- ================================== special request =================================== -->
<div class="modal fade" id="special" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <form action="EditCode.php" method="POST" enctype="multipart/form-data">
                <div class="row text-center">
                    <div class="col-md-12 mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Your Name</label>
                            <input type="text" name="usernameL" placeholder="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="input-group-text" for="inputGroupSelect02">Write Your Reason</label>
                        <div class="input-group">
                            <textarea class="form-control" aria-label="With textarea" rows="5" placeholder="Write Your Reason here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login" class="btn" style="background:#13372f;color:white">Send To The Pastor <i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- ================================== Comment =================================== -->
<div class="modal fade" id="comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <form action="EditCode.php" method="POST" enctype="multipart/form-data">
                <div class="row text-center">
                    <div class="col-md-12 mb-3">
                        <label class="input-group-text" for="inputGroupSelect02">Make your Comment</label>
                        <div class="input-group">
                            <textarea class="form-control" aria-label="With textarea" rows="5" placeholder="Write Your Comment here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login" class="btn" style="background:#13372f;color:white">Send Comment <i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>