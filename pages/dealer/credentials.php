<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Dealer.php';

$database = new Database();
$db = $database->getConnection();
$dealer = new Dealer($db);
//$technician = new Technician($db);

$dealerId = $_GET['id'];
$currentDealer = $dealer->getDealerById($dealerId); // Assuming this function exists
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Dealer</title>
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
                               <form action="../../controllers/dealer/process_dealer_Credentials.php" method="POST" id="dealerForm">
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
                               
                            </div>
                        </div>
                    </div>
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