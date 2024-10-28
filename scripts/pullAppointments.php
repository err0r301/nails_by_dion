<?php
include 'connection.php';
class appointer
{

/*<link rel="stylesheet" href="/../styles/client_styles_root0.css">
    <link rel="stylesheet" href="/../styles/main_styles_root1.css">
    */
  function convertServiceToValue($serviceName)
  {
    $serviceNumber=0;
    
    switch($serviceName)
    {
      case 'Classic':
        $serviceNumber=1;
        break;
      case 'Hybrid':
          $serviceNumber=2;
          break;
      case 'Strip Lash':
          $serviceNumber=3;
          break;
      case 'Volume':
          $serviceNumber=4;
          break;
      case 'Mega Vol':
          $serviceNumber=5;
          break;

      case 'Nail Art':
          $serviceNumber=6;
          break;
      case 'Acrylic':
          $serviceNumber=7;
          break;
      case 'Gel':
          $serviceNumber=8;
          break;
      case 'Silk':
          $serviceNumber=9;
          break;
      case 'Soak off':
          $serviceNumber=10;
          break;


      case 'Knotless':
          $serviceNumber=11;
          break;
      case 'Small':
          $serviceNumber=12;
          break;
      case 'Medium':
          $serviceNumber=13;
          break;
      case 'Large':
          $serviceNumber=14;
          break;
      case 'Thick':
          $serviceNumber=15;
          break;
      
  
      case 'Full Body':
          $serviceNumber=16;
          break;
      
      case 'Underarms':
          $serviceNumber=17;
          break;
      case 'Bikini':
          $serviceNumber=18;
          break;
      case 'Brazilian':
          $serviceNumber=19;
          break;
      case 'Face':
          $serviceNumber=20;
          break;                     
        
        default:
            break;
    }

    return $serviceNumber;
  }

