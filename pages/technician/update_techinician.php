<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();

$technician = new Technician($db);
$technicianId = $_GET['id'];
$currentTechnician = $technician->getTechnicianById($technicianId);

// You can now use your models here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Technician</title>
    <?php require_once('../../includes/link.php')  ?>
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
                            <h1>Update Technician</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Technician</li>
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- id, username, password, primarymobileno, secondmobileno, firstname, lastname, address, city, roletype, isactive, createdate, modifydate, lastlogindate -->
  <!-- Main content -->
  <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Technician</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <form action="../../controllers/Technician/processUpdate_technician.php" method="POST" id="complaintForm">
                                        <input type="hidden" name="technicianId" value="<?php echo $currentTechnician['id']; ?>">

                                            <div class="row row-gap-2">
                                                <div class="col-md-6">
                                                    <label for="Technician_username" class="form-label">username</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_username" id="Technician_username" value="<?php echo htmlspecialchars($currentTechnician['username']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_password" class="form-label">password</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_password" id="Technician_password" value="<?php echo htmlspecialchars($currentTechnician['password']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_pnumber" class="form-label">primarymobileno</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_pnumber" id="Technician_pnumber" value="<?php echo htmlspecialchars($currentTechnician['primarymobileno']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_snumber" class="form-label">secondmobileno</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_snumber" id="Technician_snumber" value="<?php echo htmlspecialchars($currentTechnician['secondmobileno']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_fname" class="form-label">firstname</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_fname" id="Technician_fname" value="<?php echo htmlspecialchars($currentTechnician['firstname']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_lname" class="form-label">lastname</label>
                                                    <input type="tel" class="form-control shadow-none" name="Technician_lname" id="Technician_lname" value="<?php echo htmlspecialchars($currentTechnician['lastname']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_address" class="form-label">address</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_address" id="Technician_address" value="<?php echo htmlspecialchars($currentTechnician['address']); ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Technician_city" class="form-label">city</label>
                                                    <input type="text" class="form-control shadow-none" name="Technician_city" id="Technician_city" value="<?php echo htmlspecialchars($currentTechnician['city']); ?>" required>
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

        <?php require_once('../../includes/footer.php') ?>
        <?php require_once('../../includes/asidde-end.php') ?>
    </div>

    <?php require_once('../../includes/script.php')  ?>
</body>

</html>
