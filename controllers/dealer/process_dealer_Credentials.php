<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Dealer_Credentials.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST


$database = new Database();
$db = $database->getConnection();
$dealerUser = new DealerUSer($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // DU_username, DU_password, DU_fname, DU_lname, DU_mobile, DU_role
    // id, username, userpassword, isactive, distributorid, firstname, lastname, mobileno, roletype, createdate, modifydate
    $createdate = date('Y-m-d H:i:s');

    $data = [
        'username' => $_POST['DU_username'],
        'userpassword' => $_POST['DU_password'],
        'isactive' => "Y",
        'distributorid' => $_POST['Dealer_id'],
        'firstname' => $_POST['DU_fname'],
        'lastname' => $_POST['DU_lname'],
        'mobileno' => $_POST['DU_mobile'],
        'roletype' => $_POST['DU_role'],
        'createdate' => $createdate
    ];

    if ($dealerUser->registerDealerUser($data)) {
        setSessionMessage('success', 'Registration Success', 'success', 'Complaint registered successfully');
        header("Location: " . BASE_URL . "pages/dealer/show.php");
    } else {
        setSessionMessage('danger', 'Registration Failed', 'Error', 'Failed to register complaint');
        header("Location: " . BASE_URL . "pages/dealer/show.php");
    }
    exit;
    
}
?>
