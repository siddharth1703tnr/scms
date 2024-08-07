<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Complaint.php';

$database = new Database();
$db = $database->getConnection();
$complaint = new Complaint($db);


$action = $_POST['action']; // Determine action from hidden field
$id = $_POST['complaint_id'];
$data = $_POST;

unset($data['action'], $data['complaint_id']); // Remove action and id from data

switch ($action) {
    case 'assigned':
        $data = [
            'customername' => $_POST['Cus_Name'],
            'customermobileno' => $_POST['Cus_Mobile_No'],
            'customeraddress' => $_POST['Cus_Address'],
            'customercity' => $_POST['Cus_City'],
            'calltype' => $_POST['Cus_calltype'],
            'calldate' => $_POST['Cus_calldate'],
            'technicianassigned' => $_POST['Cus_technicianassign'],
            'callassigndate' => date('Y-m-d H:i:s'),
            'callstatus' => 'Assigned',
            'modifiedby' => 2, //$_SESSION['user_id']
            'modifieddate' => date('Y-m-d H:i:s'),
            'customerproblem' => $_POST['Cus_cusprob']
        ];
        
        $complaint->update($id, $data);
        break;
    
    case 'close':
        
        $data = [
            'customername' => $_POST['Cus_Name'],
            'customermobileno' => $_POST['Cus_Mobile_No'],
            'customeraddress' => $_POST['Cus_Address'],
            'customercity' => $_POST['Cus_City'],
            'calltype' => $_POST['Cus_calltype'],
            'paymenttype' => $_POST['Cus_payment'],
            'calldate' => $_POST['Cus_calldate'],
            'callcompletedate' => date('Y-m-d H:i:s'),
            'callstatus' => 'Close',
            'totalamount' => $_POST['Cus_totalamount'], //Cus_totalamount 
            'discountamount' => $_POST['Cus_disamount'], //Cus_disamount
            'finalamount' => $_POST['Cus_finalamount'], // Cus_finalamount
            'modifiedby' => 2, //$_SESSION['user_id']
            'modifieddate' => date('Y-m-d H:i:s'),
            'customerproblem' => $_POST['Cus_cusprob'],
            'callresolution' => $_POST['Cus_callresolution']
        ];

        $complaint->update($id, $data);
        break;
    
    case 'cancel':
        $data = [
            'customername' => $_POST['Cus_Name'],
            'customermobileno' => $_POST['Cus_Mobile_No'],
            'customeraddress' => $_POST['Cus_Address'],
            'customercity' => $_POST['Cus_City'],
            'calltype' => $_POST['Cus_calltype'],
            'paymenttype' => $_POST['Cus_payment'],
            'calldate' => $_POST['Cus_calldate'],
            'callcompletedate' => date('Y-m-d H:i:s'),
            'callstatus' => 'Cancelled',
            'totalamount' => 0, //Cus_totalamount
            'discountamount' => 0, //Cus_disamount
            'finalamount' => 0, // Cus_finalamount
            'modifiedby' => 2, //$_SESSION['user_id']
            'modifieddate' => date('Y-m-d H:i:s'),
            'customerproblem' => $_POST['Cus_cusprob'],
            'callresolution' => $_POST['Cus_callresolution']
        ];

        $complaint->update($id, $data);
        break;
    
    default:
        // Invalid action
        break;
}

// Redirect or return response
header('Location: ../../pages/complaint/show.php');
exit();
?>
