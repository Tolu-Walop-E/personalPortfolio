<?php
session_start();
session_unset();

session_destroy();
header("Location: exercise2.html");



?>