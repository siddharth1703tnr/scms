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


if ($action == 'getById') {
    $techionDataById = $technician->getTechnicianById($id);
    echo json_encode($techionDataById);
    exit;
}

if ($action == 'getAllData') {
    $techionData = $technician->getAllTechnicians();
    echo json_encode($techionData);
    exit;
}
