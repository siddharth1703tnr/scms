<?php
require_once 'BaseModel.php';

class Complaint extends BaseModel
{
    protected $table = "servicecall";

    // id, callnumber, customername, customermobileno, customeraddress, customercity, calltype, paymenttype, calldate, callassigndate, technicianassigned, callcompletedate, callstatus, totalamount, discountamount, finalamount, createdate, createby, modifiedby, modifieddate, customerproblem, callresolution
            // Get total number of records (for pagination)
            public function getTotalRecords()
            {
                $query = "SELECT COUNT(*) AS total FROM $this->table";
                $result = $this->conn->query($query);
                $row = $result->fetch_assoc();
                return $row['total'];
            }
        
            // Get the number of filtered records (for search functionality)
            public function getFilteredRecords($searchValue)
            {
                $searchValue = "%$searchValue%";
                $query = "SELECT COUNT(*) AS total 
                FROM $this->table 
                WHERE `callnumber` LIKE ? 
                OR `customername` LIKE ? 
                OR `customermobileno` LIKE ?
                ";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("sss", $searchValue, $searchValue, $searchValue);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                return $row['total'];
            }
        
            // Get paginated records based on start, length, search value, and sorting
            public function getPaginatedComplaints($start, $length, $searchValue, $orderColumn = 'id', $orderDir = 'asc')
            {
                $searchValue = "%$searchValue%";
                $query = "SELECT id, callnumber, customername, customermobileno, customeraddress, calltype, callstatus, customerproblem
                FROM $this->table
                WHERE `callnumber` LIKE ? 
                OR `customername` LIKE ? 
                OR `customermobileno` LIKE ?
                ORDER BY $orderColumn $orderDir
                LIMIT ?, ?
                ";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("sssii", $searchValue, $searchValue, $searchValue, $start, $length);
                $stmt->execute();
                $result = $stmt->get_result();
                $complaints = [];
                while ($row = $result->fetch_assoc()) {
                    $complaints[] = $row;
                }
                return $complaints;
            }
    // You can add any specific methods related to complaints here if needed

    // public function getAllComplaints()
    // {
    //     $query = "SELECT id, callnumber, customername,customermobileno,customeraddress, calltype, callstatus FROM $this->table";
    //     $result = $this->conn->query($query);
    //     $complaints = [];
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $complaints[] = $row;
    //         }
    //     }
    //     return $complaints;
    // }


    public function getComplaintById($id)
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
    public function registerComplaint($data)
    {
        return $this->create($data);
    }

    // Method to assign a complaint to a technician
    public function assignComplaint($id, $data)
    {
        return $this->update($id, $data);
    }

    // Method to close a complaint
    public function closeComplaint($id, $data)
    {
        return $this->update($id, $data);
    }

    // Method to cancel a complaint
    public function cancelComplaint($id, $data)
    {
        return $this->update($id, $data);
    }


    
}
