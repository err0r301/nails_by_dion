<?php
    function getConnection()
    {
      $config = parse_ini_file(__DIR__ . "/../config.ini", true);

      $serverName=$config["database"]["DB_HOST"];
      $userName=$config["database"]["DB_USER"];
      $password=$config["database"]["DB_PASSWORD"];
      $dbName=$config["database"]["DB_NAME"];
    
      $con=mysqli_connect($serverName, $userName, $password, $dbName);
      if (!$con) 
      {
        die('Could not connect: ' . mysqli_connect_error($con));
      }
  
      return $con;
    }
?>