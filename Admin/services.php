<?php include("includes/header.php") ?>

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
?>

<div class="card-header">
    <button class="btn" style="background:#3b5d50;color:white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Service</button>
</div>
<form action="EditCode.php" method="POST">
    <div class="d-flex justify-content-end">
        <button type="submit" name="editSelectedService" class="btn btn-warning me-2">Edit Service</button>
        <button type="submit" name="deleteSelectedService" class="btn btn-danger">Delete Service</button>
    </div>
    <div class="card-body mt-2 mb-4 border" style="padding:0 20px">
        <?php
            $admins = mysqli_query($con, "SELECT * FROM `services` ORDER BY  id DESC");
            $i=0;
        ?>
        <div class="table-responsive">
            <table id="myTable_customer" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="position: sticky; left: 0; z-index: 1; background-color: white;"></th>
                        <th style="position: sticky; left: 40px; z-index: 1; background-color: white;">ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Sart_Time</th>
                        <th>End_Time</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($admins as $admin) : $i++; $id = $admin['id'];
                    ?>
                    <tr>
                        <td style="position: sticky; left: 0; background-color: white;"><input type="checkbox" name="selected[]" value="<?= $admin['id'] ?>" class="row-select" onchange="toggleEditable(this)"></td>
                        <td style="position: sticky; left: 40px; background-color: white;"><?= $i ?></td>
                        <td><b style="display:none"><?= $admin['title'] ?></b><input type="text" name="title[<?= $admin['id'] ?>]" value="<?= $admin['title'] ?>" class="form-control" style="width:150px" readonly></td>
                        <td><b style="display:none"><?= $admin['date'] ?></b><input type="text" name="date[<?= $admin['id'] ?>]" value="<?= $admin['date'] ?>" class="form-control" style="width:150px" readonly></td>
                        <td><b style="display:none"><?= $admin['start_time'] ?></b><input type="text" name="start_time[<?= $admin['id'] ?>]" value="<?= $admin['start_time'] ?>" class="form-control" style="width:150px" readonly></td>
                        <td><b style="display:none"><?= $admin['end_time'] ?></b><input type="text" name="end_time[<?= $admin['id'] ?>]" value="<?= $admin['end_time'] ?>" class="form-control" style="width:150px" readonly></td>
                        <td><b style="display:none"><?= $admin['link'] ?></b><input type="text" name="link[<?= $admin['id'] ?>]" value="<?= $admin['link'] ?>" class="form-control" style="width:200px" readonly></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4 mb-4">
                    <form action="EditCode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Service Title</label>
                                    <input type="text" name="title" placeholder="Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Start Time</label>
                                    <input type="time" name="start_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">End Time</label>
                                    <input type="time" name="end_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Link</label>
                                    <input type="text" name="link" placeholder="http://localhost:8081/NJA/services.php" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="cardServiceBtn" class="btn" style="background:#3b5d50;color:white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleEditable(checkbox) {
        let row = checkbox.closest('tr');
        let inputs = row.querySelectorAll('input[type="text"]');

        inputs.forEach(function(input) {
            if (checkbox.checked) {
                input.removeAttribute('readonly');  // Make the input editable
            } else {
                input.setAttribute('readonly', 'readonly');  // Make the input read-only
            }
        });
    }
</script>
<?php include("includes/footer.php") ?>