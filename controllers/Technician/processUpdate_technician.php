<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle the actual update process (assuming all validation checks have passed)
    if (isset($_POST['technicianId']) && isset($_POST['Technician_pnumber'])) {
        $modifydate = date('Y-m-d H:i:s');
        $isActive = 'Y';
        $id = $_POST['technicianId'];
        $isActive = isset($_POST['isactive']) && $_POST['isactive'] == 'Y' ? 'Y' : 'N';

        // <!-- id, username, password, primarymobileno, secondmobileno, firstname, lastname, address, city, roletype, isactive, createdate, modifydate, lastlogindate -->

        $data = [
            // 'username' => $_POST['Technician_username'], 
            // 'password' => $_POST['Technician_password'], 
            'primarymobileno' => $_POST['Technician_pnumber'],
            'secondmobileno' => $_POST['Technician_snumber'],
            'firstname' => $_POST['Technician_fname'],
            'lastname' => $_POST['Technician_lname'],
            'address' => $_POST['Technician_address'],
            'city' => $_POST['Technician_city'],
            'isactive' => $isActive,
            'modifydate' => $modifydate

        ];

        if ($technician->updateTechnician($id, $data)) {
            echo json_encode([ 'status' => 'success','class' => 'bg-success', 'title' => 'Update', 'subtitle' => 'Success', 'body' => 'Technician updated successfully']);
            //header("Location: " . BASE_URL . "pages/complaint/show.php");
        } else {
            echo json_encode([ 'status' => 'success','class' => 'bg-danger', 'title' => 'Update Erroe', 'subtitle' => 'Error', 'body' => 'Technician updated Not Done']);
            echo "Error: Could not register complaint.";
        }
    }
}
