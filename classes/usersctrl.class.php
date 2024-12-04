<?php

class UsersCtrl extends Users {

    public function createUser($name, $second_name, $date) {
        $this->setUser($name, $second_name, $date);
        

    }

}