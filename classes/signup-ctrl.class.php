<?php

//creating a SignupCtrl class that can be included into other files to be instantiated. This class has properties provided by the user.
class SignupCtrl {

    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
//the code below constructs an object from the data provided by the user when the class is called upon. (the $this-$uid = $uid code is there to assign the data provided by the user to the private properties above)
    public function __construct($uid, $pwd, $pwdrepeat, $email) {

        $this->$uid = $uid;
        $this->$pwd = $pwd;
        $this->$pwdrepeat = $pwdrepeat;
        $this->$email = $email;
    }

//the code below is designed to check if there are empty inputs from the user.
    private function emptyInput() {
        $result;
        if(empty($this->$uid) || empty($this->$pwd) || empty($this->$pwdrepeat) || empty($this->$email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
//the code below is designed to check if there are incorrect or unaccepted inputs from the user.
    private function invalidUid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-]*$/", $this->uid)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;

    }
//the code below is designed to check if the email address fits the default php accepted format. (this means that is check for empty spaces, illegal characters and the format of the email address. It does not however check the existence of a domain)
    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;

    }

//the code below ensures that the user has indeed provided the correct password twice.
    private function pwdMatch(){
        $result;
        if ($this->pwd !== $this->pwdrepeat){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

//the code below checks of the user already exists in the database.
    //private function

}