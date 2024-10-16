

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="styles.css" rel="stylesheet">

<nav class="navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="/images/dogtena.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      DogTena
    </a>
  </div>
</nav>

<?php

$connect = mysqli_connect("db","lamp_docker","password","lamp_docker");

$query = 'select * from test_table';
$result = mysqli_query($connect, $query);

echo '<h1>Temporary table</h1>';

while($record = mysqli_fetch_assoc($result)){
    echo '<h2>'.$record['id'].'</h2>';
    echo '<p>'.$record['name'].'</p>';
    echo '<p>'.$record['second name'].'</p>';
    echo 'Posted:' .$record['date'];
    echo '<hr>';
}

echo 'does this update live?';

