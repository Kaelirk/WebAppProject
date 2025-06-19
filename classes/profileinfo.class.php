<?php

class ProfileInfo extends dbh {
    //the getProfileInfo function simply connects to the database and returns all the information associated to the user's users_id in the profiles table
    protected function getProfileInfo($userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');
        //check is statement exists/executes
        if(!$stmt->execute(array($userId))) {
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

        $profileData = $stmt->fetchAll();

        return $profileData;
    }
    //The setNewProfileInfo function connets to the database and updates the about, into and intotext columns associated to the user's users_id in the profiles table
    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?, profiles_intro = ?, profiles_introtext = ? WHERE users_id = ?;');
        //check is statement exists/executes
        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userID) {
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_intro, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');
        //check is statement exists/executes
        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userID))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

};