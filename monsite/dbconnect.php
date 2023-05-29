<?php

	 $DBhost = "localhost";
	 $DBuser = "vitrine";
	 $DBpass = "orange";
	 $DBname = "produits";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>