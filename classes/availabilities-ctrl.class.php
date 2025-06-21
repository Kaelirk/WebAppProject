<?php

class AvailabilitiesCtrl extends Availabilities {

    private $userId;
    private $userUid;
    //create an object that contains the current session's userId and userUid
    public function __construct($userId, $userUid) {
        $this->userId = $userId;
        $this->userUid = $userUid;
    }
    //a method used when a new user is registered to auto-fill the profileinfo with default data.
    public function defaultProfileInfo(){
        $profileAbout = "Tell people about yourself! What kind of physio are you?!";
        $profileTitle = "Hi! I am " . $this->userUid;
        $profileText = "Welcome to my physio profile page, take a good look!";
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    public function updateProfileInfo($about, $introTitle, $introText){
        //runs the emptyInputCheck() method from the ProfileInfoCtrl class below.
        if ($this->emptyInputCheck($about, $introTitle, $introText) == true){
            header("Location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        //if we get to this stage, take the data submitted by the user submitted via the profile.info.inc page and run the setNewProfileInfo() method from profileinfo.class (which is a model class of the MVC model) to update the profile page information
        $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);
    }
    //a method that checks for empty inputs. Only available to the ProfileInfoCtrl class.
    private function emptyInputCheck($about, $introTitle, $introText) {
        $result = false;
        if(empty($about) || empty($introTitle) || empty($introText)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}