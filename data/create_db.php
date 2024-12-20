<?php
// Include the config file
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Parse the config file
$config = parse_ini_file(__DIR__ . "/../config.ini", true);

$host = $config["database"]["DB_HOST"];
$dbName = $config["database"]["DB_NAME"];
$username = $config["database"]["DB_USER"];
$password = $config["database"]["DB_PASSWORD"];

// Create a connection to the MySQL server without selecting a database  
$conn = new mysqli($host, $username, $password);

// Check connection  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists     
$result = $conn->query("SHOW DATABASES LIKE '$dbName'");

if ($result) {
    if ($result->num_rows > 0) {
        echo "The '$dbName' database already exists.\n";
    } else {
        // SQL to create a database  
        if ($conn->query("CREATE DATABASE $dbName") === TRUE) {
            echo "Database '$dbName' created successfully.\n";
            // Select the database after creation  
            $conn->select_db($dbName);
            // Create tables  
            createUserTable($conn);
            createAdminTable($conn);
            createServiceTable($conn);
            createAppointmentTable($conn);
            //createGalleryTable($conn);  
            createInventoryTable($conn);
            createNotificationTable($conn);
            createAutoNotificationTable($conn);
            //createCartTable($conn);
            //createSaleTable($conn);
        } else {
            echo "Error creating database: " . $conn->error . "\n";
        }
    }
} else {
    echo "Query failed: " . $conn->error;
}

// Close the connection  
$conn->close();

function confirmQuery($conn, $sql, $tableName)
{
    if ($conn->query($sql) === TRUE) {
        echo "$tableName table created successfully.\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
}

function createUserTable($conn)
{
    $sql = "CREATE TABLE user (
        userID INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(60) NOT NULL,
        cell VARCHAR(15),
        password VARCHAR(500) NOT NULL,
        userType VARCHAR(10) DEFAULT 'Client'
    )";

    confirmQuery($conn, $sql, "User");
}

function createServiceTable($conn)
{
    $sql = "CREATE TABLE service (
        /*serviceID INT AUTO_INCREMENT PRIMARY KEY,*/
        serviceID VARCHAR(100) PRIMARY KEY,
        /*name VARCHAR(100) NOT NULL,*/
        description VARCHAR(300) NOT NULL,
        price FLOAT NOT NULL,
        image VARCHAR(150) NOT NULL,
        category VARCHAR(30) NOT NULL,
        duration TIME NOT NULL,
        monthlyRevenue FLOAT NOT NULL DEFAULT 0,
        status VARCHAR(20) NOT NULL
    )";

    confirmQuery($conn, $sql, "Service");
}

function createAdminTable($conn)
{
    $sql = "CREATE TABLE admin (
        adminID INT AUTO_INCREMENT PRIMARY KEY,
        userID INT NOT NULL,
        profileImage VARCHAR(150) NOT NULL,
        accessLevel VARCHAR(30) NOT NULL DEFAULT 'admin',
        role VARCHAR(50) NOT NULL,
        FOREIGN KEY (userID) REFERENCES user(userID)
    )";

    confirmQuery($conn, $sql, "Admin");
}

function createAppointmentTable($conn)
{
    $sql = "CREATE TABLE appointment (
        appointmentID INT AUTO_INCREMENT PRIMARY KEY,
        userID INT,
        /*adminID INT NOT NULL,*/
        stylist VARCHAR(30) NOT NULL,
        sessions INT NOT NULL DEFAULT 1,
        dateBooked DATETIME NOT NULL,
        scheduledDateTime DATETIME NOT NULL,
        serviceID VARCHAR(100) NOT NULL,
        userEmail VARCHAR(100),
        status_ VARCHAR(20) NOT NULL DEFAULT 'Pending',
        serviceThumbnail VARCHAR(150),
        servicePrice INT
        /*FOREIGN KEY (userID) REFERENCES user(userID)*/
    )";

    confirmQuery($conn, $sql, "Appointment");
}

function createInventoryTable($conn)
{
    $sql = "CREATE TABLE inventory (
        inventoryID INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        stock INT NOT NULL,
        price FLOAT NOT NULL
    )";

    confirmQuery($conn, $sql, "Inventory");
}

function createNotificationTable($conn)
{
    $sql = "CREATE TABLE notification (
        notificationID INT AUTO_INCREMENT PRIMARY KEY,
        dateTime_ DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        message VARCHAR(300) NOT NULL,
        status_ VARCHAR(10) NOT NULL DEFAULT 'Unread',
        userID INT NOT NULL
        /*FOREIGN KEY (userID) REFERENCES user(userID)*/
    )";

    confirmQuery($conn, $sql, "Notification");
}

function createAutoNotificationTable($conn)
{
    $sql = "CREATE TABLE auto_notification (
        autoNotificationID VARCHAR(50) PRIMARY KEY,
        message VARCHAR(300) NOT NULL)";

    confirmQuery($conn, $sql, "AutoNotification");
}

/*function createGalleryTable($conn) {
    $sql = "CREATE TABLE gallery (
        galleryID INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(150) NOT NULL,
        date DATETIME NOT NULL
    )";

    confirmQuery($conn, $sql, "Gallery");
}*/

/*function createCartTable($conn) {
    $sql = "CREATE TABLE cart (
        cartID INT AUTO_INCREMENT PRIMARY KEY,
        appointmentID INT NOT NULL,
        serviceID INT NOT NULL,
        FOREIGN KEY (appointmentID) REFERENCES appointment(appointmentID),
        FOREIGN KEY (serviceID) REFERENCES service(serviceID)
    )";

    confirmQuery($conn, $sql, "Cart");
}*/

/*function createSaleTable($conn) {
    $sql = "CREATE TABLE sale (
        saleID INT AUTO_INCREMENT PRIMARY KEY,
        serviceID VARCHAR(100) NOT NULL,
        price FLOAT NOT NULL,   
        date DATE NOT NULL,
        FOREIGN KEY (serviceID) REFERENCES service(serviceID)
    )";

    confirmQuery($conn, $sql, "Sale");
}*/