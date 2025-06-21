<?php

class Users extends Dbh {

    protected function getUser($name) {
        $sql = "SELECT * FROM test_table WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
        
    }

    protected function getUsers() {
        $sql = "SELECT * FROM test_table";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
        
    }

    protected function setUser($name, $second_name, $date) {
        $sql = "INSERT INTO test_table(name, second_name, date) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $second_name, $date]);
        
    }

}