<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
// You can now use your models here

$technician = new Technician($db);
$technicians = $technician->getAllTechnicians();

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
                            <h1>Complaint Show</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint</li>
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
                            <h3 class="card-title">Complainnt Show</h3>
                        </div> 
                        <div class="ml-auto"><a href="<?php echo BASE_URL; ?>pages/technician/register_techinician.php"><button type="button" class="btn btn-outline-success">Register Complaint</button></a></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                            <!-- id`, `username`, `primarymobileno`, `secondmobileno`, `firstname`, `lastname`, `address`, `city`, `isactive` -->
                                <tr>
                                    <th>username</th>
                                    <th>Action</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>primarymobileno</th>
                                    <th>secondmobileno</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>isactive</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($technicians) : ?>
                                    <?php foreach ($technicians as $technician) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($technician['username']); ?></td>
                                            <td class="d-flex justify-content-center">
                                                <button class="btn btn-primary btn-sm mr-1 view-btn" data-id="<?php echo $technician['id']; ?>">
                                                    <i class="fas fa-folder"></i> View
                                                </button>
                                                <button class="btn btn-info btn-sm edit-btn" data-id="<?php echo $technician['id']; ?>">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </button>
                                            </td>
                                            <td><?php echo htmlspecialchars($technician['firstname']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['lastname']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['primarymobileno']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['secondmobileno']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['address']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['city']); ?></td>
                                            <td><?php echo htmlspecialchars($technician['isactive']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6">No technicians found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>username</th>
                                <th>Action</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>primarymobileno</th>
                                    <th>secondmobileno</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>isactive</th>
                                </tr>
                            </tfoot>
                            <!-- Modal -->
                            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel">Complaint Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Complaint details will be loaded here -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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



    <script>
        $(document).ready(function() {
            $('#example2').on('click', '.view-btn', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo BASE_URL; ?>controllers/complaint/get_complaint_details.php',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#viewModal').modal('show');
                    }
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.view-btn', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo BASE_URL; ?>controllers/complaint/get_complaint_details.php',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#viewModal').modal('show');
                    }
                });
            });

            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                window.location.href = '<?php echo BASE_URL; ?>pages/technician/update_techinician.php?id=' + id;
            });
        });
    </script>
</body>

</html>