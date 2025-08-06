<?php

class ApptsView extends Appts {

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