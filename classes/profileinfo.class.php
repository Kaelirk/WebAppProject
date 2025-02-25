<?php

class ProfileInfo extends dbh {

    protected function getProfileInfo($userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');
        
        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../profile.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll();

        return $profileData;
    }

    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?, profiles_intro = ?, profiles_introtext = ? WHERE users_id = ?;');
        
        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userID) {
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_intro, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');
        
        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userID))) {
            $stmt = null;
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

};