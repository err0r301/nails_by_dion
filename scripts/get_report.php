<?php 
function getReport(){
    // Include the config file
    require '../data/config.php';

    // get sales this month
    //$query = "SELECT * FROM sale WHERE MONTH(date) = MONTH(NOW()) AND YEAR(date) = YEAR(NOW())"; 
    $query = "SELECT SUM(monthlyRevenue) AS sales FROM service";
    $Month_result = $conn->query($query);

    $sales = 0; // Default sales to 0  
    if ($Month_result && $Month_result->num_rows > 0) {  
        $row = $Month_result->fetch_assoc(); // Fetch the result as an associative array  
        $sales = $row['sales']; // Access the 'sales' key  
    }  

    // get appointments this month
    $appointments = 0;
    $query = "SELECT * FROM appointment WHERE MONTH(dateScheduled) = MONTH(NOW()) AND YEAR(dateScheduled) = YEAR(NOW())";
    $appointment_result = $conn->query($query);
    if ($appointment_result->num_rows > 0){
        $appointments = $appointment_result->num_rows;
    }

    //get number of users with a 'userType' of 'Client'
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    //get the name,category, price, and monthlyRevenue for each service
    $query = "SELECT serviceID AS name, category, price, monthlyRevenue FROM service";
    $service_result = $conn->query($query);

    $output = array(
        'sales' => $sales,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $service_result
    );

    echo"<script>console.log(".$output['sales'].")</script>";

    // Close the database connection
    $conn->close();

    return $output;
}