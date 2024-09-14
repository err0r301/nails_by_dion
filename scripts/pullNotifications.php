<?php

$key = intval($_GET['k']);
    
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="nails_by_dion_database";
  
    $con=mysqli_connect($serverName, $userName, $password, $dbName);
  
    if (!$con) 
    {
      die('Could not connect: ' . mysqli_connect_error($con));
    }
  
    mysqli_select_db($con,$dbName);
    $sql='select dateTime_, message from notifications;';
    $result = mysqli_query($con,$sql);
    
    echo "<h3 class='subheading'>Notifications</h3>";

    echo "<table class='statusTable'>
    <tr>
    <th class='headingCellAppoint'>Time</th>
    <th class='headingCellAppoint'>message</th>
    </tr>";

   $rowtype='evenRow';
   $rowNum=1;

  while($row = mysqli_fetch_array($result)) 
  {
      if($rowNum==1)
      {
        echo "<tr class='oddRow' onclick='newformatter.showPop()'>";
        $rowNum=0;
      }else
      {
        echo "<tr class='evenRow' onclick='newformatter.showPop()'>";
        $rowNum=1;
      } 
      echo "<td  class='leftAppointmentCell' >" . $row['dateTime_'] . "</td>";
      echo "<td  class='appointmentCell'>" . $row['message'] . "</td>";
      echo "</tr>";
  }

  echo "</table><br><br>";

    mysqli_close($con);

?>