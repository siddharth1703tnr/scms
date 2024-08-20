<?php
require_once 'BaseModel.php';

class Technician extends BaseModel
{
    protected $table = "servicecenteruser";

    // You can add any specific methods related to complaints here if needed
    //id, username, password, primarymobileno, secondmobileno, firstname, lastname, address, city, roletype, isactive, createdate, modifydate, lastlogindate

    public function getAllTechnicians()
    {
        $query = "SELECT `id`, `username`, `primarymobileno`, `secondmobileno`, `firstname`, `lastname`, `address`, `city`, `isactive` FROM $this->table WHERE `roletype` = 'Technician' ";
        $result = $this->conn->query($query);
        $complaints = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $complaints[] = $row;
            }
        }
        return $complaints;
    }


    public function getTechnicianById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Method to get active technicians
    public function getTechnicians()
    {
        $query = "SELECT id, firstname, lastname FROM servicecenteruser WHERE roletype = 'Technician' AND isactive = 'Y'";
        $result = $this->conn->query($query);
        $technicians = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $technicians[] = $row;
            }
        }
        return $technicians;
    }

    // Method to register a new complaint
    public function registerTechnician($data)
    {
        return $this->create($data);
    }

    // Method to Update a new Techionn
    public function updateTechnician($id, $data)
    {
        return $this->update($id, $data);
    }
}
