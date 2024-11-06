<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    echo "<script>console.log('report form sent');</script>";
} else {
    $currentYear = date('Y');
    $startDate = "$currentYear-01-01 00:00:00"; // First day of the year  
    $endDate = "$currentYear-12-31 23:59:59"; // Last day of the year 
    echo "<script>console.log('report form not sent');</script>";
}

function getReport($startDate, $endDate)
{
    $output = [];
    $output = customReport($startDate, $endDate);
    return $output;
}
/*
function weekReport()
{
    require '../data/config.php';
    $appointments = 0;
    $services = [];

    // Get the start and end of the current week  
    $startOfWeek = date('Y-m-d H:i:s', strtotime('monday this week'));
    $endOfWeek = date('Y-m-d H:i:s', strtotime('sunday this week'));

    $appointments = countAppointments($conn, $startOfWeek, $endOfWeek, "week");
    $services = serviceDetails($conn, $startOfWeek, $endOfWeek);
    $staff = staffDetails($conn, $startOfWeek, $endOfWeek);
    $serviceTotal = 0;

    foreach ($services as $service) {
        $serviceTotal += $service['revenue'];
    }

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    $output = array(
        'sales' => $serviceTotal,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $services,
        'staff' => $staff
    );
    $conn->close();

    return $output;
}

function monthReport()
{
    require '../data/config.php';
    $appointments = 0;
    $services = [];

    // Get the first and last day of the current month  
    $startOfMonth = date('Y-m-01 00:00:00'); // First day of the month  
    $endOfMonth = date('Y-m-t 23:59:59'); // Last day of the month  

    $appointments = countAppointments($conn, $startOfMonth, $endOfMonth, "month");
    $services = serviceDetails($conn, $startOfMonth, $endOfMonth);
    $staff = staffDetails($conn, $startOfMonth, $endOfMonth);
    $serviceTotal = 0;

    foreach ($services as $service) {
        $serviceTotal += $service['revenue'];
    }

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    $output = array(
        'sales' => $serviceTotal,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $services,
        'staff' => $staff
    );
    $conn->close();

    return $output;
}

function quarterReport()
{
    require '../data/config.php';
    $appointments = 0;
    $services = [];

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
    $services = serviceDetails($conn, $startOfQuarter, $endOfQuarter);
    $staff = staffDetails($conn, $startOfQuarter, $endOfQuarter);
    $serviceTotal = 0;

    foreach ($services as $service) {
        $serviceTotal += $service['revenue'];
    }

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    $output = array(
        'sales' => $serviceTotal,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $services,
        'staff' => $staff
    );
    $conn->close();

    return $output;
}

function yearReport()
{
    require '../data/config.php';
    $appointments = 0;
    $services = [];

    // Get the current year  
    $currentYear = date('Y'); // Current year  

    // Determine the start and end of the current year  
    $startOfYear = "$currentYear-01-01 00:00:00"; // First day of the year  
    $endOfYear = "$currentYear-12-31 23:59:59"; // Last day of the year  

    $appointments = countAppointments($conn, $startOfYear, $endOfYear, "year");
    $services = serviceDetails($conn, $startOfYear, $endOfYear);
    $staff = staffDetails($conn, $startOfYear, $endOfYear);
    $serviceTotal = 0;

    foreach ($services as $service) {
        $serviceTotal += $service['revenue'];
    }

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    $output = array(
        'sales' => $serviceTotal,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $services,
        'staff' => $staff
    );
    $conn->close();

    return $output;
}
*/
function customReport($startDate, $endDate)
{
    require '../data/config.php';
    $appointments = 0;
    $services = [];

    $appointments = countAppointments($conn, $startDate, $endDate, "custom date");
    $services = serviceDetails($conn, $startDate, $endDate);
    $staff = staffDetails($conn, $startDate, $endDate);
    $serviceTotal = 0;

    foreach ($services as $service) {
        $serviceTotal += $service['revenue'];
    }

    // Get number of users with a 'userType' of 'Client'  
    $query = "SELECT * FROM user WHERE userType = 'Client'";
    $user_result = $conn->query($query);

    $output = array(
        'sales' => $serviceTotal,
        'appointments' => $appointments,
        'users' => $user_result->num_rows,
        'services' => $services,
        'staff' => $staff
    );
    $conn->close();

    echo "<script>console.log('start date: " . $startDate . "', 'end date: " . $endDate . "');</script>";

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

    return $appointments;
}

function serviceDetails($conn, $startDate, $endDate)
{
    $query = "SELECT s.serviceID AS name,  
            COUNT(CASE WHEN a.status_ = 'Complete' THEN 1 END) AS completeCount,  
            SUM(CASE WHEN a.status_ = 'Complete' THEN 1 ELSE 0 END) * s.price AS revenue,  
            s.price,  
            s.category  
        FROM appointment a  
        JOIN service s ON a.serviceID = s.serviceID  
        WHERE a.scheduledDateTime BETWEEN ? AND ?  
        GROUP BY s.serviceID, s.price, s.category  
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = array(
                'name' => $row["name"],
                'revenue' => $row["revenue"],
                'price' => $row["price"],
                'category' => $row["category"],
                'completeCount' => $row["completeCount"]
            );
        }
        echo "<script>console.log('serviceDetails: " . json_encode($output) . "');</script>";
    } else {
        echo "<script>console.log('no serviceDetails');</script>";
    }

    return $output;
}

function staffDetails($conn, $startDate, $endDate)
{
    $query = "SELECT  
        a.stylist,  
        COUNT(CASE WHEN a.status_ = 'Complete' THEN 1 END) AS complete_appointments,  
        COUNT(CASE WHEN a.status_ = 'Cancelled' THEN 1 END) AS cancelled_appointments,  
        SUM(CASE WHEN a.status_ = 'Complete' THEN s.price ELSE 0 END) AS revenue  
    FROM  
        appointment a  
    JOIN   
        service s ON a.serviceID = s.serviceID   
    WHERE   
        a.scheduledDateTime BETWEEN ? AND ?   
    GROUP BY  
        a.stylist";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $startDate, $endDate);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = array(
                'name' => $row["stylist"],
                'complete_appointments' => $row["complete_appointments"],
                'cancelled_appointments' => $row["cancelled_appointments"],
                'revenue' => $row["revenue"]
            );
        }
        echo "<script>console.log('staffDetails: " . json_encode($output) . "');</script>";
    } else {
        echo "<script>console.log('no staffDetails');</script>";
    }

    return $output;
}
