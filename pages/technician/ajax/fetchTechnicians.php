<?php
// ajax/fetchTechnicians.php
include '../../../config/config.php';
require_once '../../../classes/Database.php';
require_once '../../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);


$action = isset($_POST['action']) ? $_POST['action'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';


if($action == 'getById') {
    $techionData = $technician->getTechnicianById($id);
    echo json_encode($techionData);
}


$sql = "SELECT `id`, `username`, `firstname`, `lastname`, `primarymobileno`, `secondmobileno`,`address`, `city` FROM `servicecenteruser` WHERE `roletype` = 'Technician' ";
$result = $db->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
exit;

?>
