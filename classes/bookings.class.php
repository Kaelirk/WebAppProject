<?php

class Bookings extends dbh {
    //retrieves all names and appointment start datetime data from the appts table.
    public function getBookings() {
        $sql = "SELECT name, appt_start FROM appts";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        return $results;
    }
    //deletes the row from the appts table that matches the name and appt_start time passed through the method.
     public function deleteBooking($name, $apptStart) {
        $stmt = $this->connect()->prepare('DELETE FROM appts WHERE name = ? AND appt_start = ?;');
        //check is statement exists/executes
        if(!$stmt->execute(array($name, $apptStart))) {
            $stmt = null;
            header("Location: ../physioagenda.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}

   