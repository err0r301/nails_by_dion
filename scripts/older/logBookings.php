<?php

class serviceLogger
{
  function logBooking()
  {
    $key = intval($_GET['log']);
    
    $serverName="localhost";
    $userName="root";
    $password="12345";
    $dbName="nails_by_dion_database";
  
    $con=mysqli_connect($serverName, $userName, $password, $dbName);
  
    if (!$con) 
    {
      die('Could not connect: ' . mysqli_connect_error($con));
    }

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
      mysqli_select_db($con,$dbName);
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
      $sql='insert into appointments values(appointmentID, "userName","'.$date.' 21:00", "'.$date.' '. $time .'","'. $stylist .'",'. $sessions .', "Unconfirmed", "'. $service .'", "'.$serviceThumbnail.'",'.$_GET['servicePrice'].');';
      //$sql="insert into appointments values(appointmentID, 'userName',". $date.", '20:27', 'approved','tyr');";//
      
      $result = mysqli_query($con,$sql);
      $_GET['update']=0;
    }
    
    

    mysqli_close($con);
  }

  function placeService()
  {
    //read the database for data needed for the service

    //$key = intval($_GET['k']);
    
    $serverName="localhost";
    $userName="root";
    $password="12345";
    $dbName="nails_by_dion_database";
  
    $con=mysqli_connect($serverName, $userName, $password, $dbName);
  
    if (!$con) 
    {
      die('Could not connect: ' . mysqli_connect_error($con));
    }

   // $userID=$_SESSION['user'];
  
    mysqli_select_db($con,$dbName);
    $sql='select * from service where monthlyRevenue=13000;';
    $result = mysqli_query($con,$sql);
    
    mysqli_select_db($con,$dbName);
    //$records="select count(*) from appointments;";
    //$result = mysqli_query($con,$result);
    $row = mysqli_fetch_array($result);

    echo "
                
                <img src='". $row['image'] ."' width='150' height='150' class='gridImage' onclick='myController2.showPop(". 2 .")'>            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id='sDetails' class='serviceLabel' ><p id='sDetails' class='serviceLabel'>".$row['serviceID']."</p><p class='price'> ".$row['price']."</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'>
                            <div class='addButton' onclick='myController2.bookService(false, '../_images/". 2 .".jpg', '"."big hybrid"."')'>+</div>
                        </td>
                    </tr>
                </table>
            
    ";
  }

  function deleteAppointment()
  {
    $serverName="localhost";
    $userName="root";
    $password="12345";
    $dbName="nails_by_dion_database";
  
    $con=mysqli_connect($serverName, $userName, $password, $dbName);
  
    if (!$con) 
    {
      die('Could not connect: ' . mysqli_connect_error($con));
    }
  
    mysqli_select_db($con,$dbName);



    $sql='delete from appointments where appointmentID='. $_GET['appointmentID'];
    $result = mysqli_query($con,$sql);
  }
}



$serviceLogger=new serviceLogger();

  switch($_GET['path'])
  {
    case 1:
    $serviceLogger->logBooking();
    break;

    case 2:
      $serviceLogger->placeService();
      break;

    case 3:
      $serviceLogger->deleteAppointment();
      break;
  }
?>