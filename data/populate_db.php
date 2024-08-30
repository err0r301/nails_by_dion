<?php
// Include the config file
require_once 'data/config.php';

function checkInsert($result, $dataName) {
    if ($result) {
        echo "$dataName data inserted successfully";
    } else {
        echo "Failed to insert $dataName data";
    }
}

// Dummy data
// insert multiple recodes of user data
$userQuery = "INSERT INTO user (name, email, cell, password, userType) 
                VALUES 
                ('Dion', 'admin@nailsbydion.com', '0781234567', $hash_password('Admin@123'), 'Admin'),
                ('Jane', 'jane@test.com', '0782345678', $hash_password('Jane123'), 'Admin'),
                ('John', 'john@test.com', '0783456789', $hash_password('John123'), 'Admin'),
                ('Jenny', 'jenny@test.com', '0784567890', $hash_password('Jenny123'), 'Admin'),
                ('James', 'james@test.com', '0785678901', $hash_password('James123'), 'Admin'),
                ('Emily', 'emily@test.com', '0786789012', $hash_password('Emily123'), 'Client'),
                ('Oliver', 'oliver@test.com', '0787890123', $hash_password('Oliver123'), 'Client'),
                ('Tester', 'test@test.com', '0788901234', $hash_password('Tester123'), 'Client'),
                ('Harry', 'harry@test.com', '0789012345', $hash_password('Harry123'), 'Client'),
                ('Mia', 'mia@test.com', '0780123456', $hash_password('Mia123'), 'Client'),
                ('Charlie', 'charlie@test.com', '0781234567', $hash_password('Charlie123'),'Client'),
                ('Ava', 'ava@test.com', '0782345678', $hash_password('Ava123'), 'Client'),
                ('Ben', 'ben@test.com', '0783456789', $hash_password('Ben123'), 'Client'),
                ('Lily', 'lily@test.com', '0784567890', $hash_password('Lily123'), 'Client')";

checkInsert($userResult, "User");

// insert admin data
$adminQuery = "INSERT INTO admin (userID, profileImage, accessLevel, role) 
                VALUES 
                (1, 'profile.png', 'super-admin', 'Manager'),
                (2, 'profile.png', 'admin', 'hair stylist'),
                (3, 'profile.png', 'admin', 'nail stylist'),
                (4, 'profile.png', 'admin', ''),
                (5, 'profile.png', 'admin', 'admin'),

// insert service data

// insert appointment data

// insert gallery data

// insert inventory data

// insert notification data

// insert availability data

// Close the connection
$conn->close();