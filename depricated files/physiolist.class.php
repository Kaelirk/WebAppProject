<?php

class Users extends Dbh {
    //return all data related to the user from the tast_table database
    protected function getUser($name) {
        $sql = "SELECT * FROM test_table WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
        
    }
    //return all data from the test_table database
    protected function getUsers() {
        $sql = "SELECT * FROM test_table";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
        
    }
    //insert a new row for a new user into the test_table database.
    protected function setUser($name, $second_name, $date) {
        $sql = "INSERT INTO test_table(name, second_name, date) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $second_name, $date]);
        
    }

}