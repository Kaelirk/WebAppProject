<?php

session_start();
session_unset();
session_destroy();

//return to homepage
header("Location: ../Views/index.php?error=none");