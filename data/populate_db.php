<?php
// Include the config file
require_once 'config.php';

error_reporting(E_ALL);  
ini_set('display_errors', 1); 


function checkInsert($conn,$query, $dataName) {
    if ($conn->query($query) === TRUE) {
        echo "$dataName data inserted successfully\n";
    } else {
        echo "Failed to insert $dataName data\n";
    }
}

// Dummy data
// insert multiple recodes of user data
$pwd1 = password_hash('Admin@123', PASSWORD_DEFAULT);
$pwd2 = password_hash('Jane@123', PASSWORD_DEFAULT);
$pwd3 = password_hash('John@123', PASSWORD_DEFAULT);
$pwd4 = password_hash('Jenny@123', PASSWORD_DEFAULT);
$pwd5 = password_hash('James@123', PASSWORD_DEFAULT);
$pwd6 = password_hash('Emily@123', PASSWORD_DEFAULT);
$pwd7 = password_hash('Oliver@123', PASSWORD_DEFAULT);
$pwd8 = password_hash('Tester@123', PASSWORD_DEFAULT);
$pwd9 = password_hash('Harry@123', PASSWORD_DEFAULT);
$pwd10 = password_hash('Mia@123', PASSWORD_DEFAULT);
$pwd11 = password_hash('Charlie@123', PASSWORD_DEFAULT);
$pwd12 = password_hash('Ava@123', PASSWORD_DEFAULT);
$pwd13 = password_hash('Ben@123', PASSWORD_DEFAULT);
$pwd14 = password_hash('Lily@123', PASSWORD_DEFAULT);

$userQuery = "INSERT INTO user (userID, name, email, cell, password, userType) 
                VALUES 
                (1,'Dion', 'admin@nailsbydion.com', '0781234567', '$pwd1', 'Admin'),
                (2,'Jane', 'jane@test.com', '0782345678', '$pwd2', 'Admin'),
                (3,'John', 'john@test.com', '0783456789', '$pwd3', 'Admin'),
                (4,'Jenny', 'jenny@test.com', '0784567890', '$pwd4', 'Admin'),
                (5,'James', 'james@test.com', '0785678901', '$pwd5', 'Admin'),
                (6,'Emily', 'emily@test.com', '0786789012', '$pwd6', 'Client'),
                (7,'Oliver', 'oliver@test.com', '0787890123', '$pwd7', 'Client'),
                (8,'Tester', 'test@test.com', '0788901234', '$pwd8', 'Client'),
                (9,'Harry', 'harry@test.com', '0789012345', '$pwd9', 'Client'),
                (10,'Mia', 'mia@test.com', '0780123456', '$pwd10', 'Client'),
                (11,'Charlie', 'charlie@test.com', '0781234567', '$pwd11','Client'),
                (12,'Ava', 'ava@test.com', '0782345678', '$pwd12', 'Client'),
                (13,'Ben', 'ben@test.com', '0783456789', '$pwd13', 'Client'),
                (14,'Lily', 'lily@test.com', '0784567890', '$pwd14', 'Client')";

checkInsert($conn, $userQuery, "User");

// insert admin data
$adminQuery = "INSERT INTO admin (adminID,userID, profileImage, accessLevel, role) 
                VALUES 
                (1,1, 'profile.png', 'super-admin', 'Manager'),
                (2,2, 'profile.png', 'admin', 'hair stylist'),
                (3,3, 'profile.png', 'admin', 'nail stylist'),
                (4,4, 'profile.png', 'admin', 'hair stylist'),
                (5,5, 'profile.png', 'admin', 'nail stylist')";

checkInsert($conn, $adminQuery, "Admin");

