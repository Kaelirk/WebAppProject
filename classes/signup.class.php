<?php

class Signup extends Dbh {
    //
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        //hashes the password for security before inserting the provided data into the database and creating a new user
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //check if the statement exists/executes
        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    //the checkUser function checks to see if the user already exists in the database
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        //check if the statement exists/executes
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        //check if the user is in the database
        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
    //the getUserId() function returns the users_id from the users table
    protected function getUserId($uid) {
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');
        //check if the statement exists/executes
        if(!$stmt->execute(array($uid))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }
        //then checks if the user has any data in the profiles database and returns it when possible.
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($profileData) == 0) {
            $stmt = null;
            header("Location: profile.php?error=profilenotfound");
            exit();
        }
        return $profileData;
    }
}