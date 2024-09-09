<?php 
// Include the config file
ini_set('display_errors', 1);
error_reporting(E_ALL);
require '../data/config.php';

$weeklySalesQuery = "SELECT   s.name,  SUM(sa.price) AS income_last_week  
                    FROM   
                        sale sa  
                    JOIN   
                        service s ON sa.serviceID = s.serviceID  
                    WHERE   
                        sa.date >= CURDATE() - INTERVAL 7 DAY  
                    GROUP BY   
                        s.name;";
                    
$weeklySalesResult = $conn->query($weeklySalesQuery);
$weeklySales = array();
foreach ($weeklySalesResult as $row) {
    $weeklySales[] = $row;
}

$monthlySalesQuery = "SELECT   s.name,  SUM(sa.price) AS income_last_month  
                    FROM   
                        sale sa  
                    JOIN   
                        service s ON sa.serviceID = s.serviceID  
                    WHERE   
                        sa.date >= CURDATE() - INTERVAL 1 MONTH  
                    GROUP BY   
                        s.name;";

$monthlySalesResult = $conn->query($monthlySalesQuery);
$monthlySales = array();
foreach ($monthlySalesResult as $row) {
    $monthlySales[] = $row;
}

$yearlySalesQuery = "SELECT   s.name,  SUM(sa.price) AS income_last_year  
                    FROM   
                        sale sa  
                    JOIN   
                        service s ON sa.serviceID = s.serviceID  
                    WHERE   
                        sa.date >= CURDATE() - INTERVAL 1 YEAR  
                    GROUP BY   
                        s.name;";

$yearlySalesResult = $conn->query($yearlySalesQuery);
$yearlySales = array();
foreach ($yearlySalesResult as $row) {
    $yearlySales[] = $row;
}