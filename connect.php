<?php

  /* $hostname = "mysql1.petasoft.com.br";
   $dbname = "petasoft1";
   $username = "petasoft1";
   $password = "Petasoft2013";*/
   $hostname = "localhost";
   $dbname = "petasoft1";
   $username = "root";
   $password = "";
   MYSQL_CONNECT($hostname, $username, $password) or die("Nao pode conectar");
   @mysql_select_db("$dbname") or die("Nao pude selecionar o banco de dados");
   
?>
