<?php   
function getReport() {  
    // Include the config file  
    require '../data/config.php';  

    // Get sales this month  
    $query = "SELECT SUM(monthlyRevenue) AS sales FROM service";  
    $Month_result = $conn->query($query);  

    $sales = 0; // Default sales to 0  
    if ($Month_result && $Month_result->num_rows > 0) {  
        $row = $Month_result->fetch_assoc(); // Fetch the result as an associative array  
        $sales = $row['sales']; // Access the 'sales' key  
    }  

    // Get appointments this month  
    $appointments = 0;  
    $query = "SELECT * FROM appointment WHERE MONTH(scheduledDateTime) = MONTH(NOW()) AND YEAR(scheduledDateTime) = YEAR(NOW())";  
    $appointment_result = $conn->query($query);  
    if ($appointment_result->num_rows > 0) {  
        $appointments = $appointment_result->num_rows;  
        echo "<script>console.log('appointments: ".$appointments."')</script>";  
    } else {  
        echo "<script>console.log('no appointments')</script>";  
    }  

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";  
    $user_result = $conn->query($query);  

    // Get the name, category, price, and monthlyRevenue for each service  
    $query = "SELECT serviceID AS name, category, price, monthlyRevenue FROM service";  
    $service_result = $conn->query($query);  

    // Fetch services into an array  
    $services = [];  
    if ($service_result && $service_result->num_rows > 0) {  
        while ($service = $service_result->fetch_assoc()) {  
            $services[] = $service; // Add each service to the array  
        }  
    }  

    $output = array(  
        'sales' => $sales,  
        'appointments' => $appointments,  
        'users' => $user_result->num_rows,  
        'services' => $services // Use the array of services here  
    );  

    echo "<script>console.log('sales: ".$output['sales']."')</script>";  
    echo "<script>console.log('appointments: ".$output['appointments']."')</script>";  

    // Close the database connection  
    $conn->close();  

    return $output;  
}