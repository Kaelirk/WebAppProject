<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        //A statement designed to retrieve the saved user password from the database
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
        //Checking if a statement exists/executes
        if(!$stmt->execute(array($uid, $pwd))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        //Checking if the user exists in the database
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }
        //checking to see if the password provided to log in is that same as the one that is hashed in the database. If correct, all data from the user will be retrieved
        $pwdHashed = $stmt->fetchAll(); //if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
        $passwordCheck = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($passwordCheck == false){
            $stmt = null;
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }elseif($passwordCheck == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            //checking if the statement to retrieve all user data exists/executes
            if(!$stmt->execute(array($uid, $uid, $pwd))){
                $stmt = null;
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }
            //making sure the user exists/still exists in the database
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }
            /*If this stage of the getUser() function is reached, we fetch all the data returned from the data base by the statement and assign
            the returned data to the relevant session variables*/
            $user = $stmt->fetchAll();//if the PDO wasn't set to FETCH-ASSOC, it would need to be included here. But it is already included in the dbh file
            
            //Here values are being assigned to the session superglobals
            session_start();
            $_SESSION["userid"] = $user[0]['users_id'];
            $_SESSION["useruid"] = $user[0]['users_uid'];
            $stmt = null;
        }

    }
}