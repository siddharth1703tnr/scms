<?php
require_once 'BaseModel.php';

class Complaint extends BaseModel
{
    protected $table = "servicecall";

    // You can add any specific methods related to complaints here if needed

    public function getAllComplaints()
    {
        $query = "SELECT id, callnumber, customername,customermobileno,customeraddress, calltype, callstatus FROM $this->table";
        $result = $this->conn->query($query);
        $complaints = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $complaints[] = $row;
            }
        }
        return $complaints;
    }


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

    


    public function updateComplaint($data)
    {
        $modifieddate = date("Y-m-d H:i:s");
        $digit = 5;

        $query = "UPDATE " . $this->table . " SET 
            customername = ?, 
            customermobileno = ?, 
            customeraddress = ?, 
            customercity = ?, 
            calltype = ?, 
            paymenttype = ?, 
            calldate = ?, 
            callassigndate = ?, 
            technicianassigned = ?, 
            callcompletedate = ?, 
            callstatus = ?, 
            totalamount = ?, 
            discountamount = ?, 
            finalamount = ?, 
            modifiedby = ?, 
            modifieddate = ?, 
            customerproblem = ?, 
            callresolution = ?
            WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sssssssssssssssssss",
            $data['customername'],
            $data['customermobileno'],
            $data['customeraddress'],
            $data['customercity'],
            $data['calltype'],
            $data['paymenttype'],
            $data['calldate'],
            $data['callassigndate'],
            $data['technicianassigned'],
            $data['callcompletedate'],
            $data['callstatus'],
            $data['totalamount'] == "" ? 0000 : $data['discountamount'],
            $data['discountamount'] == "" ? 0000 : $data['discountamount'],
            $data['finalamount'] == "" ? 0000 : $data['discountamount'],
            $digit, // Static value for modifiedby
            $modifieddate,
            $data['customerproblem'],
            $data['callresolution'],
            $data['id'] // id to specify which record to update
        );

        return $stmt->execute();
    }
}
