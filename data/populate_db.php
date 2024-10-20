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
                (1,1, '../_images/profile-1.png', 'super-admin', 'Manager'),
                (2,2, '../_images/profile-2.png', 'admin', 'hair stylist'),
                (3,3, '../_images/profile-3.png', 'admin', 'nail stylist'),
                (4,4, '../_images/profile-4.png', 'admin', 'hair stylist'),
                (5,5, '../_images/profile-5.png', 'admin', 'nail stylist')";

checkInsert($conn, $adminQuery, "Admin");

// insert service data
/*$serviceQuery = "INSERT INTO service (serviceID, name, category, status, price, duration, description, image) 
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
*/

$serviceQuery = "INSERT INTO service (serviceID, category, status, price, duration, description, image, monthlyRevenue) 
                VALUES 
                ('Classic Manicure', 'Manicure', 'Disabled', 250, '00:30:00', 'A classic manicure treatment to keep your nails looking and feeling great', '../_images/1.jpg', 8000),
                ('Gel Manicure', 'Manicure', 'Disabled', 350, '00:45:00', 'A gel manicure treatment to keep your nails looking and feeling great', '../_images/2.jpg', 9000),
                ('French Manicure', 'Manicure', 'Active', 300, '00:45:00', 'A French manicure treatment to keep your nails looking and feeling great', '../_images/3.jpg', 10000),
                ('Classic Pedicure', 'Pedicure', 'Disabled', 300, '00:45:00', 'A classic pedicure treatment to keep your feet looking and feeling great', '../_images/4.png', 11000),
                ('Gel Pedicure', 'Pedicure', 'Active', 400, '01:00:00', 'A gel pedicure treatment to keep your feet looking and feeling great', '../_images/5.png', 12000),
                ('Paraffin Treatment', 'Pedicure', 'Active', 150, '00:30:00', 'A paraffin treatment to keep your feet looking and feeling great', '../_images/6.png', 13000),
                ('Facial', 'Beauty Treatment', 'Disabled', 500, '01:30:00', 'A facial treatment to keep your skin looking and feeling great', '../_images/7.png', 14000),
                ('Microdermabrasion', 'Beauty Treatment', 'Active', 750, '01:45:00', 'A microdermabrasion treatment to keep your skin looking and feeling great', '../_images/8.png', 15000),
                ('Chemical Peel', 'Beauty Treatment', 'Active', 800, '02:00:00', 'A chemical peel treatment to keep your skin looking and feeling great', '../_images/9.png', 16000),
                ('Haircut', 'Hair Beauty', 'Disabled', 400, '00:45:00', 'A haircut treatment to keep your hair looking and feeling great', '../_images/10.jpg', 17000),
                ('Hair Color', 'Hair Beauty', 'Active', 600, '02:00:00', 'A hair color treatment to keep your hair looking and feeling great', '../_images/11.jpg', 18000),
                ('Highlights', 'Hair Beauty', 'Active', 800, '02:30:00', 'A highlights treatment to keep your hair looking and feeling great', '../_images/12.jpg', 19000),
                ('Blowout', 'Hair Beauty', 'Active', 350, '00:45:00', 'A blowout treatment to keep your hair looking and feeling great', '../_images/13.png', 20000),
                ('Hair Extensions', 'Hair Beauty', 'Active', 700, '03:00:00', 'A hair extensions treatment to keep your hair looking and feeling great', '../_images/14.png', 21000),
                ('Keratin Treatment', 'Hair Beauty', 'Disabled', 850, '03:30:00', 'A keratin treatment to keep your hair looking and feeling great', '../_images/15.png', 30000)";

checkInsert($conn, $serviceQuery, "Service");

