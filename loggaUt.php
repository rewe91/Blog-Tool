<?php
//När du interagerar med knappen ''logga ut'' så dödar du din pågående session och skickas till logginformuläret.
session_start();

session_destroy();

header("location:testing.php");
?>