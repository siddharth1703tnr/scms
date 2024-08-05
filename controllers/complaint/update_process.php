<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();
$complaint = new Complaint($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['complaint_id'],
        'customername' => $_POST['Cus_Name'],
        'customermobileno' => $_POST['Cus_Mobile_No'],
        'customeraddress' => $_POST['Cus_Address'],
        'customercity' => $_POST['Cus_City'],
        'calltype' => $_POST['Cus_calltype'],
        'paymenttype' => $_POST['Cus_payment'],
        'calldate' => $_POST['Cus_calldate'],
        'callassigndate' => $_POST['Cus_assigndate'],
        'technicianassigned' => $_POST['Cus_technicianassign'],
        'callcompletedate' => $_POST['Cus_completedate'],
        'callstatus' => $_POST['Cus_callstatus'],
        'totalamount' => $_POST['Cus_totalamount'],
        'discountamount' => $_POST['Cus_disamount'],
        'finalamount' => $_POST['Cus_finalamount'],
        'customerproblem' => $_POST['Cus_cusprob'],
        'callresolution' => $_POST['Cus_callresolution']
    ];

    if ($complaint->updateComplaint($data)) {
        header("Location: " . BASE_URL . "pages/complaint/show.php");
    } else {
        header("Location: " . BASE_URL . "public/index.php");
    }
}
