<?php
function getReport()
{
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
        echo "<script>console.log('appointments: " . $appointments . "')</script>";
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

    echo "<script>console.log('sales: " . $output['sales'] . "')</script>";
    echo "<script>console.log('appointments: " . $output['appointments'] . "')</script>";

    // Close the database connection  
    $conn->close();

    return $output;
}

function weekReport()
{
    require '../data/config.php';

    $appointments = 0;

    // Get the start and end of the current week  
    $startOfWeek = date('Y-m-d H:i:s', strtotime('monday this week'));
    $endOfWeek = date('Y-m-d H:i:s', strtotime('sunday this week'));

    $appointments = countAppointments($conn, $startOfWeek, $endOfWeek, "week");

    $output = array();

    return $output;
}

function monthReport()
{
    require '../data/config.php';

    $appointments = 0;

    // Get the first and last day of the current month  
    $startOfMonth = date('Y-m-01 00:00:00'); // First day of the month  
    $endOfMonth = date('Y-m-t 23:59:59'); // Last day of the month  

    $appointments = countAppointments($conn, $startOfMonth, $endOfMonth, "month");

    $output = array();

    return $output;
}

function quarterReport()
{
    require '../data/config.php';

    $appointments = 0;

    // Get the current date  
    $currentMonth = date('n'); // Numeric representation of a month (1 to 12)  
    $currentYear = date('Y');   // Current year  

    // Determine the start and end of the current quarter  
    if ($currentMonth >= 1 && $currentMonth <= 3) {
        // Q1: January to March  
        $startOfQuarter = "$currentYear-01-01 00:00:00";
        $endOfQuarter = "$currentYear-03-31 23:59:59";
    } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
        // Q2: April to June  
        $startOfQuarter = "$currentYear-04-01 00:00:00";
        $endOfQuarter = "$currentYear-06-30 23:59:59";
    } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
        // Q3: July to September  
        $startOfQuarter = "$currentYear-07-01 00:00:00";
        $endOfQuarter = "$currentYear-09-30 23:59:59";
    } else {
        // Q4: October to December  
        $startOfQuarter = "$currentYear-10-01 00:00:00";
        $endOfQuarter = "$currentYear-12-31 23:59:59";
    }

    $appointments = countAppointments($conn, $startOfQuarter, $endOfQuarter, "quarter");

    $output = array();

    return $output;
}

function yearReport()
{
    require '../data/config.php';

    $appointments = 0;

    // Get the current year  
    $currentYear = date('Y'); // Current year  

    // Determine the start and end of the current year  
    $startOfYear = "$currentYear-01-01 00:00:00"; // First day of the year  
    $endOfYear = "$currentYear-12-31 23:59:59"; // Last day of the year  

    $appointments = countAppointments($conn, $startOfYear, $endOfYear, "year");

    $output = array();

    return $output;
}

function countAppointments($conn, $startDate, $endDate, $period)
{
    $appointments = 0;

    // Prepare the SQL query to count appointments  
    $query = "SELECT * FROM appointment WHERE scheduledDateTime BETWEEN ? AND ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();
    $appointment_result = $stmt->get_result();

    if ($appointment_result->num_rows > 0) {
        $appointments = $appointment_result->num_rows;
        echo "<script>console.log('appointments this $period: " . $appointments . "');</script>";
    } else {
        echo "<script>console.log('no appointments this $period');</script>";
    }

    $stmt->close();
    return $appointments;
}
