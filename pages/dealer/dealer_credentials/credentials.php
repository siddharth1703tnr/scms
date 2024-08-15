<?php
require_once '../../../config/config.php';
require_once '../../../classes/Database.php';
require_once '../../../classes/BaseModel.php';
require_once '../../../classes/Dealer.php';
require_once '../../../classes/Dealer_Credentials.php';

$database = new Database();
$db = $database->getConnection();
$dealer = new Dealer($db);
$dealerCredentials = new Dealer_Credentials($db);

//$technician = new Technician($db);

$dealerId = $_GET['id'];
$currentDealer = $dealer->getDealerById($dealerId); // Assuming this function exists

$dealercredentials = $dealerCredentials->getAllDealerCredentials();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Dealer</title>
    <?php require_once('../../../includes/link.php')  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php require_once('../../../includes/preloder.php') ?>
        <?php require_once('../../../includes/navbar.php') ?>
        <?php require_once('../../../includes/asidde-st.php') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dealer Credentials Info</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dealer</li>
                                <li class="breadcrumb-item active">Credentials</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div>
                            <div class="section-1">
                                <div class="row row-gap-2">
                                    <!-- // id, name, isactive, primarymobileno, secondmobileno, emailaddress, address, city -->
                                    <div class="col-md-6">
                                        <label for="Dealer_Name" class="form-label">Name</label>
                                        <h1><?php echo htmlspecialchars($currentDealer['name']); ?></h1>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Dealer_City" class="form-label">City</label>
                                        <h3><?php echo htmlspecialchars($currentDealer['city']); ?></h3>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Dealer_PMobile_No" class="form-label">Primary Mobile No:-</label>
                                        <h4><?php echo htmlspecialchars($currentDealer['primarymobileno']); ?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Dealer_SMobile_No" class="form-label">Second Mobile No:-</label>
                                        <h4><?php echo htmlspecialchars($currentDealer['secondmobileno']); ?></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Dealer_email" class="form-label">Email</label>
                                        <h4><?php echo htmlspecialchars($currentDealer['emailaddress']); ?></h4>
                                    </div>
                                    <div class="col-10">
                                        <label for="Dealer_Address" class="form-label">Address</label>
                                        <h4><?php echo htmlspecialchars($currentDealer['address']); ?></h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->

                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <div>
                            <div class="section-1">
                                <h2>Add New Credentials</h2>
                                <!-- id, username, userpassword, isactive, distributorid, firstname, lastname, mobileno, roletype, createdate, modifydate -->
                                <form action="../../../controllers/dealer/dealer_credentials/process_dealer_Credentials.php" method="POST" id="dealerForm">
                                    <!-- //id, name, isactive, primarymobileno, secondmobileno, emailaddress, address, city -->
                                    <input type="hidden" name="Dealer_id" value="<?php echo $currentDealer['id']; ?>">
                                    <div class="row row-gap-2">
                                        <div class="col-md-6">
                                            <label for="DU_username" class="form-label">Userame</label>
                                            <input type="text" class="form-control shadow-none" name="DU_username" id="DU_username" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="DU_password" class="form-label">User Password</label>
                                            <input type="tel" class="form-control shadow-none" name="DU_password" id="DU_password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="DU_fname" class="form-label">Firstname</label>
                                            <input type="tel" class="form-control shadow-none" name="DU_fname" id="DU_fname" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="DU_lname" class="form-label">Lastname</label>
                                            <input type="mail" class="form-control shadow-none" name="DU_lname" id="DU_lname" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="DU_mobile" class="form-label">MobileNo</label>
                                            <input type="text" class="form-control shadow-none" name="DU_mobile" id="DU_mobile" placeholder="1234 Main St" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="DU_role" class="form-label">RoleType</label>
                                            <input type="text" class="form-control shadow-none" name="DU_role" id="DU_role" required>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-2">
                                            <button type="reset" class="btn btn-secondary shadow-none mr-2">Reset</button>
                                            <button type="submit" class="btn btn-primary shadow-none">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->

                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <div>
                            <div class="section-1">
                                <h2>Show Dealer Credentials</h2>
                                <!-- id, username, userpassword, isactive, distributorid, firstname, lastname, mobileno, roletype, createdate, modifydate -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>username</th>
                                                <th>Action</th>
                                                <th>distributorid</th>
                                                <th>firstname</th>
                                                <th>lastname</th>
                                                <th>mobileno</th>
                                                <th>roletype</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($dealercredentials) : ?>
                                                <?php foreach ($dealercredentials as $dealercredential) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($dealercredential['username']); ?> <span class="badge badge-pill badge-<?php echo ($dealercredential['isactive'] == 'Y') ? 'success' : 'danger' ?> ml-1 p-1"> </span></td>
                                                        <td class="d-flex justify-content-center">
                                                            <button class="btn btn-info btn-sm edit-btn ml-1" data-id="<?php echo $dealercredential['id'];
                                                                                                                        ?>">
                                                                <i class="fas fa-pencil-alt"></i> Edit
                                                            </button>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($dealercredential['distributorid']); ?></td>
                                                        <td><?php echo htmlspecialchars($dealercredential['firstname']); ?></td>
                                                        <td><?php echo htmlspecialchars($dealercredential['lastname']); ?></td>
                                                        <td><?php echo htmlspecialchars($dealercredential['mobileno']); ?></td>
                                                        <td><?php echo htmlspecialchars($dealercredential['roletype']); ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="7">No Dealers found.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>username</th>
                                                <th>Action</th>
                                                <th>distributorid</th>
                                                <th>firstname</th>
                                                <th>lastname</th>
                                                <th>mobileno</th>
                                                <th>roletype</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('../../../includes/footer.php') ?>
    <?php require_once('../../../includes/asidde-end.php') ?>
    </div>
    <!-- ./wrapper -->
    <?php require_once('../../../includes/script.php') ?>
     <!-- DataTables  & Plugins -->
     <script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });

        $(document).ready(function() {
            

            $(document).on('click', '.credentials-btn', function() {
                var id = $(this).data('id');
                window.location.href = '<?php echo BASE_URL; ?>pages/dealer/dealer_credentials/update_dealer_credentials.php?id=' + id;
            });
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                window.location.href = '<?php echo BASE_URL; ?>pages/dealer/dealer_credentials/update_dealer_credentials.php?id=' + id;
            });
        });
    </script>
    <?php displaySessionMessage(5000); // 10000 milliseconds = 10 seconds 
    ?>

</body>

</html>