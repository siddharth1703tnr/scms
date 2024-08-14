<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Dealer.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST


$database = new Database();
$db = $database->getConnection();
$dealer = new Dealer($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // id, name, isactive, primarymobileno, secondmobileno, emailaddress, address, city
    $data = [
        'name' => $_POST['Dealer_Name'],
        'isactive' => "Y",
        'primarymobileno' => $_POST['Dealer_PMobile_No'],
        'secondmobileno' => $_POST['Dealer_SMobile_No'],
        'emailaddress' => $_POST['Dealer_email'],
        'address' => $_POST['Dealer_Address'],
        'city' => $_POST['Dealer_City']
    ];

    if ($dealer->registerDealer($data)) {
        setSessionMessage('success', 'Registration Success', 'success', 'Complaint registered successfully');
        header("Location: " . BASE_URL . "pages/dealer/show.php");
    } else {
        setSessionMessage('danger', 'Registration Failed', 'Error', 'Failed to register complaint');
        header("Location: " . BASE_URL . "pages/dealer/show.php");
    }
    exit;
    
}
?>
