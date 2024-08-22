<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Technician.php';

header('Content-Type: application/json'); // Ensure the response is JSON formatted

$database = new Database();
$db = $database->getConnection();
$technician = new Technician($db);

$response = ['status' => 'error', 'message' => 'Unknown error']; // Default response

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input data
        $username = htmlspecialchars(strip_tags($_POST['Technician_username']));
        $password = htmlspecialchars(strip_tags($_POST['Technician_password']));
        $primarymobileno = htmlspecialchars(strip_tags($_POST['Technician_pnumber']));
        $secondmobileno = htmlspecialchars(strip_tags($_POST['Technician_snumber']));
        $firstname = htmlspecialchars(strip_tags($_POST['Technician_fname']));
        $lastname = htmlspecialchars(strip_tags($_POST['Technician_lname']));
        $address = htmlspecialchars(strip_tags($_POST['Technician_address']));
        $city = htmlspecialchars(strip_tags($_POST['Technician_city']));
        
        // Validate required fields
        if (empty($username) || empty($password) || empty($primarymobileno) || empty($firstname) || empty($lastname) || empty($address) || empty($city)) {
            throw new Exception("All fields are required.");
        }

        $createdate = date('Y-m-d H:i:s');
        $isActive = 'Y';
        $roleType = 'Technician';

        // Data array
        $data = [
            'username' => $username,
            'password' => $password, // Hash the password
            'primarymobileno' => $primarymobileno,
            'secondmobileno' => $secondmobileno,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'city' => $city,
            'roletype' => $roleType,
            'isactive' => $isActive,
            'createdate' => $createdate
        ];

        // Attempt to register the technician
        if ($technician->registerTechnician($data)) {
            $response = ['status' => 'success', 'message' => 'Technician registered successfully.'];
        } else {
            throw new Exception("Failed to register technician.");
        }
    } else {
        throw new Exception("Invalid request method.");
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage(); // Capture and return any error message
}

echo json_encode($response); // Return the response as JSON
?>
