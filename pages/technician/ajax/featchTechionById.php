<?php
// ajax/fetchTechnicians.php
include '../../../config/config.php';
require_once '../../../classes/Database.php';
require_once '../../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);


$id = isset($_POST['id']) ? $_POST['id'] : '';


    $techionData = $technician->getTechnicianById($id);
    echo json_encode($techionData);


exit;

?>
