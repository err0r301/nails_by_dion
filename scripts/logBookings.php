<?php
include 'connection.php';

class serviceLogger
{
  
  function logBooking()
  {
    
    $key = intval($_GET['log']);
    
    

    $service1=array('../_images/1.jpg','Classic','R400.00','0','1 hour', 'a description of $service');
    $service2=array('../_images/2.jpg','Hybrid','R400.00','0','2 hours', 'b description of $service');
    $service3=array('../_images/3.jpg','Strip Lash','R450.00','0','1.5 hours', 'c description of $service which may be long or short, it will depend on the $service at hand');
    $service4=array('../_images/20.png','Volume','R600.00','0','2 hours', 'd description of $service');
    $service5=array('../_images/21.jpg ','Mega Volume','R800.00','0','1.5 hour', 'e description of $service');
    $service6=array('../_images/4.png','Nail Art','R30.00','0','2 hours', 'f description of $service');
    $service7=array('../_images/5.png','Acrylic','R420.00','0','2 hour', 'g description of $service');
    $service8=array('../_images/6.png','Gel','R370.00','0','1.5 hour', 'h description of $service');
    $service9=array('../_images/14.png','Silk','R390.00','0','1 hour', 'i description of $service');
    $service10=array('../_images/16.png','Soak Off','R130.00','0','2 hours', 'j description of $service');
    $services=array($service1, $service2, $service3, $service4, $service5,
              $service6, $service7, $service8, $service9, $service10);

    
   
   // $day=intval($_GET['day']);
    
    

      //collect all keys without db
      //update db if book clicked
      //mysqli_select_db($con,$dbName);
     //$sql='insert into appointments values(appointmentID, "userName", "2024-08-07", "20:27", "approved","what");';//'.'"'.$services[$key-1][1].'"'.'
      
    $service=$_GET['service'];
    $stylist=$_GET['stylist'];
    $monthx=9;

    $day=intval($_GET['day']);
    $month=intval($_GET['month']);
    
    $date='2024-0'. $month . '-0'. $day;


    $hour=intval($_GET['hour']);
    $min=intval($_GET['min']);
    $time='0'. $hour .":". $min ;

    $sessions=intval($_GET['sessions']);
    $serviceThumbnail=$_GET['serviceThumbnail'];
    {
      $sql='insert into appointment values(appointmentID, 6,"'. $stylist .'",'. $sessions .',"'.$date.' 21:00", "'.$date.' '. $time .'", "'. $service .'",NULL, "Pending", "'.$serviceThumbnail.'",'.$_GET['servicePrice'].');';
      //$sql="insert into appointments values(appointmentID, 'userName',". $date.", '20:27', 'approved','tyr');";//
      
      $result = mysqli_query(getConnection(),$sql);
      $_GET['update']=0;
    }
    
    

    mysqli_close(getConnection());
  }

  
  function getEyes()
  {
    
    $sql='select * from service where category="Eyes";';
    $result = mysqli_query(getConnection(),$sql);
    
    while($row = mysqli_fetch_array($result))
    {
      $runs=0;
      $serviceNumber=0;
      
        if(strcasecmp( $row['serviceID'],"Classic")==0)
        {
          $serviceNumber=1;
        }
        if(strcasecmp( $row['serviceID'],"Hybrid")==0)
        {
          $serviceNumber=2;
        }
        if(strcasecmp( $row['serviceID'],"Strip Lash")==0)
        {
          $serviceNumber=3;
        }
        if(strcasecmp( $row['serviceID'],"Volume")==0)
        {
          $serviceNumber=4;
        }
        if(strcasecmp( $row['serviceID'],"Mega Vol")==0)
        {
          $serviceNumber=5;
        }
        
       
    
      //while($runs<5)//delete on completion
      //{
        echo '
        <div class="gridBlockImage">
        <img src='. $row["image"] .' width="150" height="150" class="gridImage" onclick="myController2.showPop('. $serviceNumber .')">            
        <table class="labelTable">
            <tr >
                <td class="labelTableCell"><p id="sDetails" class="serviceLabel" ><p id="sDetails" class="serviceLabel">'. $row["serviceID"] .'</p><p class="price"> R'. $row["price"] .'.00</p></p></td class="gridBlock"></td>
                <td class="labelTableCellAdd">
                    <div class="addButton" onclick="myController2.bookService(false,'."'".$row["image"]."'".','. "'".$row["serviceID"]."'" .')">+</div>
                </td>
            </tr>
        </table>
        </div>
    
    ';
            //;$runs++;
          //}delete on completion
    }

  }