// insert service data
$serviceQuery = "INSERT INTO service (serviceID, name, category, status, price, duration, description, image) 
                VALUES 
                (1, 'Classic Manicure', 'Manicure', 'Disabled', 250, '00:30:00', 'A classic manicure treatment to keep your nails looking and feeling great', '../_images/1.jpg'),
                (2, 'Gel Manicure', 'Manicure', 'Disabled', 350, '00:45:00', 'A gel manicure treatment to keep your nails looking and feeling great', '../_images/2.jpg'),
                (3, 'French Manicure', 'Manicure', 'Active', 300, '00:45:00', 'A French manicure treatment to keep your nails looking and feeling great', '../_images/3.jpg'),
                (4, 'Classic Pedicure', 'Pedicure', 'Disabled', 300, '00:45:00', 'A classic pedicure treatment to keep your feet looking and feeling great', '../_images/4.png'),
                (5, 'Gel Pedicure', 'Pedicure', 'Active', 400, '01:00:00', 'A gel pedicure treatment to keep your feet looking and feeling great', '../_images/5.png'),
                (6, 'Paraffin Treatment', 'Pedicure', 'Active', 150, '00:30:00', 'A paraffin treatment to keep your feet looking and feeling great', '../_images/6.png'),
                (7, 'Facial', 'Beauty Treatment', 'Disabled', 500, '01:30:00', 'A facial treatment to keep your skin looking and feeling great', '../_images/7.png'),
                (8, 'Microdermabrasion', 'Beauty Treatment', 'Active', 750, '01:45:00', 'A microdermabrasion treatment to keep your skin looking and feeling great', '../_images/8.png'),
                (9, 'Chemical Peel', 'Beauty Treatment', 'Active', 800, '02:00:00', 'A chemical peel treatment to keep your skin looking and feeling great', '../_images/9.png'),
                (10, 'Haircut', 'Hair Beauty', 'Disabled', 400, '00:45:00', 'A haircut treatment to keep your hair looking and feeling great', '../_images/10.jpg'),
                (11, 'Hair Color', 'Hair Beauty', 'Active', 600, '02:00:00', 'A hair color treatment to keep your hair looking and feeling great', '../_images/11.jpg'),
                (12, 'Highlights', 'Hair Beauty', 'Active', 800, '02:30:00', 'A highlights treatment to keep your hair looking and feeling great', '../_images/12.jpg'),
                (13, 'Blowout', 'Hair Beauty', 'Active', 350, '00:45:00', 'A blowout treatment to keep your hair looking and feeling great', '../_images/13.png'),
                (14, 'Hair Extensions', 'Hair Beauty', 'Active', 700, '03:00:00', 'A hair extensions treatment to keep your hair looking and feeling great', '../_images/14.png'),
                (15, 'Keratin Treatment', 'Hair Beauty', 'Disabled', 850, '03:30:00', 'A keratin treatment to keep your hair looking and feeling great', '../_images/15.png')";

checkInsert($conn, $serviceQuery, "Service");

// insert appointment data
$appointmentQuery = "INSERT INTO appointment (appointmentID, userID, adminID, dateBooked, dateScheduled, status) 
                VALUES  
                (1, 6, 1,'2022-01-01 10:32:00','2022-01-03 07:00:00', 'Pending'),
                (2, 7, 2,'2022-01-01 12:53:00','2022-01-03 08:00:00', 'Complete'),
                (3, 8, 3,'2022-01-02 11:25:00','2022-01-03 10:00:00', 'Pending'),
                (4, 9, 4,'2022-01-02 11:53:00','2022-01-03 12:00:00', 'Pending'),
                (5, 10, 5,'2022-01-02 14:13:00','2022-01-03 14:00:00', 'Cancelled'),
                (6, 11, 1,'2022-01-03 16:34:00','2022-01-04 08:00:00', 'Pending'),
                (7, 12, 2,'2022-01-03 15:15:00','2022-01-04 10:00:00', 'Complete'),
                (8, 13, 3,'2022-01-03 12:42:00','2022-01-04 11:00:00', 'Pending'),
                (9, 14, 4,'2022-01-03 13:35:00','2022-01-04 13:00:00', 'Cancelled'),
                (10, 6, 5,'2022-01-03 16:59:00','2022-01-04 15:00:00', 'Pending'),
                (11, 7, 1,'2022-01-04 17:24:00','2022-01-05 09:00:00', 'Complete'),
                (12, 8, 2,'2022-01-04 11:52:00','2022-01-05 11:00:00', 'Complete'),
                (13, 9, 3,'2022-01-04 18:13:00','2022-01-05 13:00:00', 'Complete'),
                (14, 10, 4,'2022-01-03 19:02:00','2022-01-05 15:00:00', 'Complete'),
                (15, 11, 5,'2022-01-01 14:41:00','2022-01-05 17:00:00', 'Complete'),
                (16, 12, 1,'2022-01-03 11:52:00','2022-01-06 08:00:00', 'Pending'),
                (17, 13, 2,'2022-01-01 14:31:00','2022-01-06 10:00:00', 'Pending'),
                (18, 14, 3,'2022-01-04 12:14:00','2022-01-06 15:00:00', 'Pending'),
                (19, 6, 4,'2022-01-05 04:35:00','2022-01-07 10:00:00', 'Cancelled'),
                (20, 7, 5,'2022-01-06 08:24:00','2022-01-07 13:00:00', 'Complete')";

