<?php
include '../../../config/config.php';
require_once '../../../classes/Database.php';
require_once '../../../classes/Technician.php';

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);

$action = isset($_POST['action']) ? $_POST['action'] : '';
$id = isset($_POST['id']) ? intval($_POST['id']) : '';

try {
    if ($action == 'getById' && !empty($id)) {
        $technicianDataById = $technician->getTechnicianById($id);
        echo json_encode($technicianDataById);
    } elseif ($action == 'getAllData') {
        $technicianData = $technician->getAllTechnicians();
        echo json_encode($technicianData);
    } else {
        throw new Exception('Invalid action or missing ID.');
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
exit;
