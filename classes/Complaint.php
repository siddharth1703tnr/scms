<?php
class Complaint extends BaseModel
{
    protected $table = "servicecall";

    // You can add any specific methods related to complaints here if needed

    public function getComplaints()
    {
        $query = "SELECT id, callnumber, customername FROM $this->table";
        $result = $this->conn->query($query);
        $complaints = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $complaints[] = $row;
            }
        }
        return $complaints;
    }

    public function getAllComplaints()
    {
        $query = "SELECT callnumber, customername,customermobileno,customeraddress, calltype, callstatus FROM $this->table";
        $result = $this->conn->query($query);
        $complaints = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $complaints[] = $row;
            }
        }
        return $complaints;
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
}
?>