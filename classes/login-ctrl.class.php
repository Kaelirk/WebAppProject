<?php

//creating a loginCtrl class that can be included into other files to be instantiated. This class has properties provided by the user.
class LoginCtrl extends Login{

    private $uid;
    private $pwd;

//the code below constructs an object from the data provided by the user when the class is called upon. (the $this-$uid = $uid code is there to assign the data provided by the user to the private properties above)
    public function __construct($uid, $pwd) {

        $this->uid = $uid;
        $this->pwd = $pwd;

    }
//the loginUser function first checks if the verification function below has returned false - if so it exits the login process.
//If the check returns false, the function then runs the getUser() function from the Login class.
    public function loginUser(){
        if($this->emptyInput() == false){
            // echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);

    }

//the code below is designed to check if there are empty inputs from the user.
    private function emptyInput() {
        $result = false;
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}