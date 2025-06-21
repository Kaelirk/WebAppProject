<?php

class UsersView extends Users {
    //method can be used to display the user's retrieved information
    public function showUser($name) {
        $results = $this->getUser($name);
            echo '<h2>'.$results[0]['id'].'</h2>';
            echo '<p>'.$results[0]['name'].'</p>';
            echo '<p>'.$results[0]['second_name'].'</p>';
            echo 'Posted:'.$results[0]['date'];
            echo '<hr>';
    }
    //method that can be used to display the information of all users
    public function showUsers() {
        $results = $this->getUsers();
        foreach($results as $user){
            echo '<h2>'.$user['id'].'</h2>';
            echo '<p>'.$user['name'].'</p>';
            echo '<p>'.$user['second_name'].'</p>';
            echo 'Posted:' .$user['date'];
            echo '<hr>';
        }
    }
    }
