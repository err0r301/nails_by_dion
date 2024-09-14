<?php

class appointer
{
  function createConnection()
  {
    
  }

  function makeRequests()
  {
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
    $sql='select * from appointments;';
    $result = mysqli_query($con,$sql);
    
    echo "<h3 class='subheading'>Bookings' Status</h3>";

    echo
    "
    <table class='statusTable'>
      <tr>
        <td class='headingCellAppoint'>Deposit</td>
        <td class='headingCellAppointStatus'>Appointment Status</td>
      </tr>
      <tr class='statusRow'>
        <td class='statusCell'>R 5000</td>
        <td class ='statusCell2'>Awaiting confirmation</td>
      </tr>
    </table>
    ";

    echo "<h3 class='subheading'>Bookings</h3>";

    echo "<table class='statusTable'>
    <tr>
    <th class='headingCellAppoint'>date</th>
    
    <th class='headingCellAppoint'>Service</th>
    <th class='headingCellAppoint'>Sessions</th>
    
    <th class='headingCellAppoint'>Stylist</th>
    <th class='headingCellAppoint'>status</th>
    </tr>";

   
  $rowNum=1;
  $count=1;
  
  

  while($row = mysqli_fetch_array($result)) 
  {
    $timeID='"time'. $count . '"';
    $serviceID='service'. $count;
    $sessionsID='sessions'. $count;
    $stylistID='stylist'. $count;
    $statusID='status'. $count;
    
      if($rowNum==1)
      {
        echo "<tr class='oddRow' onclick='newManager.showPope(". $row['appointmentID'] .",". 1 .",". $this->flipData($row['stylist'],'stylist') .",3,3,2,3,2)'>";
        $rowNum=0;
      }else
      {
        echo "<tr class='evenRow' onclick='newManager.showPope(". $row['appointmentID'] .",". 1 
        .",". $this->flipData($row['stylist'],'stylist') 
        .",".$this->flipData($row['scheduledDateTime'],'day') 
        .",".$this->flipData($row['scheduledDateTime'],'month') 
        .",".$this->flipData($row['scheduledDateTime'],'hour') 
        .",".$this->flipData($row['scheduledDateTime'],'min') 
        .",". $row['sessions'] .")'>";
        $rowNum=1;
      } 

      //convert string to integers
      echo "<td id=".$timeID." class='leftAppointmentCell'>" . $row['scheduledDateTime'] . "</td>";
      echo "<td id=". $serviceID ." class='appointmentCell' >" . $row['serviceID'] . "</td>";
      echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . $row['sessions'] . "</td>";//
      echo "<td id=". $stylistID ." class='appointmentTimeCell' >"  . $row['stylist'] . "</td>";//
      echo "<td id=". $statusID ." class='appointmentCell'>" . $row['status_'] . "</td>";
      
      echo "</tr>";

      $count++;
  }
  //attributes need to have properties that will be caught by the showpop function

  echo "</table>";

    mysqli_close($con);
  }

  function flipData($string, $type )
  {
    $run=0;
    $index=0;
    switch($type)
    {
      
      //'2024-01-01 04:45:00'
      case 'stylist':

        $stylists=array('Dion','Mpho','Vusi','jacob');
        

        while($run<4)
        {
          if(strcasecmp($string, $stylists[$run])==0)
          {
            $index=$run+1;
            break;
          }

          $run++;
        }

        break;

        //'2024-01-01 04:45:00'
        case 'day':

          //trim string
          $dayMarked=substr($string,9,1);
          $days=array(1,2,3);

          while($run<3)
          {
            //compare string
            if(strcasecmp($dayMarked, $days[$run])==0)
            {
              $index=$run+1;
              break;
            }

            $run++;
          }

          break;
        
        //'2024-01-01 04:45:00'
        case 'month':

          //trim string
          $dayMarked=substr($string,6,1);
          $days=array(1,2,3);

          while($run<3)
          {
            //compare string
            if(strcasecmp($dayMarked, $days[$run])==0)
            {
              $index=$run+1;
              break;
            }

            $run++;
          }
          break;

        //'2024-01-01 04:45:00'
        case 'hour':

          $dayMarked=substr($string,12,1);
          $days=array(1,2,3);

          while($run<3)
          {
            //compare string
            if(strcasecmp($dayMarked, $days[$run])==0)
            {
              $index=$run+1;
              break;
            }

            $run++;
          }
          break;
        
        //'2024-01-01 04:45:00'
        case 'min':

          $dayMarked=substr($string,14,2);
          $days=array("01","02","03");

          while($run<3)
          {
            //compare string
            if(strcasecmp($dayMarked, $days[$run])==0)
            {
              $index=$run+1;
              break;
            }

            $run++;
          }
          break;
    }

    return $index;
  }

  function update()
  {

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

    $service=$_GET['service'];
    $stylist=$_GET['stylist'];
    $monthx=9;

    $day=intval($_GET['day']);
    $month=intval($_GET['month']);
    $monthArray=["JAN","FEB","MAR"];
    
   
    $finalMonth=array_search($month, $monthArray)+1;
    //$date='2024-0'. $month . '-0'. $day;
    

    $hour=intval($_GET['hour']);
    $min=intval($_GET['min']);
    $time='0'. $hour .":". $min ;

    //'2024-01-01 04:45:00'
    $date="2024-0". $finalMonth ."-0". $day ."-"." 0". $hour .":0". $min;

    $sessions=intval($_GET['sessions']);

    {
      $sql="UPDATE appointments SET stylist='".$_GET['stylist']."', scheduledDateTime='". $date ."', sessions=". $_GET['sessions']." WHERE appointmentID=".$_GET['appointmentID'].";";
      //$sql="insert into appointments values(appointmentID, 'userName',". $date.", '20:27', 'approved','tyr');";//
      
      $result = mysqli_query($con,$sql);
      $_GET['update']=0;
    }
  }
}

  $appointer=new appointer();
  switch($_GET['path'])
  {
    case 1:
      $appointer->makeRequests();
      break;
    
    case 2:
      $appointer->update();
      break;
  }
  
?>