<?php
require_once 'BaseModel.php';

class Dealer_Credentials extends BaseModel
{
    protected $table = "distributoruser";

    // Method to register a new complaint

    public function getAllDealerCredentials()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->conn->query($query);
        $dealers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dealers[] = $row;
            }
        }
        return $dealers;
    }


    public function registerDealerCredentials($data)
    {
        return $this->create($data);
    }

     public function registerDealerUserCredentials($data)
     {
         return $this->create($data);
     }


    public function getDealerCredentialsById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }



    public function updateDealerCredentialsById($id, $data)
    {
        return $this->update($id, $data);
    }

}
