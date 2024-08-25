<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
// You can now use your models here
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
                            <h1>Techion Managment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Technician</li>
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
                            <h3 class="card-title">Technician Show</h3>
                        </div>
                        <div class="ml-auto">
                            <!-- Button to open the modal -->
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#registerTechnicianModal">
                                Register Technician
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="technicianTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <!-- id`, `username`, `primarymobileno`, `secondmobileno`, `firstname`, `lastname`, `address`, `city`, `isactive` -->
                                <tr>
                                    <th>Username</th>
                                    <th>ACTION</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Primary Mobile No</th>
                                    <th>Second Mobile No</th>
                                    <th>Address</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be inserted here via AJAX -->
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Update Modal -->
                <div class="modal fade" id="updateTechnicianModal" tabindex="-1" role="dialog" aria-labelledby="updateTechnicianModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                        <form id="editForm" novalidate>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateTechnicianModalLabel">Update Technician</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-primary card-outline mt-2">
                                        <div class="card-body">
                                            <div class="row row-gap-2">
                                                <input type="hidden" id="technicianId" name="technicianId">
                                                <!-- <div class="col-md-6">
                                                    <label for="Technician_username" class="form-label">username</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_username" id="Technician_username" required>
                                                    <div class="invalid-feedback">Please enter a username.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_password" class="form-label">password</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_password" id="Technician_password" required>
                                                    <div class="invalid-feedback">Please enter a Password.</div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <label for="Technician_pnumber" class="form-label">primarymobileno</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_pnumber" id="Technician_pnumber" pattern="[0-9]{10}" required>
                                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_snumber" class="form-label">secondmobileno</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_snumber" id="Technician_snumber" pattern="[0-9]{10}" required>
                                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_fname" class="form-label">firstname</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_fname" id="Technician_fname" required>
                                                    <div class="invalid-feedback">Please enter a First Name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_lname" class="form-label">lastname</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_lname" id="Technician_lname" required>
                                                    <div class="invalid-feedback">Please enter a Last Name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_address" class="form-label">address</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_address" id="Technician_address" required>
                                                    <div class="invalid-feedback">Please enter a address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_city" class="form-label">city</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_city" id="Technician_city" required>
                                                    <div class="invalid-feedback">Please enter a city.</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dealerStatus">Technician Status</label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="dealerStatus" name="isactive" value="Y">
                                                            <label class="custom-control-label" for="dealerStatus" id="statusLabel">Inactive</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary shadow-none mr-2" id="updateReset">Reset</button> -->
                                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register(Insert) Modal -->
                <div class="modal fade" id="registerTechnicianModal" tabindex="-1" role="dialog" aria-labelledby="registerTechnicianModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <form id="registerTechnicianForm" novalidate>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registerTechnicianModalLabel">Register New Technician</h5>
                                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-primary card-outline mt-2">
                                        <div class="card-body">
                                            <div class="row row-gap-2">
                                                <div class="col-md-6">
                                                    <label for="Technician_username" class="form-label">UserName</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_username" id="Reg_Technician_username" required>
                                                    <div class="invalid-feedback">Please enter a username.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_password" class="form-label">Password</label>
                                                    <input type="password" class="form-control shadow-none" name="Technician_password" id="Technician_password" required>
                                                    <div class="invalid-feedback">Please enter a Password.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_pnumber" class="form-label">Primary MobileNo</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_pnumber" id="Technician_pnumber" pattern="[0-9]{10}" required>
                                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_snumber" class="form-label">Second MobileNo</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_snumber" id="Technician_snumber" pattern="[0-9]{10}" required>
                                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_fname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_fname" id="Technician_fname" required>
                                                    <div class="invalid-feedback">Please enter a First Name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_lname" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_lname" id="Technician_lname" required>
                                                    <div class="invalid-feedback">Please enter a Last Name.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_address" id="Technician_address" placeholder="1234 Main St" required>
                                                    <div class="invalid-feedback">Please enter a Address.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_city" class="form-label">City</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_city" id="Technician_city" required>
                                                    <div class="invalid-feedback">Please enter a City.</div>
                                                </div>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary shadow-none mr-2" id="resetButton">Reset</button>
                                    <button type="submit" class="btn btn-primary shadow-none">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
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

    <script>

        // Handle To Retriv Data Fromm Techion Table To Populate In Table
        $(document).ready(function() {
            var table = $('#technicianTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "ajax": {
                    "url": '../../controllers/Technician/ajax/fetchTechnicians.php',
                    "method": "POST", // Ensure you're using POST method to send the action parameter
                    "data": {
                        action: 'getAllData' // Pass the action parameter
                    },
                    "dataSrc": ''
                },
                "columns": [{
                        "data": "username",
                        "render": function(data, type, row) {
                            var statusDot = '<span class="badge badge-pill badge-' + (row.isactive == 'Y' ? 'success' : 'danger') + ' ml-1 p-1"> </span>';
                            return data + statusDot;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<button class="btn btn-warning btn-sm btn-edit" data-id="${row.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm deleteBtn" data-id="${row.id}">Delete</button>`;
                        }
                    },
                    {
                        "data": "firstname"
                    },
                    {
                        "data": "lastname"
                    },
                    {
                        "data": "primarymobileno"
                    },
                    {
                        "data": "secondmobileno"
                    },
                    {
                        "data": "address"
                    },
                    {
                        "data": "city"
                    },

                ]
            });
        });

        // Handle Registration Operations
        $(document).ready(function() {
            // Function to check username uniqueness
            function checkUsername(callback) {
                var Reg_Technician_username = $("#Reg_Technician_username").val();

                if (Reg_Technician_username.length > 0) {
                    $.ajax({
                        url: '../../controllers/Technician/process_technician.php',
                        type: 'POST',
                        data: {
                            Reg_Technician_username: Reg_Technician_username,
                            username_check: true // Add this to differentiate from registration
                        },
                        success: function(response) {
                            if (response.exists) {
                                $("#Reg_Technician_username").addClass("is-invalid");
                                $("#Reg_Technician_username").siblings(".invalid-feedback").text("This username is already taken.");
                                callback(false); // Username is taken, don't submit the form
                            } else {
                                $("#Reg_Technician_username").removeClass("is-invalid");
                                $("#Reg_Technician_username").siblings(".invalid-feedback").text("");
                                callback(true); // Username is unique, proceed with form submission
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Full Response:', xhr.responseText);
                            alert('Error: ' + xhr.responseText);
                            callback(false); // Handle error by preventing form submission
                        }
                    });
                } else {
                    $("#Reg_Technician_username").removeClass("is-invalid");
                    $("#Reg_Technician_username").siblings(".invalid-feedback").text("");
                    callback(true); // No username entered, proceed with form submission
                }
            }

            // Handle form submission
            $("#registerTechnicianForm").on("submit", function(event) {
                event.preventDefault(); // Prevent default form submission

                var form = $(this);
                form.addClass('was-validated'); // Add Bootstrap validation classes

                // Check username uniqueness before submitting the form
                checkUsername(function(isUnique) {
                    if (isUnique && form[0].checkValidity() === true) {
                        // If the username is unique and the form is valid, submit via AJAX
                        $.ajax({
                            url: '../../controllers/Technician/process_technician.php', // URL to your PHP handler
                            type: 'POST',
                            data: form.serialize(), // Serialize form data
                            success: function(response) {

                                if (response.status.trim() == 'success') {
                                    $(document).Toasts('create', {
                                        class: response.class,
                                        title: response.title,
                                        subtitle: response.subtitle,
                                        body: response.body,
                                        delay: 5000,
                                        autohide: true
                                    });
                                }
                                // Handle success
                                table.ajax.reload(); // Reload the table data
                                resetForm(); // Reset the form and clear validation classes
                                $('#registerTechnicianModal').modal('hide'); // Hide the modal

                                //alert('Technician registered successfully!');
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                alert('Error: ' + xhr.responseText);
                            }
                        });
                    } else {
                        event.stopPropagation(); // Stop the form from submitting if invalid
                    }
                });
            });

            // Check username on input
            $("#Reg_Technician_username").on("input", function() {
                checkUsername(function() {});
            });

            // Handle reset button click
            $("#resetButton").on("click", function() {
                resetForm();
            });

            // Function to reset form and clear validation
            function resetForm() {
                var form = $("#registerTechnicianForm");
                form[0].reset(); // Reset the form
                form.removeClass('was-validated'); // Remove validation classes
                form.find(".is-invalid").removeClass("is-invalid"); // Remove is-invalid classes
                form.find(".invalid-feedback").text(""); // Clear validation messages
            }
        });

        // Handle Update Operations
        $(document).ready(function() {
            // Handle edit button click to load technician data
            $('#technicianTable').on('click', '.btn-edit', function() {
                var technicianId = $(this).data('id');

                // Fetch technician data by ID
                $.ajax({
                    url: '../../controllers/Technician/ajax/fetchTechnicians.php', // Adjust the path to your file
                    method: 'POST',
                    data: {
                        action: 'getById',
                        id: technicianId
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Modal Data:', response); // Debugging output

                        // Populate the form fields
                        $('#technicianId').val(response.id);
                        $('#Technician_password').val(response.password);
                        $('#Technician_username').val(response.username);
                        $('#Technician_pnumber').val(response.primarymobileno);
                        $('#Technician_snumber').val(response.secondmobileno);
                        $('#Technician_fname').val(response.firstname);
                        $('#Technician_lname').val(response.lastname);
                        $('#Technician_address').val(response.address);
                        $('#Technician_city').val(response.city);

                        // Handle Technician Status
                        if (response.isactive === 'Y') {
                            $('#dealerStatus').prop('checked', true);
                            $('#statusLabel').text('Active');
                        } else {
                            $('#dealerStatus').prop('checked', false);
                            $('#statusLabel').text('Inactive');
                        }

                        // Show the modal
                        $('#updateTechnicianModal').modal('show');
                    }
                });
            });

            // Update label based on switch state
            $('#dealerStatus').change(function() {
                if ($(this).is(':checked')) {
                    $('#statusLabel').text('Active');
                    $(this).val('Y');
                } else {
                    $('#statusLabel').text('Inactive');
                    $(this).val('N');
                }
            });

            // Handle form submission with validation
            $('#editForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                var form = $(this);

                // Add Bootstrap validation classes
                form.addClass('was-validated');

                // If the form is valid, proceed with AJAX submission
                if (form[0].checkValidity() === true) {
                    $.ajax({
                        url: '../../controllers/Technician/processUpdate_technician.php', // Adjust the path to your file
                        method: 'POST',
                        data: form.serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status.trim() == 'success') {
                                $(document).Toasts('create', {
                                    class: response.class,
                                    title: response.title,
                                    subtitle: response.subtitle,
                                    body: response.body,
                                    delay: 5000,
                                    autohide: true
                                });
                            }

                            // Close the modal
                            $('#updateTechnicianModal').modal('hide');
                            // Reload the table data
                            table.ajax.reload();
                            // Clear the form and validation
                            resetForm();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    e.stopPropagation(); // Stop form submission if invalid
                }
            });

            // Reset form and validation when the modal is hidden
            $('#updateTechnicianModal').on('hidden.bs.modal', function() {
                resetForm();
            });

            // Function to reset form and clear validation
            function resetForm() {
                var form = $('#editForm');
                form[0].reset(); // Reset the form fields
                form.removeClass('was-validated'); // Remove validation classes
                form.find('.is-invalid').removeClass('is-invalid'); // Remove is-invalid classes
                form.find('.invalid-feedback').text(''); // Clear validation messages
            }

            // Handle reset button click (if you have one)
            $('#resetButton').on('click', function() {
                resetForm();
            });
        });
    </script>
</body>

</html>