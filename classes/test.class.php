<?php

class Test extends Dbh{

    public function getUsers(){
        $sql = "SELECT * FROM test_table";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()) {
            echo '<h2>'.$row['id'].'</h2>';
            echo '<p>'.$row['name'].'</p>';
            echo '<p>'.$row['second name'].'</p>';
            echo 'Posted:' .$row['date'];
            echo '<hr>';
        }
    }

}