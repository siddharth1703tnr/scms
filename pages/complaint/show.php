<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();

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
                        <div class="ml-auto"><a href="<?php echo BASE_URL; ?>pages/complaint/register.php"><button type="button" class="btn btn-outline-success">Register Complaint</button></a></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="complaintTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Call Number</th>
                                    <th>Customer Name</th>
                                    <th>Customer MobileNo</th>
                                    <th>Customer Address</th>
                                    <th>Customer Problem</th>
                                    <th>Call Type</th>
                                    <th>Call Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Call Number</th>
                                    <th>Customer Name</th>
                                    <th>Customer MobileNo</th>
                                    <th>Customer Address</th>
                                    <th>Customer Problem</th>
                                    <th>Call Type</th>
                                    <th>Call Status</th>
                                    <th>Actions</th>

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
        $(document).ready(function() {
            var table = $('#complaintTable').DataTable({
                "processing": true, // Show a processing indicator
                "serverSide": true, // Server-side processing for pagination, sorting, and searching
                "ajax": {
                    "url": "../../controllers/complaint/ajax/fetchCoplaints.php", // URL of the PHP file handling the AJAX request
                    "type": "POST", // Type of HTTP request
                    "data": {
                        "action": "getAllComplaintData" // Action to be performed (fetch data)
                    },
                    "dataSrc": function(json) {
                        if (json.error) {
                            alert(json.error); // Alert the user if there's an error
                            return []; // Return an empty array if there's an error
                        } else {
                            return json.data; // Otherwise, return the data
                        }
                    }
                },
                "columns": [{
                        "data": "callnumber"
                    }, // First name
                    {
                        "data": "customername"
                    }, // Last name
                    {
                        "data": "customermobileno"
                    }, // Primary mobile number
                    {
                        "data": "customeraddress",
                        "orderable": false // Disable sorting for the address column
                    }, // Secondary mobile number
                    {
                        "data": "customerproblem",
                        "orderable": false // Disable sorting for the address column
                    }, // Secondary mobile number
                    {
                        "data": "calltype", // Address
                        "orderable": false // Disable sorting for the address column
                    },
                    {
                        "data": "callstatus",
                        "orderable": false, // Disable sorting for the address column
                        "render": function(data, type, row) {
                            var badgeClass;

                            // Determine the badge class based on the callstatus value
                            switch (data) {
                                case 'New':
                                    badgeClass = 'success';
                                    break;
                                case 'Assigned':
                                    badgeClass = 'warning';
                                    break;
                                case 'Close':
                                    badgeClass = 'info';
                                    break;
                                case 'Cancelled':
                                    badgeClass = 'secondary';
                                    break;
                                default:
                                    badgeClass = '';
                                    break;
                            }

                            // Create the badge HTML
                            var statusBadge = '<span class="badge badge-pill badge-' + badgeClass + '">' + data + '</span>';
                            return statusBadge;
                        }
                    },
                    {
                        "data": null, // Action buttons (Edit)
                        "orderable": false, // Disable sorting for this column
                        "render": function(data, type, row) {
                            return `<button class="btn btn-primary btn-sm btn-edit" data-id="${row.id}" title="Edit" ><i class="far fa-edit"></i></button>`;
                        }
                    }
                ],
                "responsive": true, // Make the table responsive
                "pageLength": 10, // Default number of rows per page
                "lengthChange": true, // Allow the user to change the number of rows displayed
                "lengthMenu": [5, 10, 25, 50, 100], // Options for the rows-per-page dropdown
                "autoWidth": false, // Disable automatic column width calculation
                "order": [
                    [0, 'asc']
                ], // Default sorting: ascending by ID
                "language": {
                    "paginate": {
                        "previous": "<i class='fas fa-angle-left'></i>", // Customize the "previous" pagination button
                        "next": "<i class='fas fa-angle-right'></i>" // Customize the "next" pagination button
                    }
                },
                // "dom": 'lBfrtip',  // Include the length menu and buttons
            });
        });
    </script>

</body>

</html>