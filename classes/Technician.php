<?php
require_once 'BaseModel.php';

class Technician extends BaseModel
{
    protected $table = "servicecenteruser";

    // Fetch all technicians with limited details
    public function getAllTechnicians()
    {
        $query = "SELECT 
                    `id`, 
                    `username`, 
                    `primarymobileno`, 
                    `secondmobileno`, 
                    `firstname`, 
                    `lastname`, 
                    `address`, 
                    `city`, 
                    `isactive` 
                  FROM $this->table 
                  WHERE `roletype` = 'Technician'";
        $result = $this->conn->query($query);
        $technicians = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $technicians[] = $row;
            }
        }
        return $technicians;
    }

    // Fetch a single technician by ID
    public function getTechnicianById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fetch all active technicians with basic details
    public function getTechnicians()
    {
        $query = "SELECT 
                    `id`, 
                    `firstname`, 
                    `lastname` 
                  FROM $this->table 
                  WHERE `roletype` = 'Technician' 
                    AND `isactive` = 'Y'";
        $result = $this->conn->query($query);
        $technicians = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $technicians[] = $row;
            }
        }
        return $technicians;
    }

    // Register a new technician
    public function registerTechnician($data)
    {
        return $this->create($data);
    }

    // Update an existing technician
    public function updateTechnician($id, $data)
    {
        return $this->update($id, $data);
    }
}
