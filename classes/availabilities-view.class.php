<?php

require_once __DIR__ . '/availabilities.class.php';

class AvailabilitiesView extends Availabilities {

    public function showTaken() {
        $results = $this->getTaken();
        foreach($results as $user){

        }
    }

}