<?php

class Availabilities extends dbh {

    //the setAppt method() is only used to insert the appointment into the database. It's uses the Insert into command to create a new row in the database
    protected function setAppt($name, $apptStart, $id) {
        $stmt = $this->connect()->prepare('INSERT INTO appts (name, appt_start, users_id) VALUES (?, ?, ?);');
        //check is statement exists/executes
        if(!$stmt->execute(array($name, $apptStart, $id))) {
            $stmt = null;
            header("Location: ../availabilities.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    // the checkSlot() method simply checks to see if an appointment already exist at the specified DATETIME.
    protected function checkSlot($apptStart) {
        $stmt = $this->connect()->prepare('SELECT appt_id FROM appts WHERE appt_start = ?;');
        //check if the statement exists/executes
        if(!$stmt->execute(array($apptStart))){
            $stmt = null;
            header("Location: ../availabilities.php?error=stmtfailed");
            exit();
        }
        //check if the appt is already in the database
        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
    //retrieving all the appt_start data from the appts table.
    public function getTaken() {
        $sql = "SELECT appt_start FROM appts";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
    }
}
