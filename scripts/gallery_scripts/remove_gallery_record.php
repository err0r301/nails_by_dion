<?php
function removeGalleryRecord( $galleryID) {
    // Include the config file
    require '../data/config.php';

    // remove the gallery data from the database
    $query = "DELETE FROM gallery WHERE galleryID = $galleryID";
    $result = $conn->query($query);

    // Check if the data was removed successfully
    if ($result) {
        echo "Gallery record removed successfully.";
    } else {
        echo "Error removing gallery record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}