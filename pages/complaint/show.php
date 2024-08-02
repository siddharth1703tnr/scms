<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();
// You can now use your models here

$complaint = new Complaint($db);
$complaints = $complaint->getAllComplaints();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php require_once('../../includes/link.php')  ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php require_once('../../includes/preloder.php') ?>
        <?php require_once('../../includes/navbar.php') ?>
        <?php require_once('../../includes/asidde-st.php') ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card card-warning card-outline mt-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="mr-auto"><h3 class="card-title">User Managements</h3></div>
                        <div class="ml-auto"><a href="<?php echo BASE_URL; ?>pages\complaint\register.php"><button type="button" class="btn btn-outline-success">Add User</button></a></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Call Number</th>
                                    <th></th>
                                    <th>Customer Name</th>
                                    <th>Customer MobileNo</th>
                                    <th>Customer Address</th>
                                    <th>Call Type</th>
                                    <th>Call Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($complaints) : ?>
                                    <?php foreach ($complaints as $complaint) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($complaint['callnumber']); ?></td>
                                            <td>

                                            </td>
                                            <td><?php echo htmlspecialchars($complaint['customername']); ?></td>
                                            <td><?php echo htmlspecialchars($complaint['customermobileno']); ?></td>
                                            <td><?php echo htmlspecialchars($complaint['customeraddress']); ?></td>
                                            <td><?php echo htmlspecialchars($complaint['calltype']); ?></td>
                                            <td><?php echo htmlspecialchars($complaint['callstatus']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6">No complaints found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Call Number</th>
                                    <th></th>
                                    <th>Customer Name</th>
                                    <th>Customer MobileNo</th>
                                    <th>Customer Address</th>
                                    <th>Call Type</th>
                                    <th>Call Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <?php require_once('../../includes/footer.php') ?>
        <?php require_once('../../includes/asidde-end.php') ?>
    </div>

    <?php require_once('../../includes/script.php')  ?>
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
    </script>
</body>

</html>