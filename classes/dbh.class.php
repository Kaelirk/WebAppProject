<?php

class Dbh {
    private $host = "db";
    private $user = "lamp_docker";
    private $pwd = "password";
    private $dbname = "lamp_docker";

/*the following code uses the variables above to create a dsn that indicates which database the new PDO is trying to connect to.
The dns is then used as a variable in the new PDO connection which also contains the username and password provided by the Dbh class.
The Fetch_mode is then set to FETCH_ASSOC which returns data in an array indexed by column.
The Dbh class is called upon whenever data has to read from or written to the database*/
    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}