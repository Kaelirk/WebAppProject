<?php

class BookingsCtrl extends Bookings {

    private $name;
    private $apptStart;

    public function __construct($name, $apptStart) {
        $this->name = $name;
        $this->apptStart = $apptStart;
    }
    //the method checks if there were any inputs missing. If nothing is missing, it runs the deleteBooking() function.
    public function cancelBooking() {
         //runs the emptyInputCheck() method from the BookingsCtrl class below.
        if ($this->emptyInputCheck() == true){
            header("Location: ../physioagenda.php?error=emptyinput");
            exit();
        }
        
        //if we get to this stage, the deleteBooking() from the model will run and delete the specified row from the table.
        $this->deleteBooking($this->name, $this->apptStart);
    }
    //this is how the cancelBooking() method checks for missing inputs.
    private function emptyInputCheck() {
        $result = false;
        if(empty($this->name) || empty($this->apptStart)) { //if either of this is missing, return true. This result causes the canceBooking() method to exit.
            $result = true;
            echo $this->name, $this->apptStart;
        } else {
            $result = false;
        }
        return $result;
    }

}