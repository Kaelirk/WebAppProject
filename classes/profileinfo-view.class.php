<?php

class ProfileInfoView extends ProfileInfo {

    public function fetchAbout($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_about"];
    }

    public function fetchIntroTitle($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_intro"];
    }

    public function fetchIntroText($userId){
        $profileInfo = $this->getProfileInfo($userId);
        
        echo $profileInfo[0]["profiles_introtext"];
    }

};