  function getNails()
  {

    $sql='select * from service where category="Nails";';
    $result = mysqli_query(getConnection(),$sql);

    while($row = mysqli_fetch_array($result))
    {
      
      $namex="'".$row["serviceID"]."'";
      $runs=0;
      $serviceNumber=0;
    
        if(strcasecmp( $row['serviceID'],"Nail Art")==0)
        {
          $serviceNumber=6;
        }
        if(strcasecmp( $row['serviceID'],"Acrylic")==0)
        {
          $serviceNumber=7;
        }
        if(strcasecmp( $row['serviceID'],"Gel")==0)
        {
          $serviceNumber=8;
        }
        if(strcasecmp( $row['serviceID'],"Silk")==0)
        {
          $serviceNumber=9;
        }
        if(strcasecmp( $row['serviceID'],"Soak Off")==0)
        {
          $serviceNumber=10;
        }
        
        
      //while($runs<5)//delete on completion
      //{
      echo '
                <div class="gridBlockImage">
                <img src='. $row["image"] .' width="150" height="150" class="gridImage" onclick="myController2.showPop('. $serviceNumber .')">            
                <table class="labelTable">
                    <tr >
                        <td class="labelTableCell"><p id="sDetails" class="serviceLabel" ><p id="sDetails" class="serviceLabel">'. $row["serviceID"] .'</p><p class="price"> R'. $row["price"] .'.00</p></p></td class="gridBlock"></td>
                        <td class="labelTableCellAdd">
                            <div class="addButton" onclick="myController2.bookService(false,'."'".$row["image"]."'".','. "'".$row["serviceID"]."'" .')">+</div>
                        </td>
                    </tr>
                </table>
                </div>
            
            ';
            //;$runs++;
          //}delete on completion
    }
  }

  function getHair()
  {

    $sql='select * from service where category="Hair";';
    $result = mysqli_query(getConnection(),$sql);
    
    while($row = mysqli_fetch_array($result))
    {
      $runs=0;
      $serviceNumber=0;
      
        
        if(strcasecmp( $row['serviceID'],"Knotless")==0)
        {
          $serviceNumber=11;
        }
        if(strcasecmp( $row['serviceID'],"Small")==0)
        {
          $serviceNumber=12;
        }
        if(strcasecmp( $row['serviceID'],"Medium")==0)
        {
          $serviceNumber=13;
        }
        if(strcasecmp( $row['serviceID'],"Large")==0)
        {
          $serviceNumber=14;
        }
        if(strcasecmp( $row['serviceID'],"Thick")==0)
        {
          $serviceNumber=15;
        }

        
      //while($runs<5)//delete on completion
      //{
        echo '
        <div class="gridBlockImage">
        <img src='. $row["image"] .' width="150" height="150" class="gridImage" onclick="myController2.showPop('. $serviceNumber .')">            
        <table class="labelTable">
            <tr >
                <td class="labelTableCell"><p id="sDetails" class="serviceLabel" ><p id="sDetails" class="serviceLabel">'. $row["serviceID"] .'</p><p class="price"> R'. $row["price"] .'.00</p></p></td class="gridBlock"></td>
                <td class="labelTableCellAdd">
                    <div class="addButton" onclick="myController2.bookService(false,'."'".$row["image"]."'".','. "'".$row["serviceID"]."'" .')">+</div>
                </td>
            </tr>
        </table>
        </div>
    
    ';
            //;$runs++;
          //}delete on completion
    }
  }

  

  function getWaxing()
  {
    
    $sql='select * from service where category="Waxing";';
    $result = mysqli_query(getConnection(),$sql);
    
    while($row = mysqli_fetch_array($result))
    {
      $runs=0;
      $serviceNumber=0;
      
        if(strcasecmp( $row['serviceID'],"Full Body")==0)
        {
          $serviceNumber=16;
        }
        if(strcasecmp( $row['serviceID'],"Underarms")==0)
        {
          $serviceNumber=17;
        }
        if(strcasecmp( $row['serviceID'],"Bikini")==0)
        {
          $serviceNumber=8;
        }
        if(strcasecmp( $row['serviceID'],"Brazilian")==0)
        {
          $serviceNumber=19;
        }
        if(strcasecmp( $row['serviceID'],"Face")==0)
        {
          $serviceNumber=20;
        }
      //while($runs<5)//delete on completion
      //{
        echo '
        <div class="gridBlockImage">
        <img src='. $row["image"] .' width="150" height="150" class="gridImage" onclick="myController2.showPop('. $serviceNumber .')">            
        <table class="labelTable">
            <tr >
                <td class="labelTableCell"><p id="sDetails" class="serviceLabel" ><p id="sDetails" class="serviceLabel">'. $row["serviceID"] .'</p><p class="price"> R'. $row["price"] .'.00</p></p></td class="gridBlock"></td>
                <td class="labelTableCellAdd">
                    <div class="addButton" onclick="myController2.bookService(false,'."'".$row["image"]."'".','. "'".$row["serviceID"]."'" .')">+</div>
                </td>
            </tr>
        </table>
        </div>
    
    ';
            //;$runs++;
          //}delete on completion
    }
  }

