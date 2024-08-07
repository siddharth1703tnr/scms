<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();
$complaint = new Complaint($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = $_POST['Cus_callstatus'];
    $user = 2;
    $modifieddate = date("Y-m-d H:i:s");
    $currentdate = date("Y-m-d H:i:s");

    if($status == "New") {

        $data = [
            'id' => $_POST['complaint_id'],
            'customername' => $_POST['Cus_Name'],
            'customermobileno' => $_POST['Cus_Mobile_No'],
            'customeraddress' => $_POST['Cus_Address'],
            'customercity' => $_POST['Cus_City'],
            'calltype' => $_POST['Cus_calltype'],
            'calldate' => $_POST['Cus_calldate'],
            'callassigndate' => $_POST['Cus_assigndate'],
            'technicianassigned' => $_POST['Cus_technicianassign'],
            'callstatus' => $_POST['Cus_callstatus'],
            'customerproblem' => $_POST['Cus_cusprob']
        ];
    }
   

    if ($complaint->updateComplaint($data)) {
        header("Location: " . BASE_URL . "pages/complaint/show.php");
    } else {
        header("Location: " . BASE_URL . "public/index.php");
    }
}