// insert appointment data
/*$appointmentQuery = "INSERT INTO appointment (appointmentID, userID, stylist, dateBooked, dateScheduled, status, serviceID) 
                VALUES  
                (1, 6, 'Dion','2022-01-01 10:32:00','2022-01-03 07:00:00', 'Pending', 1),
                (2, 7, 'Jane','2022-01-01 12:53:00','2022-01-03 08:00:00', 'Complete', 2),
                (3, 8, 'John','2022-01-02 11:25:00','2022-01-03 10:00:00', 'Pending', 3),
                (4, 9, 'Jenny','2022-01-02 11:53:00','2022-01-03 12:00:00', 'Pending', 4),
                (5, 10, 'James','2022-01-02 14:13:00','2022-01-03 14:00:00', 'Cancelled', 5),
                (6, 11, 'Dion','2022-01-03 16:34:00','2022-01-04 08:00:00', 'Pending', 6),
                (7, 12, 'Jane','2022-01-03 15:15:00','2022-01-04 10:00:00', 'Complete', 7),
                (8, 13, 'John','2022-01-03 12:42:00','2022-01-04 11:00:00', 'Pending', 8),
                (9, 14, 'Jenny','2022-01-03 13:35:00','2022-01-04 13:00:00', 'Cancelled', 9),
                (10, 6, 'James','2022-01-03 16:59:00','2022-01-04 15:00:00', 'Pending', 10),
                (11, 7, 'Dion','2022-01-04 17:24:00','2022-01-05 09:00:00', 'Complete', 11),
                (12, 8, 'Jane','2022-01-04 11:52:00','2022-01-05 11:00:00', 'Complete', 12),
                (13, 9, 'John','2022-01-04 18:13:00','2022-01-05 13:00:00', 'Complete', 13),
                (14, 10, 'Jenny','2022-01-03 19:02:00','2022-01-05 15:00:00', 'Complete', 14),
                (15, 11, 'James','2022-01-01 14:41:00','2022-01-05 17:00:00', 'Complete', 15),
                (16, 12, 'Dion','2022-01-03 11:52:00','2022-01-06 08:00:00', 'Pending', 1),
                (17, 13, 'Jane','2022-01-01 14:31:00','2022-01-06 10:00:00', 'Pending', 2),
                (18, 14, 'John','2022-01-04 12:14:00','2022-01-06 15:00:00', 'Pending', 3),
                (19, 6, 'Jenny','2022-01-05 04:35:00','2022-01-07 10:00:00', 'Cancelled', 4),
                (20, 7, 'James','2022-01-06 08:24:00','2022-01-07 13:00:00', 'Complete', 5)";*/

