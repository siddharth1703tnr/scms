<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Dealer.php';

$database = new Database();
$db = $database->getConnection();
// You can now use your models here

$dealer = new Dealer($db);
$dealers = $dealer->getAllDealer()
//$complaints = $complaint->getAllComplaints();



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

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dealer Show</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dealer</li>
                                <li class="breadcrumb-item active">Show</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="card card-warning card-outline">
                    <div class="card-header d-flex justify-content-between">
                        <div class="mr-auto">
                            <h3 class="card-title">Dealer Show</h3>
                        </div>
                        <div class="ml-auto"><a href="<?php echo BASE_URL; ?>pages/dealer/register.php"><button type="button" class="btn btn-outline-success">Register Dealer</button></a></div>
                    </div>
                    <!-- /.card-header id, name, isactive, primarymobileno, secondmobileno, emailaddress, address, city -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Dealer Name</th>
                                    <th>Action</th>
                                    <th>Dealer Pri. Number</th>
                                    <th>Dealer Sec. Number</th>
                                    <th>Dealer Mail</th>
                                    <th>Dealer Address</th>
                                    <th>Dealer City</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dealers) : ?>
                                    <?php foreach ($dealers as $dealer) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($dealer['name']); ?> <span class="badge badge-pill badge-<?php echo ($dealer['isactive'] == 'Y') ? 'success' : 'danger' ?> ml-1 p-1"> </span></td>
                                            <td class="d-flex justify-content-center">
                                                <button class="btn btn-success btn-sm credentials-btn" data-id="<?php echo $dealer['id']; 
                                                                                                        ?>">
                                                    <i class="fas fa-users"></i></i> Credentials
                                                </button>
                                                <button class="btn btn-info btn-sm edit-btn ml-1" data-id="<?php echo $dealer['id']; 
                                                                                                        ?>">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </button>
                                            </td>
                                            <td><?php echo htmlspecialchars($dealer['primarymobileno']); ?></td>
                                            <td><?php echo htmlspecialchars($dealer['secondmobileno']); ?></td>
                                            <td><?php echo htmlspecialchars($dealer['emailaddress']); ?></td>
                                            <td><?php echo htmlspecialchars($dealer['address']); ?></td>
                                            <td><?php echo htmlspecialchars($dealer['city']); ?></td>

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
                                    <th>Dealer Name</th>
                                    <th>Action</th>
                                    <th>Dealer Pri. Number</th>
                                    <th>Dealer Sec. Number</th>
                                    <th>Dealer Mail</th>
                                    <th>Dealer Address</th>
                                    <th>Dealer City</th>
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

        $(document).ready(function() {
            

            $(document).on('click', '.credentials-btn', function() {
                var id = $(this).data('id');
                window.location.href = '<?php echo BASE_URL; ?>pages/dealer/dealer_credentials/credentials.php?id=' + id;
            });
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                window.location.href = '<?php echo BASE_URL; ?>pages/dealer/update.php?id=' + id;
            });
        });
    </script>
    <?php displaySessionMessage(5000); // 10000 milliseconds = 10 seconds 
    ?>

</body>

</html>