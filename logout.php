<?php

session_start();
session_unset();//id and username are deleted fro those session var
session_destroy();//terminate/destroy all the session variables running on the terminal
header("Location: index.php");

?>