checkInsert($conn, $appointmentQuery, "Appointment");


// insert gallery data
$galleryQuery = "INSERT INTO gallery (galleryID, image, date) 
                VALUES 
                (1, 'gallery_1', '2022-01-01 12:00:00'),
                (2, 'gallery_2', '2022-01-05 14:00:00'),
                (3, 'gallery_3', '2022-01-10 10:00:00'),
                (4, 'gallery_4', '2022-01-15 16:00:00'),
                (5, 'gallery_5', '2022-01-20 12:00:00'),
                (6, 'gallery_6', '2022-01-25 14:00:00'),
                (7, 'gallery_7', '2022-01-30 10:00:00'),
                (8, 'gallery_8', '2022-02-01 16:00:00'),
                (9, 'gallery_9', '2022-02-05 12:00:00')";

checkInsert($conn, $galleryQuery, "Gallery");

// insert inventory data
$inventoryQuery = "INSERT INTO inventory (inventoryID, name, price,stock)
VALUES
    (1, 'Shampoo', 250.00,13),
    (2, 'Conditioner', 250.00,7),
    (3, 'Hair Serum', 350.00,12),
    (4, 'Leave-in Conditioner', 320.00,11),
    (5, 'Face Mask', 400.00,34)";

checkInsert($conn, $inventoryQuery, "Inventory");

// insert cart data
$cartQuery = "INSERT INTO cart (cartID, appointmentID, serviceID)
VALUES
    (1, 1, 15),
    (2, 2, 2),
    (3, 3, 7),
    (4, 4, 4),
    (5, 5, 2),
    (6, 6, 7),
    (7, 7, 8),
    (8, 8, 5),
    (9, 9, 7),
    (10, 10, 12),
    (11, 11, 5),
    (12, 12, 14),
    (13, 13, 12),
    (14, 14, 11),
    (15, 15, 10),
    (16, 16, 9),
    (17, 17, 15),
    (18, 18, 12),
    (19, 19, 4),
    (20, 20, 3),
    (21, 20, 15)";

checkInsert($conn, $cartQuery, "Cart"); 