$appointmentQuery = "INSERT INTO appointment (appointmentID, userID, stylist, dateBooked, scheduledDateTime, status_, serviceID, sessions) 
                    VALUES  
                    (1, 6, 'Dion','2024-10-01 10:32:00','2024-10-03 07:00:00', 'Pending', 'Classic Manicure', 1),
                    (2, 7, 'Jane','2024-10-01 12:53:00','2024-10-03 08:00:00', 'Complete', 'Gel Manicure', 1),
                    (3, 8, 'John','2024-10-02 11:25:00','2024-10-03 10:00:00', 'Pending', 'French Manicure', 1),
                    (4, 9, 'Jenny','2024-10-02 11:53:00','2024-10-03 12:00:00', 'Pending', 'Classic Pedicure', 1),
                    (5, 10, 'James','2024-10-02 14:13:00','2024-10-03 14:00:00', 'Cancelled', 'Gel Pedicure', 1),
                    (6, 11, 'Dion','2024-10-03 16:34:00','2024-10-04 08:00:00', 'Pending', 'Paraffin Treatment', 2),
                    (7, 12, 'Jane','2024-10-03 15:15:00','2024-10-04 10:00:00', 'Complete', 'Facial', 2),
                    (8, 13, 'John','2024-10-03 12:42:00','2024-10-04 11:00:00', 'Pending', 'Microdermabrasion', 2),
                    (9, 14, 'Jenny','2024-10-03 13:35:00','2024-10-04 13:00:00', 'Cancelled', 'Chemical Peel', 2),
                    (10, 6, 'James','2024-10-03 16:59:00','2024-10-04 15:00:00', 'Pending', 'Haircut', 2),
                    (11, 7, 'Dion','2024-10-04 17:24:00','2024-10-05 09:00:00', 'Complete', 'Hair Color', 3),
                    (12, 8, 'Jane','2024-10-04 11:52:00','2024-10-05 11:00:00', 'Complete', 'Highlights', 3),
                    (13, 9, 'John','2024-10-04 18:13:00','2024-10-05 13:00:00', 'Complete', 'Blowout', 3),
                    (14, 10, 'Jenny','2024-10-03 19:02:00','2024-10-05 15:00:00', 'Complete', 'Hair Extensions', 3),
                    (15, 11, 'James','2024-10-01 14:41:00','2024-10-05 17:00:00', 'Complete', 'Keratin Treatment', 3),
                    (16, 12, 'Dion','2024-10-03 11:52:00','2024-10-06 08:00:00', 'Pending', 'Classic Manicure', 1),
                    (17, 13, 'Jane','2024-10-01 14:31:00','2024-10-06 10:00:00', 'Pending', 'Gel Manicure', 1),
                    (18, 14, 'John','2024-10-04 12:14:00','2024-10-06 15:00:00', 'Pending', 'French Manicure', 1),
                    (19, 6, 'Jenny','2024-10-05 04:35:00','2024-10-07 10:00:00', 'Cancelled', 'Classic Pedicure', 1),
                    (20, 7, 'James','2024-10-06 08:24:00','2024-10-07 13:00:00', 'Complete', 'Gel Pedicure', 1)";


checkInsert($conn, $appointmentQuery, "Appointment");


// insert gallery data
/*$galleryQuery = "INSERT INTO gallery (galleryID, image, date) 
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

checkInsert($conn, $galleryQuery, "Gallery");*/

// insert inventory data
$inventoryQuery = "INSERT INTO inventory (inventoryID, name, price,stock)
VALUES
    (1, 'Shampoo', 250.00,13),
    (2, 'Conditioner', 250.00,7),
    (3, 'Hair Serum', 350.00,12),
    (4, 'Leave-in Conditioner', 320.00,11),
    (5, 'Face Mask', 400.00,34)";

checkInsert($conn, $inventoryQuery, "Inventory");


// insert auto_notification templates
$notificationQuery = "INSERT INTO auto_notification (autoNotificationID, message)  
VALUES  
    ('Appointment Confirmation', 'Dear [name], your appointment for [service] on [date] at [time] has been confirmed. We look forward to seeing you!'),  
    ('Appointment Reminder', 'Hi [name], this is a friendly reminder of your upcoming appointment for [service] on [date] at [time]. See you soon!'),  
    ('Appointment Cancellation', 'Hi [name], your appointment for [service] on [date] at [time] has been successfully canceled.'),  
    ('Appointment Reschedule Confirmation', 'Dear [name], your appointment for [service] has been rescheduled to [date] at [time].'),  
    ('Appointment Completed', 'Hi [name], we hope you enjoyed your service! If you loved it, feel free to leave us a review or book your next appointment.'),  
    ('Service Review Request', 'Dear [name], thank you for choosing us for your [service]. We\'d love to hear your feedback! Please leave a review here: [link].'),  
    ('New Offers & Promotions', 'Hi [name], we\'re offering an exclusive [discount/promotion] on [services] this month! Book now and enjoy your special treatment.'),  
    ('Birthday Discount/Offer', 'Happy Birthday, [name]! As a special treat, we\'re offering you a [discount] on your next service. Book before [date] to redeem!'),  
    ('Payment Receipt', 'Hi [name], thank you for your payment of [amount] for [service]. Your appointment is confirmed for [date] at [time].'),  
    ('Missed Appointment', 'Hi [name], we noticed you missed your appointment for [service] on [date]. Please let us know if you\'d like to reschedule.'),  
    ('Account Registration Confirmation', 'Welcome, [name]! Your account has been successfully created. We\'re excited to have you with us!'),  
    ('Password Reset', 'Hi [name], we received a request to reset your password. Click here to set a new one: [link]. If you didn\'t request this, please ignore this message.'),  
    ('New Appointment Booked', 'New appointment booked! Client: [name]. Service: [service]. Date: [date], Time: [time].'),  
    ('Appointment Canceled', '[name] has canceled their appointment for [service] on [date].'),  
    ('Appointment Rescheduled', '[name] has rescheduled their appointment for [service]. New date: [new date], New time: [new time].'),  
    ('Daily Appointment Summary', 'Daily appointment summary: You have [X] appointments booked for today.'),  
    ('Low Product Inventory', 'Inventory Alert: The stock of [product] is low. Please restock to ensure availability for upcoming services.'),  
    ('Staff Assignment for New Appointment', 'Staff Alert: [name] has been assigned to [client\'s] appointment for [service] on [date] at [time].'),  
    ('Stylist Missed Appointment', 'Appointment missed: [name] did not show up for their [service] appointment on [date]. Consider following up to reschedule.'),  
    ('Payment Received', 'Payment of [amount] has been received from [name] for their [service] on [date].'),  
    ('System Error/Failure Notification', 'Error Alert: The system encountered an issue with [specific feature]. Immediate attention required to prevent downtime.')";  

