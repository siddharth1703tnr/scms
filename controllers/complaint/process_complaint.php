<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();
$complaint = new Complaint($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $callnumber = date('Ymd') . mt_rand(1000, 9999);
    $createdate = date('Y-m-d H:i:s');
    $createdBy = 1;
    $callstatus = "New";

    $data = [
        'callnumber' => $callnumber,
        'customername' => $_POST['Cus_Name'],
        'customermobileno' => $_POST['Cus_Mobile_No'],
        'customeraddress' => $_POST['Cus_Address'],
        'customercity' => $_POST['Cus_City'],
        'calltype' => $_POST['Cus_calltype'],
        'calldate' => $_POST['Cus_calldate'],
        'callstatus' => $callstatus,
        'createdate' => $createdate,
        'createby' => $createdBy,
        'customerproblem' => $_POST['Cus_cusprob']
    ];

    if ($complaint->registerComplaint($data)) {
        header("Location: " . BASE_URL . "pages/complaint/show.php");
    } else {
        echo "Error: Could not register complaint.";
    }
}