// insert sales data
$saleQuery = "INSERT INTO sale (saleID, serviceID, price, date)
VALUES
    (1, 1, 200.00, '2022-01-01'),
    (2, 2, 250.00, '2022-01-02'),
    (3, 3, 300.00, '2022-01-03'),
    (4, 4, 350.00, '2022-01-04'),
    (5, 5, 400.00, '2022-01-05'),
    (6, 6, 450.00, '2022-01-06'),
    (7, 7, 500.00, '2022-01-07'),
    (8, 8, 550.00, '2022-01-08'),
    (9, 9, 600.00, '2022-01-09'),
    (10, 10, 300.00, '2022-01-10'),
    (11, 11, 350.00, '2022-01-11'),
    (12, 12, 400.00, '2022-01-12'),
    (13, 13, 450.00, '2022-01-13'),
    (14, 14, 500.00, '2022-01-14'),
    (15, 15, 550.00, '2022-01-15'),
    (16, 15, 300.00, '2022-01-16'),
    (17, 14, 350.00, '2022-01-17'),
    (18, 13, 400.00, '2022-01-18'),
    (19, 12, 450.00, '2022-01-19'),
    (20, 11, 500.00, '2022-01-20'),
    (21, 10, 550.00, '2022-01-21'),
    (22, 9, 300.00, '2022-01-22'),
    (23, 8, 350.00, '2022-01-23'),
    (24, 7, 400.00, '2022-01-24'),
    (25, 6, 450.00, '2022-01-25'),
    (26, 5, 500.00, '2022-01-26'),
    (27, 4, 550.00, '2022-01-27'),
    (28, 3, 300.00, '2022-01-28'),
    (29, 2, 350.00, '2022-01-29'),
    (30, 1, 400.00, '2022-01-30'),
    (31, 15, 450.00, '2022-01-31'),
    (32, 14, 500.00, '2022-02-01'),
    (33, 13, 550.00, '2022-02-02'),
    (34, 12, 300.00, '2022-02-03'),
    (35, 11, 350.00, '2022-02-04'),
    (36, 10, 400.00, '2022-02-05'),
    (37, 9, 450.00, '2022-02-06'),
    (38, 8, 500.00, '2022-02-07'),
    (39, 7, 550.00, '2022-02-08'),
    (40, 6, 300.00, '2022-02-09'),
    (41, 5, 350.00, '2022-02-10'),
    (42, 4, 400.00, '2022-02-11'),
    (43, 3, 450.00, '2022-02-12'),
    (44, 2, 500.00, '2022-02-13'),
    (45, 1, 550.00, '2022-02-14'),
    (46, 15, 300.00, '2022-02-15'),
    (47, 14, 350.00, '2022-02-16'),
    (48, 13, 400.00, '2022-02-17'),
    (49, 12, 450.00, '2022-02-18'),
    (50, 11, 500.00, '2022-02-19'),
    (51, 10, 550.00, '2022-02-20'),
    (52, 9, 300.00, '2022-02-21'),
    (53, 8, 350.00, '2022-02-22'),
    (54, 7, 400.00, '2022-02-23'),
    (55, 6, 450.00, '2022-02-24'),
    (56, 5, 500.00, '2022-02-25'),
    (57, 4, 550.00, '2022-02-26'),
    (58, 3, 300.00, '2022-02-27'),
    (59, 2, 350.00, '2022-02-28'),
    (60, 1, 400.00, '2022-03-01'),
    (61, 15, 450.00, '2022-03-02'),
    (62, 14, 500.00, '2022-03-03'),
    (63, 13, 550.00, '2022-03-04'),
    (64, 12, 300.00, '2022-03-05'),
    (65, 11, 350.00, '2022-03-06'),
    (66, 10, 400.00, '2022-03-07'),
    (67, 9, 450.00, '2022-03-08'),
    (68, 8, 500.00, '2022-03-09'),
    (69, 7, 550.00, '2022-03-10'),
    (70, 6, 300.00, '2022-03-11'),
    (71, 5, 350.00, '2022-03-12'),
    (72, 4, 400.00, '2022-03-13'),
    (73, 3, 450.00, '2022-03-14'),
    (74, 2, 500.00, '2022-03-15'),
    (75, 1, 550.00, '2022-03-16'),
    (76, 15, 300.00, '2022-03-17'),
    (77, 14, 350.00, '2022-03-18'),
    (78, 13, 400.00, '2022-03-19'),
    (79, 12, 450.00, '2022-03-20'),
    (80, 11, 500.00, '2022-03-21'),
    (81, 10, 550.00, '2022-03-22'),
    (82, 9, 300.00, '2022-03-23'),
    (83, 8, 350.00, '2022-03-24'),
    (84, 7, 400.00, '2022-03-25'),
    (85, 6, 450.00, '2022-03-26'),
    (86, 5, 500.00, '2022-03-27'),
    (87, 4, 550.00, '2022-03-28'),
    (88, 3, 300.00, '2022-03-29'),
    (89, 2, 350.00, '2022-03-30'),
    (90, 1, 400.00, '2022-03-31'),
    (91, 15, 450.00, '2022-04-01'),
    (92, 14, 500.00, '2022-04-02'),
    (93, 13, 550.00, '2022-04-03'),
    (94, 12, 300.00, '2022-04-04'),
    (95, 11, 350.00, '2022-04-05'),
    (96, 10, 400.00, '2022-04-06'),
    (97, 9, 450.00, '2022-04-07'),
    (98, 8, 500.00, '2022-04-08'),
    (99, 7, 550.00, '2022-04-09'),
    (100, 6, 300.00, '2022-04-10'),
    (101, 5, 350.00, '2022-04-11'),
    (102, 4, 400.00, '2022-04-12'),
    (103, 3, 450.00, '2022-04-13'),
    (104, 2, 500.00, '2022-04-14'),
    (105, 1, 550.00, '2022-04-15'),
    (106, 15, 300.00, '2022-04-16'),
    (107, 14, 350.00, '2022-04-17'),
    (108, 13, 400.00, '2022-04-18'),
    (109, 12, 450.00, '2022-04-19'),
    (110, 11, 500.00, '2022-04-20'),
    (111, 10, 550.00, '2022-04-21'),
    (112, 9, 300.00, '2022-04-22'),
    (113, 8, 350.00, '2022-04-23'),
    (114, 7, 400.00, '2022-04-24'),
    (115, 6, 450.00, '2022-04-25'),
    (116, 5, 500.00, '2022-04-26'),
    (117, 4, 550.00, '2022-04-27'),
    (118, 3, 300.00, '2022-04-28'),
    (119, 2, 350.00, '2022-04-29'),
    (120, 1, 400.00, '2022-04-30'),
    (121, 15, 450.00, '2022-05-01'),
    (122, 14, 500.00, '2022-05-02'),
    (123, 13, 550.00, '2022-05-03'),
    (124, 12, 300.00, '2022-05-04'),
    (125, 11, 350.00, '2022-05-05'),
    (126, 10, 400.00, '2022-05-06'),
    (127, 9, 450.00, '2022-05-07'),
    (128, 8, 500.00, '2022-05-08'),
    (129, 7, 550.00, '2022-05-09'),
    (130, 6, 300.00, '2022-05-10'),
    (131, 5, 350.00, '2022-05-11'),
    (132, 4, 400.00, '2022-05-12'),
    (133, 3, 450.00, '2022-05-13'),
    (134, 2, 500.00, '2022-05-14'),
    (135, 1, 550.00, '2022-05-15'),
    (136, 15, 300.00, '2022-06-01'),
    (137, 14, 350.00, '2022-06-02'),
    (138, 13, 400.00, '2022-06-03'),
    (139, 12, 450.00, '2022-06-04'),
    (140, 11, 500.00, '2022-06-05'),
    (141, 10, 550.00, '2022-06-06'),
    (142, 9, 300.00, '2022-06-07'),
    (143, 8, 350.00, '2022-06-08'),
    (144, 7, 400.00, '2022-06-09'),
    (145, 6, 450.00, '2022-06-10'),
    (146, 5, 500.00, '2022-06-11'),
    (147, 4, 550.00, '2022-06-12'),
    (148, 3, 300.00, '2022-06-13'),
    (149, 2, 350.00, '2022-06-14'),
    (150, 1, 400.00, '2022-06-15'),
    (151, 15, 450.00, '2022-07-01'),
    (152, 14, 500.00, '2022-07-02'),
    (153, 13, 550.00, '2022-07-03'),
    (154, 12, 300.00, '2022-07-04'),
    (155, 11, 350.00, '2022-07-05'),
    (156, 10, 400.00, '2022-07-06'),
    (157, 9, 450.00, '2022-07-07'),
    (158, 8, 500.00, '2022-07-08'),
    (159, 7, 550.00, '2022-07-09'),
    (160, 6, 300.00, '2022-07-10'),
    (161, 5, 350.00, '2022-07-11'),
    (162, 4, 400.00, '2022-07-12'),
    (163, 3, 450.00, '2022-07-13'),
    (164, 2, 500.00, '2022-07-14'),
    (165, 1, 550.00, '2022-07-15')";

checkInsert($conn, $saleQuery, "Sale");
    
// insert notification data

// Close the connection
$conn->close();
