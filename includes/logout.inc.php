<?php

session_start();
session_unset();
session_destroy();

//return to homepage
header("Location: ../index.php?error=none");