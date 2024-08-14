<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Dealer.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST


$database = new Database();
$db = $database->getConnection();
$dealer = new Dealer($db);


$id = $_POST['Dealer_id'];
$data = $_POST;
$isActive = isset($_POST['isactive']) && $_POST['isactive'] == 'Y' ? 'Y' : 'N';


unset($data['Dealer_id']); // Remove action and id from data

$data = [
    'name' => $_POST['Dealer_Name'],
    'isactive' => $isActive,  
    'primarymobileno' => $_POST['Dealer_PMobile_No'],
    'secondmobileno' => $_POST['Dealer_SMobile_No'],
    'emailaddress' => $_POST['Dealer_email'],
    'address' => $_POST['Dealer_Address'],
    'city' => $_POST['Dealer_City']
];

if ($dealer->updateDealerById($id, $data)) {
    setSessionMessage('success', 'Cancellation', 'Success', 'Complaint cancelled successfully');
    header('Location: ' . BASE_URL . 'pages/dealer/show.php');
} else {
    setSessionMessage('danger', 'Cancellation Failed', 'Error', 'Failed to cancel complaint');
    header('Location: ' . BASE_URL . 'pages/dealer/show.php');
}


// Redirect or return response
header('Location: ../../pages/dealer/show.php');
exit();
