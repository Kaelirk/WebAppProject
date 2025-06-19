<?php
//this ProfileInfoView class is designed to retrieve data from the profiles database using the getProfileInfo() method and display it to the user.
class ProfileInfoView extends ProfileInfo {
    //returns the profiles_about data obtained by the getProfileInfo() method
    public function fetchAbout($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_about"];
    }
    //returns the profiles_intro data obtained by the getProfileInfo() method
    public function fetchIntroTitle($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_intro"];
    }
    //returns the profiles_introtext data obtained by the getProfileInfo() method
    public function fetchIntroText($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_introtext"];
    }

};