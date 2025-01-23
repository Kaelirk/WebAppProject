<?php

//creating a SignupCtrl class that can be included into other files to be instantiated. This class has properties provided by the user.
class SignupCtrl extends Signup{

    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
//the code below constructs an object from the data provided by the user when the class is called upon. (the $this-$uid = $uid code is there to assign the data provided by the user to the private properties above)
    public function __construct($uid, $pwd, $pwdrepeat, $email) {

        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }
//the signupUser function first checks if any of the verification functions below have returned false - if so it exits the sign  up process.
//If none of the checks return false, the function then creates the user in the database.
    public function signupUser(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("location: ../Views/index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false){
            // echo "Username is invalid!";
            header("location: ../Views/index.php?error=invalidusername");
            exit();
        }
        if($this->invalidEmail() == false){
            // echo "Email address is invalid!";
            header("location: ../Views/index.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() == false){
            // echo "Password does not match!";
            header("location: ../Views/index.php?error=passwordsdonotmatch");
            exit();
        }
        if($this->userExists() == false){
            // echo "User already exists!";
            header("location: ../Views/index.php?error=useralreadyexists");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

//the code below is designed to check if there are empty inputs from the user.
    private function emptyInput() {
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
//the code below is designed to check if there are incorrect or unaccepted inputs from the user.
    private function invalidUid() {
        $result = false;
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
        $result = false;
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
        $result = false;
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

    private function userExists(){
        $result = false;
        if (!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}