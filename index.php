<?php

$connect = mysqli_connect("db","lamp_docker","password","lamp_docker");

$query = 'select * from test_table';
$result = mysqli_query($connect, $query);

echo '<h1>MySQL Content</h1>';

while($record = mysqli_fetch_assoc($result)){
    echo '<h2>'.$record['id'].'</h2>';
    echo '<p>'.$record['name'].'</p>';
    echo '<p>'.$record['second name'].'</p>';
    echo 'Posted:' .$record['date'];
    echo '<hr>';
}