checkInsert($conn, $notificationQuery, "Auto Notification");

/* insert cart data
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

checkInsert($conn, $cartQuery, "Cart"); */
/*
// insert sales data
$saleQuery = "INSERT INTO sale (saleID, serviceID, price, date)
VALUES
    (1, 'Classic Manicure', 200.00, '2022-01-01'),
    (2, 'Gel Manicure', 250.00, '2022-01-02'),
    (3, 'French Manicure', 300.00, '2022-01-03'),
    (4, 'Classic Pedicure', 350.00, '2022-01-04'),
    (5, 'Gel Pedicure', 400.00, '2022-01-05'),
    (6, 'Paraffin Treatment', 450.00, '2022-01-06'),
    (7, 'Facial', 500.00, '2022-01-07'),
    (8, 'Microdermabrasion', 550.00, '2022-01-08'),
    (9, 'Chemical Peel', 300.00, '2022-01-09'),
    (10, 'Haircut', 350.00, '2022-01-10'),
    (11, 'Hair Color', 400.00, '2022-01-11'),
    (12, 'Highlights', 450.00, '2022-01-12'),
    (13, 'Blowout', 500.00, '2022-01-13'),
    (14, 'Hair Extensions', 550.00, '2022-01-14'),
    (15, 'Keratin Treatment', 300.00, '2022-01-15'),
    (16, 'Classic Manicure', 350.00, '2022-01-16'),
    (17, 'Gel Manicure', 400.00, '2022-01-17'),
    (18, 'French Manicure', 450.00, '2022-01-18'),
    (19, 'Classic Pedicure', 500.00, '2022-01-19'),
    (20, 'Gel Pedicure', 550.00, '2022-01-20'),
    (21, 'Paraffin Treatment', 300.00, '2022-01-21'),
    (22, 'Facial', 350.00, '2022-01-22'),
    (23, 'Microdermabrasion', 400.00, '2022-01-23'),
    (24, 'Chemical Peel', 450.00, '2022-01-24'),
    (25, 'Haircut', 500.00, '2022-01-25'),
    (26, 'Hair Color', 550.00, '2022-01-26'),
    (27, 'Highlights', 300.00, '2022-01-27'),
    (28, 'Blowout', 350.00, '2022-01-28'),
    (29, 'Hair Extensions', 400.00, '2022-01-29'),
    (30, 'Keratin Treatment', 450.00, '2022-01-30'),
    (31, 'Classic Manicure', 500.00, '2022-01-31'),
    (32, 'Gel Manicure', 550.00, '2022-02-01'),
    (33, 'French Manicure', 300.00, '2022-02-02'),
    (34, 'Classic Pedicure', 350.00, '2022-02-03'),
    (35, 'Gel Pedicure', 400.00, '2022-02-04'),
    (36, 'Paraffin Treatment', 450.00, '2022-02-05'),
    (37, 'Facial', 500.00, '2022-02-06'),
    (38, 'Microdermabrasion', 550.00, '2022-02-07'),
    (39, 'Chemical Peel', 300.00, '2022-02-08'),
    (40, 'Haircut', 350.00, '2022-02-09'),
    (41, 'Hair Color', 400.00, '2022-02-10'),
    (42, 'Highlights', 450.00, '2022-02-11'),
    (43, 'Blowout', 500.00, '2022-02-12'),
    (44, 'Hair Extensions', 550.00, '2022-02-13'),
    (45, 'Keratin Treatment', 300.00, '2022-02-14'),
    (46, 'Classic Manicure', 350.00, '2022-02-15'),
    (47, 'Gel Manicure', 400.00, '2022-02-16'),
    (48, 'French Manicure', 450.00, '2022-02-17'),
    (49, 'Classic Pedicure', 500.00, '2022-02-18'),
    (50, 'Gel Pedicure', 550.00, '2022-02-19'),
    (51, 'Paraffin Treatment', 300.00, '2022-02-20'),
    (52, 'Facial', 350.00, '2022-02-21'),
    (53, 'Microdermabrasion', 400.00, '2022-02-22'),
    (54, 'Chemical Peel', 450.00, '2022-02-23'),
    (55, 'Haircut', 500.00, '2022-02-24'),
    (56, 'Hair Color', 550.00, '2022-02-25'),
    (57, 'Highlights', 300.00, '2022-02-26'),
    (58, 'Blowout', 350.00, '2022-02-27'),
    (59, 'Hair Extensions', 400.00, '2022-02-28'),
    (60, 'Keratin Treatment', 450.00, '2022-03-01'),
    (61, 'Classic Manicure', 500.00, '2022-03-02'),
    (62, 'Gel Manicure', 550.00, '2022-03-03'),
    (63, 'French Manicure', 300.00, '2022-03-04'),
    (64, 'Classic Pedicure', 350.00, '2022-03-05'),
    (65, 'Gel Pedicure', 400.00, '2022-03-06'),
    (66, 'Paraffin Treatment', 450.00, '2022-03-07'),
    (67, 'Facial', 500.00, '2022-03-08'),
    (68, 'Microdermabrasion', 550.00, '2022-03-09'),
    (69, 'Chemical Peel', 300.00, '2022-03-10'),
    (70, 'Haircut', 350.00, '2022-03-11'),
    (71, 'Hair Color', 400.00, '2022-03-12'),
    (72, 'Highlights', 450.00, '2022-03-13'),
    (73, 'Blowout', 500.00, '2022-03-14'),
    (74, 'Hair Extensions', 550.00, '2022-03-15'),
    (75, 'Keratin Treatment', 300.00, '2022-03-16'),
    (76, 'Classic Manicure', 350.00, '2022-03-17'),
    (77, 'Gel Manicure', 400.00, '2022-03-18'),
    (78, 'French Manicure', 450.00, '2022-03-19'),
    (79, 'Classic Pedicure', 500.00, '2022-03-20'),
    (80, 'Gel Pedicure', 550.00, '2022-03-21'),
    (81, 'Paraffin Treatment', 300.00, '2022-03-22'),
    (82, 'Facial', 350.00, '2022-03-23'),
    (83, 'Microdermabrasion', 400.00, '2022-03-24'),
    (84, 'Chemical Peel', 450.00, '2022-03-25'),
    (85, 'Haircut', 500.00, '2022-03-26'),
    (86, 'Hair Color', 550.00, '2022-03-27'),
    (87, 'Highlights', 300.00, '2022-03-28'),
    (88, 'Blowout', 350.00, '2022-03-29'),
    (89, 'Classic Manicure', 300.00, '2022-03-30'),
    (90, 'Gel Manicure', 350.00, '2022-03-31'),
    (91, 'French Manicure', 400.00, '2022-04-01'),
    (92, 'Classic Pedicure', 450.00, '2022-04-02'),
    (93, 'Gel Pedicure', 500.00, '2022-04-03'),
    (94, 'Paraffin Treatment', 550.00, '2022-04-04'),
    (95, 'Facial', 300.00, '2022-04-05'),
    (96, 'Microdermabrasion', 350.00, '2022-04-06'),
    (97, 'Chemical Peel', 400.00, '2022-04-07'),
    (98, 'Haircut', 450.00, '2022-04-08'),
    (99, 'Hair Color', 500.00, '2022-04-09'),
    (100, 'Highlights', 550.00, '2022-04-10'),
    (101, 'Blowout', 300.00, '2022-04-11'),
    (102, 'Hair Extensions', 350.00, '2022-04-12'),
    (103, 'Keratin Treatment', 400.00, '2022-04-13'),
    (104, 'Classic Manicure', 450.00, '2022-04-14'),
    (105, 'Gel Manicure', 500.00, '2022-04-15'),
    (106, 'French Manicure', 550.00, '2022-04-16'),
    (107, 'Classic Pedicure', 300.00, '2022-04-17'),
    (108, 'Gel Pedicure', 350.00, '2022-04-18'),
    (109, 'Paraffin Treatment', 400.00, '2022-04-19'),
    (110, 'Facial', 450.00, '2022-04-20'),
    (111, 'Microdermabrasion', 500.00, '2022-04-21'),
    (112, 'Chemical Peel', 550.00, '2022-04-22'),
    (113, 'Haircut', 300.00, '2022-04-23'),
    (114, 'Hair Color', 350.00, '2022-04-24'),
    (115, 'Highlights', 400.00, '2022-04-25'),
    (116, 'Blowout', 450.00, '2022-04-26'),
    (117, 'Hair Extensions', 500.00, '2022-04-27'),
    (118, 'Keratin Treatment', 550.00, '2022-04-28'),
    (119, 'Classic Manicure', 300.00, '2022-04-29'),
    (120, 'Gel Manicure', 350.00, '2022-04-30'),
    (121, 'French Manicure', 400.00, '2022-05-01'),
    (122, 'Classic Pedicure', 450.00, '2022-05-02'),
    (123, 'Gel Pedicure', 500.00, '2022-05-03'),
    (124, 'Paraffin Treatment', 550.00, '2022-05-04'),
    (125, 'Facial', 300.00, '2022-05-05'),
    (126, 'Microdermabrasion', 350.00, '2022-05-06'),
    (127, 'Chemical Peel', 400.00, '2022-05-07'),
    (128, 'Haircut', 450.00, '2022-05-08'),
    (129, 'Hair Color', 500.00, '2022-05-09'),
    (130, 'Highlights', 550.00, '2022-05-10'),
    (131, 'Blowout', 300.00, '2022-05-11'),
    (132, 'Hair Extensions', 350.00, '2022-05-12'),
    (133, 'Keratin Treatment', 400.00, '2022-05-13'),
    (134, 'Classic Manicure', 450.00, '2022-05-14'),
    (135, 'Gel Manicure', 500.00, '2022-05-15'),
    (136, 'French Manicure', 550.00, '2022-05-16'),
    (137, 'Classic Pedicure', 300.00, '2022-05-17'),
    (138, 'Gel Pedicure', 350.00, '2022-05-18'),
    (139, 'Paraffin Treatment', 400.00, '2022-05-19'),
    (140, 'Facial', 450.00, '2022-05-20'),
    (141, 'Microdermabrasion', 500.00, '2022-05-21'),
    (142, 'Chemical Peel', 550.00, '2022-05-22'),
    (143, 'Haircut', 300.00, '2022-05-23'),
    (144, 'Hair Color', 350.00, '2022-05-24'),
    (145, 'Highlights', 400.00, '2022-05-25'),
    (146, 'Blowout', 450.00, '2022-05-26'),
    (147, 'Hair Extensions', 500.00, '2022-05-27'),
    (148, 'Keratin Treatment', 550.00, '2022-05-28'),
    (149, 'Classic Manicure', 300.00, '2022-05-29'),
    (150, 'Gel Manicure', 350.00, '2022-05-30'),
    (151, 'French Manicure', 400.00, '2022-06-01'),
    (152, 'Classic Pedicure', 450.00, '2022-06-02'),
    (153, 'Gel Pedicure', 500.00, '2022-06-03'),
    (154, 'Paraffin Treatment', 550.00, '2022-06-04'),
    (155, 'Facial', 300.00, '2022-06-05'),
    (156, 'Microdermabrasion', 350.00, '2022-06-06'),
    (157, 'Chemical Peel', 400.00, '2022-06-07'),
    (158, 'Haircut', 450.00, '2022-06-08'),
    (159, 'Hair Color', 500.00, '2022-06-09'),
    (160, 'Highlights', 550.00, '2022-06-10'),
    (161, 'Blowout', 300.00, '2022-06-11'),
    (162, 'Hair Extensions', 350.00, '2022-06-12'),
    (163, 'Keratin Treatment', 400.00, '2022-06-13'),
    (164, 'Classic Manicure', 450.00, '2022-06-14'),
    (165, 'Gel Manicure', 500.00, '2022-06-15')";

checkInsert($conn, $saleQuery, "Sale");
  */  
