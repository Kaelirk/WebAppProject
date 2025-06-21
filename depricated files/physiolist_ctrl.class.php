<?php

class UsersCtrl extends Users {

    private $name;
    private $second_name;
    private $date;
    //creates a new object with the $name, $second_name and $date submitted by the user as it's variables.
    public function __construct($name, $second_name, $date) {
        $this->name = $name;
        $this->second_name = $second_name;
        $this->date = $date;
    }
    //createUser()function can be used to create a new user in the database by passing the data object created with the user's submitted data through the setUser() function
    public function createUser($name, $second_name, $date) {
        $this->setUser($name, $second_name, $date);
        

    }

}