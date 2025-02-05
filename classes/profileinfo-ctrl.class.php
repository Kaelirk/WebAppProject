<?php

class ProfileInfoCtrl extends ProfileInfo {

    private $userId;
    private $userUid;

    public function __construct($userId, $userUid) {
        $this->userId = $userId;
        $this->userUid = $userUid;
    }

    public function defaultProfileInfo(){
        $profileAbout = "Tell people about yourself! What kind of physio are you?!";
        $profileTitle = "Hi! I am " . $this->userUid;
        $profileText = "Welcome to my physio profile page, take a good look!";
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    public function updateProfileInfo($about, $introTitle, $introText){
        //error handlers
        if ($this->emptyInputCheck($about, $introTitle, $introText) == true){
            header("Location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        //if we get to this stage, profile info will be update.
        $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);
    }

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