// insert notification data
$notificationsQuery = "INSERT INTO notification (dateTime_, message, status_, userID) 
VALUES   
    ('2024-08-01 10:00:00', 'Appointment confirmed for user 1', 'Read', 1),    
    ('2024-08-02 10:00:00', 'New stylist joined our salon', 'Unread', 1),  
    ('2024-08-05 14:15:00', 'Appointment reminder for user 2', 'Read', 2),  
    ('2024-08-10 09:30:00', 'New message from stylist', 'Read', 3), 
    ('2024-08-12 15:15:00', 'Your stylist has a new schedule', 'Unread', 2),   
    ('2024-08-15 12:00:00', 'Cancellation notice for user 4', 'Read', 4),  
    ('2024-08-20 11:45:00', 'Feedback received from user 5', 'Read', 5), 
    ('2024-08-22 09:30:00', 'Check out our new services', 'Unread', 3),   
    ('2024-08-25 08:30:00', 'Special discount available for user 1', 'Read', 1),  
    ('2024-08-30 17:00:00', 'New service announcement for user 2', 'Read', 2),  
    ('2024-09-01 09:00:00', 'Your last appointment was rated', 'Read', 3),  
    ('2024-09-03 12:00:00', 'Your appointment has been rescheduled', 'Unread', 4),
    ('2024-09-05 13:30:00', 'New product launch on September 10', 'Read', 4),  
    ('2024-09-10 15:00:00', 'Update on your appointment request', 'Read', 5),  
    ('2024-09-12 11:20:00', 'Payment confirmation for user 1', 'Read', 1),  
    ('2024-09-15 14:50:00', 'Limited time offer for user 2', 'Read', 2), 
    ('2024-09-18 08:00:00', 'We miss you! Schedule your next visit.', 'Unread', 5),  
    ('2024-09-20 10:10:00', 'Your review is now live!', 'Read', 3),  
    ('2024-09-22 10:20:00', 'Appointment feedback request', 'Read', 4),  
    ('2024-09-25 09:15:00', 'Promo code available for user 5', 'Read', 5)";  
  
checkInsert($conn, $notificationsQuery, "Notification");

// Close the connection
$conn->close();