  function makeRequests()
  {
    $key = intval($_GET['k']);
    
    

   // $userID=$_SESSION['user'];
  
   // mysqli_select_db($con,$dbName);
    $sql='select * from appointment;';
    $result = mysqli_query(getConnection(),$sql);
    
    /*echo "<h3 class='subheading'>Bookings' Status</h3>";

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
    ";*/

    echo "<h3 class='subheading'>Bookings </h3>";
    echo "<button class='locationButton' onclick='newManager.showPopMap()'>Get Location</button><br><br>";
    
    //mysqli_select_db($con,$dbName);
    $records="select count(*) from appointment;";
    $result = mysqli_query(getConnection(),$records);
    $row = mysqli_fetch_array($result);
                  

    if($row['count(*)']!=0)
                  {
    echo "<table class='appointmentsTable'>
    <tr>
    
    <th class='headingCellAppoint'></th>
    <th class='headingCellAppoint'>Service</th>
    <th class='headingCellAppoint'>date</th>
        <th class='headingCellAppoint'>Stylist</th>
    <th class='headingCellAppoint'>Sessions</th>
    

    <th class='headingCellAppoint'>status</th>
    <th class='headingCellAppoint'>
      " . "<button class='deleteButton' onclick='newManager.deleteAllAppointments()' >Delete All</button>
    </th>
    </tr>";
  }else
  {
    echo"<p id='billDescription' class='tableHeading'>---No Appointments, Please Select Service to Book, Bookings will appear here.---</p>";
  }

  $sql='select * from appointment;';
  $result = mysqli_query(getConnection(),$sql);
  $rowNum=1;
  $count=1;

  while($row = mysqli_fetch_array($result)) 
  {
    $timeID='"time'. $count . '"';
    $serviceID='service'. $count;
    $sessionsID='sessions'. $count;
    $stylistID='stylist'. $count;
    $statusID='status'. $count;
    $thumbnailsrc='"'.$row['serviceThumbnail'].'"';
    $rowID=null;
      if($rowNum==1)
      {
        $serviceValue=$this->convertServiceToValue($row['serviceID']);
        $onclickAttribute="onclick='newManager.showPope(". $row['appointmentID'] .",". $serviceValue .",". $this->flipData($row['stylist'],'stylist') ;

        echo "<tr id='oddRowApp".$count."' class='oddRow' ".$onclickAttribute
        .",". $this->flipData($row['scheduledDateTime'],'day')
        .",". $this->flipData($row['scheduledDateTime'],'month') 
        .",". $this->flipData($row['scheduledDateTime'],'hour') 
        .','. $this->flipData($row['scheduledDateTime'],'min') 
        .','. $row['sessions'] 
        .','. $thumbnailsrc .")'>";

        $rowID='"'.'oddRowApp'.$count.'"';
        $rowNum=0;
      }else
      {
        $serviceValue=$this->convertServiceToValue($row['serviceID']);

        $onclickAttribute="onclick='newManager.showPope(". $row['appointmentID'] .",". $serviceValue ;
        echo "<tr id='evenRowApp".$count."' class='evenRow' " .$onclickAttribute
        .",". $this->flipData($row['stylist'],'stylist') 
        .",".$this->flipData($row['scheduledDateTime'],'day') 
        .",".$this->flipData($row['scheduledDateTime'],'month') 
        .",".$this->flipData($row['scheduledDateTime'],'hour') 
        .",".$this->flipData($row['scheduledDateTime'],'min') 
        .",". $row['sessions'].",". $thumbnailsrc .")'>";
        $rowID='"'.'evenRowApp'.$count.'"';
        $rowNum=1;
      } 

      //convert string to integers
      echo "<td id=". 'recordThumbnail'.$count ." class='appointmentTimeCell' >" ."<img src='".$row['serviceThumbnail']."' width='50' height='50' class='appointmentImage'>" . "</td>";
      echo "<td id=". $serviceID ." class='appointmentCell'  >" .  $row['serviceID'] . "</td>";
      echo "<td id=".$timeID." class='leftAppointmentCell'>" . $row['scheduledDateTime'] . "</td>";
      echo "<td id=". $stylistID ." class='appointmentTimeCell' >"  . $row['stylist'] . "</td>";//
      echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . $row['sessions'] . "</td>";//
 
      echo "<td id=". $statusID ." class='appointmentCell'>" . $row['status_'] . "</td>";
      echo "<td id=". 'delete'." class='appointmentCell' >" . "<button class='deleteButton' onclick='newManager.deleteAppointment(". $row['appointmentID'] .",". $rowID .")' >Delete</button></td>";
      
      echo "</tr>";

      $count++;
  }

  $total="select sum(servicePrice) from appointment;";
  $row = mysqli_fetch_array(mysqli_query(getConnection(),$total));
  //$onclickAttribute="onclick='newManager.showPope(". $row['appointmentID'] .",". 1 .",". $this->flipData($row['stylist'],'stylist') ;


  //attributes need to have properties that will be caught by the showpop function

  echo "</table>";

    mysqli_close(getConnection());
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
          $dayMarked=substr($string,8,2);
          $index=$dayMarked;

          break;
        
        //'2024-01-01 04:45:00'
        case 'month':

          //trim string
          $dayMarked=substr($string,5,2);
          $index=$dayMarked;
          
          break;

        //'2024-01-01 04:45:00'
        case 'hour':

          $dayMarked=substr($string,11,2);
          $index=$dayMarked;
          
          break;
        
        //'2024-01-01 04:45:00'
        case 'min':

          $dayMarked=substr($string,14,2);
          $index=$dayMarked;

          break;
    }

    return $index;
  }

  function update()
  {

    
  
    //mysqli_select_db($con,$dbName);

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
    $date="2024-0". $month ."-0". $day ."-"." 0". $hour .":0". $min;

    $sessions=intval($_GET['sessions']);

    {
      $sql="UPDATE appointment SET stylist='".$_GET['stylist']."', scheduledDateTime='". $date ."', sessions=". $_GET['sessions']." WHERE appointmentID=".$_GET['appointmentID'].";";
      //$sql="insert into appointments values(appointmentID, 'userName',". $date.", '20:27', 'approved','tyr');";//
      
      $result = mysqli_query(getConnection(),$sql);
      $_GET['update']=0;
    }
  }

  function deleteAppointment()
  {
    
    //mysqli_select_db($con,$dbName);



    $sql='delete from appointment where appointmentID='. $_GET['appointmentID'];
    $result = mysqli_query(getConnection(),$sql);
  }

  function deleteAllAppointments()
  {
    
  
    //mysqli_select_db($con,$dbName);



    $sql='delete from appointment;';
    mysqli_query(getConnection(),$sql);
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

    case 3:
      $appointer->deleteAppointment();
      break;

    case 4:
      $appointer->deleteAllAppointments();
      break;


  }

  
  
?>