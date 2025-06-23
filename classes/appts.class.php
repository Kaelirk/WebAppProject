<?php

class Appts extends dbh {

//the getAppts function simply connects to the database and returns all the information that is associated to the userId.
    protected function getAppts($userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM appts WHERE users_id = ? ORDER BY appt_start');
        //check is statement exists/executes
        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: ../patientapptlist.php?error=stmtfailed");
            exit();
        }
        //check if any appointments exists in the database
        if($stmt->rowCount() == 0) {
            $stmt = null;
            echo '<p class="text-center">You have no appointments booked. <br> Feel free to check out our availabilities in the Availabilites tab.</p>';
            exit();
        }
        //fetching all the data selected by the SQL statement and placing it in a variable.
        $apptData = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        //returning all the data retrieve by the fetchAll() method
        return $apptData;

    }

}