<?php

class Availabilities extends dbh {
    //the getAppts function simply connects to the database and returns all the information associated to the user's users_id in the profiles table
    protected function getAppts($physioId) {
        $stmt = $this->connect()->prepare('SELECT * FROM appts WHERE users_id = ?;');
        //check is statement exists/executes
        if(!$stmt->execute(array($physioId))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }
        //check if user data exists in the database
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../profile.php?error=profilenotfound");
            exit();
        }
        //fetching all the data selected by the SQL statement and placing it in a variable.
        $profileData = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        //returning all the data retrieve by the fetchAll() method
        return $profileData;
    }

    //the setAppt method() is only used to set the initial data of a user's profileInfo. It's uses the Insert into command to create a new row in the database
    protected function setAppt($, $, $, $) {
        $stmt = $this->connect()->prepare('INSERT INTO appts (profiles_about, profiles_intro, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');
        //check is statement exists/executes
        if(!$stmt->execute(array($, $, $, $))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

};