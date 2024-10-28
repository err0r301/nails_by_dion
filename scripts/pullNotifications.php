<?php
include 'connection.php';
$key = intval($_GET['k']);
    
    
  
    //mysqli_select_db($con,$dbName);
    $sql='select dateTime_, message from notification;';
    $result = mysqli_query(getConnection(),$sql);
    
    echo "<h3 class='subheading'>Notifications</h3>";
    echo "<button  class='appointmentButton' onclick='newformatter.showPop(". 0 .")'>Message Nails by Dion</button><br><br>";
    echo "<table class='appointmentTable'>
    <tr>
    <th class='headingCellAppoint'>Time</th>
    <th class='appointmentMessageCol'>Message</th>
    </tr>";

   $rowtype='evenRow';
   $rowNum=1;

  while($row = mysqli_fetch_array($result)) 
  {
    $msg='"'. $row['message'] .'"';
      if($rowNum==1)
      {
        echo "<tr class='oddRow' onclick='newformatter.showPop(". $msg .")'>";
        $rowNum=0;
      }else
      {
        echo "<tr class='evenRow' onclick='newformatter.showPop(". $msg .")'>";
        $rowNum=1;
      } 
      echo "<td  class='leftAppointmentCell' >" . $row['dateTime_'] . "</td>";
      echo "<td  class='appointmentCell'>" . $row['message'] . "</td>";
      echo "</tr>";
  }

  echo "</table><br><br>";
  
 if(isset($_GET['notificationReply']))
  {
    $notReply="'". $_GET['notificationReply'] ."'";

  //use objects
  $sql='insert into notification values(notificationID, "2024-05-26 08:27",'. $notReply.', "approved", 102);';
    $result = mysqli_query(getConnection(),$sql);
  }
  $sql='delete from notification where message=""';
  mysqli_query(getConnection(),$sql);
    mysqli_close(getConnection());

?>