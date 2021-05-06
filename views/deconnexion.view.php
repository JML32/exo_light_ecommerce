<?php

session_start();
session_unset();
session_destroy();


header('location: index.php');
exit();
?>


<h3>A bientôt ! </h3>
