<?php

class AvailabilitiesCtrl extends Availabilities {

    private $id;
    private $name;
    private $apptStart;
    //create an object that contains the current session's userId and name
    public function __construct($id, $name, $apptStart) {
        $this->id = $id;
        $this->name = $name;
        $this->apptStart = $apptStart;
    }

    public function createAppt(){
        $apptWasSet = false;
        //runs the emptyInputCheck() method from the AvailabilitiesCtrl class below.
        if ($this->emptyInputCheck() == true){
            header("Location: ../availabilities.php?error=emptyinput");
            return $apptWasSet;
        }
        if($this->apptExists() == false){
            header("Location: ../availabilities.php?error=apptalreadytaken");

            return $apptWasSet;
        }
        
        //if we get to this stage, take the data submitted by the user submitted via the availabilities.inc page and run the setAppt() method from profileinfo.class (which is a model class of the MVC model) to update the profile page information
        $this->setAppt($this->name, $this->apptStart, $this->id);
        $apptWasSet = true;
        return $apptWasSet;
    }
    //a method that checks for empty inputs. Only available to the AvailabilitiesCtrl class.
    public function emptyInputCheck() {
        $result = false;
        if(empty($this->name) || empty($this->apptStart) || empty($this->id)) {
            $result = true;
            echo $this->name, $this->apptStart, $this->id; 
        }
        return $result;
    }

    //a method that checks if the time slot is already taken.
     public function apptExists(){
        $result = false;
        if (!$this->checkSlot($this->apptStart)){
            $result = true;
        }
        return $result;
    }

}