<?php
//this availabilitiesView class is designed to retrieve data from the appt database using the getProfileInfo() method and display it to the user.
class AvailabilitiesView extends Availabilities {
    //returns the profiles_about data obtained by the getProfileInfo() method
    public function fetchAppts($physioId){
        $appts = $this->getAppts($physioId);
        
        foreach($appts as $physioId){
            echo '<h2>'.$user['id'].'</h2>';
            echo '<p>'.$user['name'].'</p>';
            echo '<p>'.$user['second_name'].'</p>';
            echo 'Posted:' .$user['date'];
            echo '<hr>';
        }
    }

};