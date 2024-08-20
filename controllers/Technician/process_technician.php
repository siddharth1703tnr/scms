<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $createdate = date('Y-m-d H:i:s');
    $isActive = 'Y';
    $roleType = 'Technician';

   // <!-- id, username, password, primarymobileno, secondmobileno, firstname, lastname, address, city, roletype, isactive, createdate, modifydate, lastlogindate -->

    $data = [
        'username' => $_POST['Technician_username'], 
        'password' => $_POST['Technician_password'], 
        'primarymobileno' => $_POST['Technician_pnumber'], 
        'secondmobileno' => $_POST['Technician_snumber'], 
        'firstname' => $_POST['Technician_fname'], 
        'lastname' => $_POST['Technician_lname'], 
        'address' => $_POST['Technician_address'], 
        'city' => $_POST['Technician_city'], 
        'roletype' => $roleType, 
        'isactive' => $isActive,
        'createdate' => $createdate

    ];

    if ($technician->registerTechnician($data)) {
        header("Location: " . BASE_URL . "pages/complaint/show.php");
    } else {
        echo "Error: Could not register complaint.";
    }
}
