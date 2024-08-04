<?php
require_once 'BaseModel.php';

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

    public function addComplaint($data)
    {
        $createdate = date("Y-m-d H:i:s");
        $modifieddate = date("Y-m-d H:i:s");
        $callnumber = date("Ymd") . $data['id'];

        $query = "INSERT INTO " . $this->table . "
        (callnumber, customername, customermobileno, customeraddress, customercity, calltype, paymenttype, calldate, callassigndate, technicianassigned, callcompletedate, callstatus, totalamount, discountamount, finalamount, createdate, createby, modifiedby, modifieddate, customerproblem, callresolution)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sssssssssssssssssssss", // Corrected parameter types
            $callnumber,
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
            $data['totalamount'],
            $data['discountamount'],
            $data['finalamount'],
            $createdate,
            'admin',  // Static value for createby
            'admin',  // Static value for modifiedby
            $modifieddate,
            $data['customerproblem'],
            $data['callresolution']
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>