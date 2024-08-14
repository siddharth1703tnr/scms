<?php
require_once 'BaseModel.php';

class Dealer extends BaseModel
{
    protected $table = "distributor";

    // Method to register a new complaint

    public function getAllDealer()
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


    public function registerDealer($data)
    {
        return $this->create($data);
    }

    // public function registerDealerUser($data)
    // {
    //     return $this->create($data);
    // }


    public function getDealerById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }



    public function updateDealerById($id, $data)
    {
        return $this->update($id, $data);
    }

}
