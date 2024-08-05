<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Complaint.php';
require_once '../../classes/Technician.php'; // Assuming this class exists for fetching technician details

$database = new Database();
$db = $database->getConnection();
$complaint = new Complaint($db);
//$technician = new Technician($db);

$complaintId = $_GET['id'];
$currentComplaint = $complaint->getComplaintById($complaintId); // Assuming this function exists
$technicians = $complaint->getTechnicians(); // Assuming this function exists
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Complaint</title>
    <?php require_once('../../includes/link.php')  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php require_once('../../includes/preloder.php') ?>
        <?php require_once('../../includes/navbar.php') ?>
        <?php require_once('../../includes/asidde-st.php') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Complaint</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint</li>
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <form action="../../controllers/complaint/update_process.php" method="POST" id="complaintForm">
                            <input type="hidden" name="complaint_id" value="<?php echo $currentComplaint['id']; ?>">
                            <div class="row row-gap-2">
                                <div class="col-md-6">
                                    <label for="Cus_Name" class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_Name" id="Cus_Name" value="<?php echo htmlspecialchars($currentComplaint['customername']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_Mobile_No" class="form-label">Phone</label>
                                    <input type="tel" class="form-control shadow-none" name="Cus_Mobile_No" id="Cus_Mobile_No" value="<?php echo htmlspecialchars($currentComplaint['customermobileno']); ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="Cus_Address" class="form-label">Address</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_Address" id="Cus_Address" placeholder="1234 Main St" value="<?php echo htmlspecialchars($currentComplaint['customeraddress']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_City" class="form-label">City</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_City" id="Cus_City" value="<?php echo htmlspecialchars($currentComplaint['customercity']); ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="Cus_calltype" class="form-label">Call-Type</label>
                                    <select class="form-control shadow-none" name="Cus_calltype" id="Cus_calltype" required>
                                        <option value="Fridge" <?php echo ($currentComplaint['calltype'] == 'Fridge') ? 'selected' : ''; ?>>Fridge</option>
                                        <option value="AC" <?php echo ($currentComplaint['calltype'] == 'AC') ? 'selected' : ''; ?>>AC</option>
                                        <option value="TV" <?php echo ($currentComplaint['calltype'] == 'TV') ? 'selected' : ''; ?>>TV</option>
                                        <option value="Washing Machine" <?php echo ($currentComplaint['calltype'] == 'Washing Machine') ? 'selected' : ''; ?>>Washing Machine</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_payment" class="form-label">Payment-Type</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_payment" id="Cus_payment" value="<?php echo htmlspecialchars($currentComplaint['paymenttype']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_calldate" class="form-label">Call Date</label>
                                    <input type="date" class="form-control shadow-none" name="Cus_calldate" id="Cus_calldate" value="<?php echo htmlspecialchars($currentComplaint['calldate']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_assigndate" class="form-label">Assign Date</label>
                                    <input type="date" class="form-control shadow-none" name="Cus_assigndate" id="Cus_assigndate" value="<?php echo htmlspecialchars($currentComplaint['callassigndate']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_completedate" class="form-label">Complete Date</label>
                                    <input type="date" class="form-control shadow-none" name="Cus_completedate" id="Cus_completedate" value="<?php echo htmlspecialchars($currentComplaint['callcompletedate']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_callstatus" class="form-label">Call Status</label>
                                    <select class="form-control shadow-none" name="Cus_callstatus" id="Cus_callstatus" required>
                                        <option value="New" <?php echo ($currentComplaint['callstatus'] == 'New') ? 'selected' : ''; ?>>New</option>
                                        <option value="Assigned" <?php echo ($currentComplaint['callstatus'] == 'Assigned') ? 'selected' : ''; ?>>Assigned</option>
                                        <option value="Part Pending" <?php echo ($currentComplaint['callstatus'] == 'Part Pending') ? 'selected' : ''; ?>>Part Pending</option>
                                        <option value="Pending" <?php echo ($currentComplaint['callstatus'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Appointment Given" <?php echo ($currentComplaint['callstatus'] == 'Appointment Given') ? 'selected' : ''; ?>>Appointment Given</option>
                                        <option value="Closed" <?php echo ($currentComplaint['callstatus'] == 'Closed') ? 'selected' : ''; ?>>Closed</option>
                                        <option value="Cancelled" <?php echo ($currentComplaint['callstatus'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_technicianassign" class="form-label">Technician Assigned</label>
                                    <select class="form-control shadow-none" id="Cus_technicianassign" name="Cus_technicianassign" required>
                                        <option value="">Select Technician</option>
                                        <?php foreach ($technicians as $technician) : ?>
                                            <option value="<?php echo $technician['id']; ?>" <?php echo ($currentComplaint['technicianassigned'] == $technician['id']) ? 'selected' : ''; ?>>
                                                <?php echo $technician['firstname'] . ' ' . $technician['lastname']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback" id="Cus_technicianassign_error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="Cus_totalamount" class="form-label">Total Amount</label>
                                    <input type="number" class="form-control shadow-none" name="Cus_totalamount" id="Cus_totalamount" value="<?php echo htmlspecialchars($currentComplaint['totalamount']); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="Cus_disamount" class="form-label">Discount Amount</label>
                                    <input type="number" class="form-control shadow-none" name="Cus_disamount" id="Cus_disamount" value="<?php echo htmlspecialchars($currentComplaint['discountamount']); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="Cus_finalamount" class="form-label">Final Amount</label>
                                    <input type="number" class="form-control shadow-none" name="Cus_finalamount" id="Cus_finalamount" value="<?php echo htmlspecialchars($currentComplaint['finalamount']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_cusprob" class="form-label">Customer Problem</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_cusprob" id="Cus_cusprob" value="<?php echo htmlspecialchars($currentComplaint['customerproblem']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cus_callresolution" class="form-label">Customer Resolution</label>
                                    <input type="text" class="form-control shadow-none" name="Cus_callresolution" id="Cus_callresolution" value="<?php echo htmlspecialchars($currentComplaint['callresolution']); ?>">
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-2">
                                    <button type="reset" class="btn btn-secondary shadow-none mr-2">Reset</button>
                                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php require_once('../../includes/footer.php') ?>
        <?php require_once('../../includes/asidde-end.php') ?>
    </div>
    <!-- ./wrapper -->
    <?php require_once('../../includes/script.php') ?>
</body>

</html>