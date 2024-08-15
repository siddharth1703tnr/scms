<?php
require_once '../../../config/config.php';
require_once '../../../classes/Database.php';
require_once '../../../classes/Dealer_Credentials.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST


$database = new Database();
$db = $database->getConnection();
$dealer_credentials = new Dealer_Credentials($db);


$id = $_POST['Dealer_Credentials_id'];
$dealerid = $_POST[''];
$data = $_POST;
$isActive = isset($_POST['isactive']) && $_POST['isactive'] == 'Y' ? 'Y' : 'N';


unset($data['Dealer_Credentials_id']); // Remove action and id from data
// id, username, userpassword, isactive, distributorid, firstname, lastname, mobileno, roletype, createdate, modifydate
$modifydate = date('Y-m-d H:i:s');
$data = [
    'username' => $_POST['DU_username'], 
    'userpassword' => $_POST['DU_password'], 
    'isactive' => $isActive, 
   // 'distributorid' => $_POST[''], 
    'firstname' => $_POST['DU_fname'], 
    'lastname' => $_POST['DU_fname'], 
    'mobileno' => $_POST['DU_mobile'], 
    'roletype' => $_POST['DU_role'], 
    'modifydate' => $modifydate
];

if ($dealer_credentials->updateDealerCredentialsById($id, $data)) {
    setSessionMessage('success', 'Cancellation', 'Success', 'Complaint cancelled successfully');
    header('Location: ' . BASE_URL . 'pages/dealer/dealer_credentials/credentials.php');
} else {
    setSessionMessage('danger', 'Cancellation Failed', 'Error', 'Failed to cancel complaint');
    header('Location: ' . BASE_URL . 'pages/dealer/dealer_credentials/credentials.php');
}


// Redirect or return response
header('Location: ../../../pages/dealer/show.php');
exit();
