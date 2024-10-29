<?php
function getGalleryRecords() {
    // Include the config file
    require '../data/config.php';

    // get the gallery data from the database
    $query = "SELECT * FROM gallery";
    $gallery_result = $conn->query($query);

    // Check if the data was retrieved successfully
    if ($gallery_result->num_rows <= 0) {
        echo "<script> console.log('No gallery records found')</script>";                                 
    }
    // Close the connection
    $conn->close();
    return $gallery_result;
}