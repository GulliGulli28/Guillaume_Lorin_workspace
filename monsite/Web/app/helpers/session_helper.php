<?php

session_start();

function isLoggedIn()
{
    return (isset($_SESSION['doctor_id']));
}



?>