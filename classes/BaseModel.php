<?php
class BaseModel {
    protected $conn;
    protected $table;

    public function __construct($db, $table) {
        $this->conn = $db;
        $this->table = $table;
    }

    public function register($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(':' . $key, $val);
        }

        return $stmt->execute();
    }

    public function update($data, $conditions) {
        $set = "";
        foreach ($data as $key => $val) {
            $set .= $key . " = :" . $key . ", ";
        }
        $set = rtrim($set, ", ");

        $where = "";
        foreach ($conditions as $key => $val) {
            $where .= $key . " = :" . $key . " AND ";
        }
        $where = rtrim($where, " AND ");

        $sql = "UPDATE " . $this->table . " SET $set WHERE $where";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(':' . $key, $val);
        }
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(':' . $key, $val);
        }

        return $stmt->execute();
    }

    public function show($conditions = []) {
        $sql = "SELECT * FROM " . $this->table;
        if (!empty($conditions)) {
            $where = " WHERE ";
            foreach ($conditions as $key => $val) {
                $where .= $key . " = :" . $key . " AND ";
            }
            $where = rtrim($where, " AND ");
            $sql .= $where;
        }
        $stmt = $this->conn->prepare($sql);

        if (!empty($conditions)) {
            foreach ($conditions as $key => &$val) {
                $stmt->bindParam(':' . $key, $val);
            }
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
