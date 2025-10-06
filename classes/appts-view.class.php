<?php

class ApptsView extends Appts {

    //below is a function that checks for all appointments related to the $userId provided by the session and then echoes out the data.
    public function showAppts($userId) {
        $results = $this->getAppts($userId);
        foreach(array_reverse($results) as $userId){
            echo '<h4>'.$userId['appt_start'].'</h4>';
            echo '<p>'.$userId['name']. ' with Stephen Ferns'. '</p>';
            echo 'Requested on: ' .$userId['created_at'];
            echo '<hr size="10" width="300px;" color="black">';
        }
    }

}