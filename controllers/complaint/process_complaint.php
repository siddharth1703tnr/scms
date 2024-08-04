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
    $modifieddate = date('Y-m-d H:i:s');
    $createdBy = 1;
    $modifiedBy = 2;

    $data = [
        'callnumber' => $callnumber,
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
        'createdate' => $createdate,
        'createby' => $createdBy,
        'modifiedby' => $modifiedBy,
        'modifieddate' => $modifieddate,
        'customerproblem' => $_POST['Cus_cusprob'],
        'callresolution' => $_POST['Cus_callresolution']
    ];

    if ($complaint->create($data)) {
        echo "New complaint registered successfully.";
    } else {
        echo "Error: Could not register complaint.";
    }
}
?>
