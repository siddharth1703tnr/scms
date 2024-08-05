<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Customer.php';
require_once '../../classes/Complaint.php';
require_once '../../classes/Technician.php';
require_once '../../classes/Dealer.php';
require_once '../../classes/ServiceCall.php';

$database = new Database();
$db = $database->getConnection();

// You can now use your models here

$complaint = new Complaint($db);
$technicians = $complaint->getTechnicians();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php require_once('../../includes/link.php')  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require_once('../../includes/preloder.php') ?>
        <?php require_once('../../includes/navbar.php') ?>
        <?php require_once('../../includes/asidde-st.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>New Complaint Register</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint</li>
                                <li class="breadcrumb-item active">Register</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">New Register</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <form action="../../controllers/complaint/process_complaint.php" method="POST" id="complaintForm">
                                            <div class="row row-gap-2">
                                                <div class="col-md-6">
                                                    <label for="Cus_Name" class="form-label">Name</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_Name" id="Cus_Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_Mobile_No" class="form-label">Phone</label>
                                                    <input type="tel" class="form-control shadow-none" name="Cus_Mobile_No" id="Cus_Mobile_No" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="Cus_Address" class="form-label">Address</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_Address" id="Cus_Address" placeholder="1234 Main St" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_City" class="form-label">City</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_City" id="Cus_City" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Cus_calltype" class="form-label">Call-Type</label>
                                                    <select class="form-control shadow-none" name="Cus_calltype" id="Cus_calltype" required>
                                                        <option value="Fridge">Fridge</option>
                                                        <option value="AC">AC</option>
                                                        <option value="TV">TV</option>
                                                        <option value="Washing Machine">Washing Machine</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_payment" class="form-label">Payment-Type</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_payment" id="Cus_payment">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_calldate" class="form-label">Call Date</label>
                                                    <input type="date" class="form-control shadow-none" name="Cus_calldate" id="Cus_calldate" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_assigndate" class="form-label">Assign Date</label>
                                                    <input type="date" class="form-control shadow-none" name="Cus_assigndate" id="Cus_assigndate">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_completedate" class="form-label">Complete Date</label>
                                                    <input type="date" class="form-control shadow-none" name="Cus_completedate" id="Cus_completedate">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_callstatus" class="form-label">Call Status</label>
                                                    <select class="form-control shadow-none" name="Cus_callstatus" id="Cus_callstatus" required>
                                                        <option value="New">New</option>
                                                        <option value="Assigned">Assigned</option>
                                                        <option value="Part Pending">Part Pending</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Appointment Given">Appointment Given</option>
                                                        <option value="Closed">Closed</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    </select>
                                                </div>
                                                <!-- Technician Assigned field -->
                                                <div class="col-md-6">
                                                    <label for="Cus_technicianassign" class="form-label">Technician Assigned</label>
                                                    <select class="form-control shadow-none" id="Cus_technicianassign" name="Cus_technicianassign" required>
                                                        <option value="">Select Technician</option>
                                                        <?php foreach ($technicians as $technician) : ?>
                                                            <option value="<?php echo $technician['id']; ?>">
                                                                <?php echo $technician['firstname'] . ' ' . $technician['lastname']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback" id="Cus_technicianassign_error"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Cus_totalamount" class="form-label">Total Amount</label>
                                                    <input type="number" class="form-control shadow-none" name="Cus_totalamount" id="Cus_totalamount">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Cus_disamount" class="form-label">Discount Amount</label>
                                                    <input type="number" class="form-control shadow-none" name="Cus_disamount" id="Cus_disamount">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Cus_finalamount" class="form-label">Final Amount</label>
                                                    <input type="number" class="form-control shadow-none" name="Cus_finalamount" id="Cus_finalamount">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_cusprob" class="form-label">Customer Problem</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_cusprob" id="Cus_cusprob">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Cus_callresolution" class="form-label">Customer Resolution</label>
                                                    <input type="text" class="form-control shadow-none" name="Cus_callresolution" id="Cus_callresolution">
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-2">
                                                    <button type="reset" class="btn btn-secondary shadow-none mr-2">Reset</button>
                                                    <button type="submit" class="btn btn-primary shadow-none">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php require_once('../../includes/footer.php') ?>
        <?php require_once('../../includes/asidde-end.php') ?>
    </div>

    <?php require_once('../../includes/script.php')  ?>
</body>

</html>