  function placeService($category)
  {
    switch($category)
    {
      case 1:
        $this->getEyes();
        
        break;
      case 2:
        $this->getNails();
        break;
      case 3:
        $this->getHair();
        break;
      case 4:
        $this->getWaxing();
        break;
    }

  }

  function deleteAppointment()
  {
    //mysqli_select_db($con,$dbName);
    $sql='delete from appointment where appointmentID='. $_GET['appointmentID'];
    $result = mysqli_query(getConnection(),$sql);
  }

}    
                
class appointer
{
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


    function makeRequests()
    {
    //$key = intval($_GET['k']);

    //mysqli_select_db($con,$dbName);
    $records="select count(*) from appointment;";
    $result = mysqli_query(getConnection(),$records);
    $row = mysqli_fetch_array($result);
    if($row['count(*)']!=0)
    {
      echo "<table class='statusTableBill'>
    <tr>

    <th class='headingCellBill'></th>
    <th class='headingCellBill'>Service</th>
    <th class='headingCellBill'>date</th>
        <th class='headingCellBill'>Stylist</th>
    <th class='headingCellBill'>Sessions</th>


    <th class='headingCellBill'>Cost</th>
    </tr>";
    }else
    {
      echo"<p id='billDescription' class='tableHeading'>---Bill Empty, Please Select Service to Book, Bookings will appear here.---</p>";
    }

    $sql='select * from appointment;';
    $result = mysqli_query(getConnection(),$sql);

    $rowNum=1;
    $count=1;
    $statusID='status'. $count;
    $sessionsID='sessions'. $count;
    $showheader=false;
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
        echo "<tr id='oddRowBill".$count."' class='oddRow')'>";
        $rowID='"'.'oddRowBill'.$count.'"';
        $rowNum=0;
      }else
      {
        echo "<tr id='evenRowBill".$count."' class='evenRow'>";
        $rowID='"'.'evenRowBill'.$count.'"';
        $rowNum=1;
      } 

      //convert string to integers
      echo "<td id=". 'recordThumbnail'.$count ." class='appointmentTimeCell' >" ."<img src='".$row['serviceThumbnail']."' width='50' height='50' class='appointmentImage'>" . "</td>";
      echo "<td id=". $serviceID ." class='appointmentCell' >" .  $row['serviceID'] . "</td>";
      echo "<td id=".$timeID." class='leftAppointmentCell'>" . $row['scheduledDateTime'] . "</td>";
      echo "<td id=". $stylistID ." class='appointmentTimeCell' >"  . $row['stylist'] . "</td>";//
      echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . $row['sessions'] . "</td>";//

      echo "<td id=". $statusID ." class='appointmentCell'>" . $row['servicePrice'] . "</td>";
      echo "<td id=". 'delete'." class='appointmentCell' >" . "<button class='deleteButton' onclick='newManager.deleteAppointment(". $row['appointmentID'] .",". $rowID .")' >Delete</button></td>";

      echo "</tr>";

      $count++;
    }

    $total="select sum(servicePrice) from appointment;";
    $row = mysqli_fetch_array(mysqli_query(getConnection(),$total));
    //$onclickAttribute="onclick='newManager.showPope(". $row['appointmentID'] .",". 1 .",". $this->flipData($row['stylist'],'stylist') ;

    echo "<tr class='evenRow' "  . ">";
    echo"<td></td>";
    echo"<td></td>";
    echo"<td></td>";
    echo"<td></td>";

    $result = mysqli_query(getConnection(),$records);

    $row = mysqli_fetch_array($result);
    if($row['count(*)']!=0)
    {
      $result = mysqli_query(getConnection(),$total);
      $row = mysqli_fetch_array($result);
      echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . "Total" . "</td>";
      echo "<td id=". $statusID ." class='appointmentCell'>" . "R ".$row['sum(servicePrice)']. "</td>";

    }
    echo "</tr>";
    //attributes need to have properties that will be caught by the showpop function

    echo "</table>";

    mysqli_close(getConnection());
    }

}                

$appointer=new appointer();
$serviceLogger=new serviceLogger();

  switch($_GET['path'])
  {
    case 1:
    $serviceLogger->logBooking();
    break;

    case 2:
      $serviceLogger->placeService($_GET['category']);
      break;

    case 3:
      $serviceLogger->deleteAppointment();
      break;

    case 4:
      $appointer->makeRequests();      
      break;
  }
?>