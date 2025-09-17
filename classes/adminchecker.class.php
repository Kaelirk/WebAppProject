<?php

 //the checkAdmin() functions returns true if an admin account with users_id "1" already exists.
class AdminChecker extends dbh {

    //We select all users in the database with users_id = 1. There will only be one of these and it will be the first person to create an account for the app, the administrator
    public function checkAdmin() {
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_id = 1;');
        //check if the statement executes properly
        if(!$stmt->execute()) {
            $stmt = null;
            header("Location: index.php?error=stmtfailed");    
            exit();
        }
        //check if any data was returned from the database and then determine the boolean value of $adminExists
        return (bool) $stmt->fetch();
    }
    }