<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <script src="../scripts/popup.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>

<body>
    <div class="grid-container">
        <?php
            $page = 'admin_service';
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            require '../scripts/service_scripts/edit_service.php';
            require '../scripts/service_scripts/remove_service.php';
            require '../scripts/service_scripts/add_service.php';
            require '../scripts/service_scripts/get_services.php';
            $services = getServices();
              
        ?>

      <!-- popups-->
        <div class="popup" id="popup-add-service">
            <div class="overlay" onclick="togglePopup_add('popup-add-service')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup_add('popup-add-service')">&times;</div>
                <h2>Add Service</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-selector" id="add-category">
                            <option value="Manicure">Manicure</option>
                            <option value="Pedicure">Pedicure</option>
                            <option value="Beauty Treatment">Beauty Treatment</option>
                            <option value="Hair Beauty">Hair Beauty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" class="form-selector" id="add-status">
                            <option value="Active">Active</option>
                            <option value="Disabled">Disabled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="time" name="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="add-service-description" class="description-box" maxlength="150" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="upload-image" for="service-image">Upload Image</label>
                        <input type="file" name="image" class="upload_img" id="service-image" accept="image/JPEG, image/PNG, image/JPG" required>
                    </div>
                    <button type="submit" name="add" value="Add">Add</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup-edit-service">
            <div class="overlay" onclick="togglePopup('popup-edit-service')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-edit-service')">&times;</div>
                <h2>Edit Service</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit-service-id" id="edit-service-id"> 
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="edit-service-name" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-selector" id="edit-service-category">
                            <option value="Manicure">Manicure</option>
                            <option value="Pedicure">Pedicure</option>
                            <option value="Beauty Treatment">Beauty Treatment</option>
                            <option value="Hair Beauty">Hair Beauty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" class="form-selector" id="edit-service-status">
                            <option value="Active">Active</option>
                            <option value="Disabled">Disabled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="edit-service-price" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="time" name="duration" id="edit-service-duration" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="edit-service-description" class="description-box" maxlength="150" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="upload-image" for="edit-service-image">Upload Image</label>
                        <input type="file" name="image" class="upload_img" id="edit-service-image" accept="image/JPEG, image/PNG, image/JPG" required>
                    </div>
                    <button type="submit" name="add" value="Add">Update</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup-delete-service">
            <div class="overlay" onclick="togglePopup('popup-delete-service')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-delete-service')">&times;</div>
                <h2>Delete Service</h2>
                <p>Are you sure you want to delete this service?</p>
                <form action="" method="post">
                    <input type="hidden" name="delete-service-id" id="delete-service-id"> 
                    <button type="submit" id="delete-service-btn" value="Delete">Delete</button>
                    <button type="reset" onclick="togglePopup('popup-delete-service')">Cancel</button>
                </form>
            </div>
        </div>

        <div class="popup" id="popup-show-service">
            <div class="overlay" onclick="togglePopup('popup-show-service')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-show-service')">&times;</div>
                <img src="" alt="Service Image" id="view-service-img" style="width: 300px; margin-top: 40px">
                <h3 id="view-service-name">Service Name</h3>
                <p id="view-service-category">Service category</p>
                <p id="view-service-status">Service status</p>
                <p id="view-service-price">Service price</p>
                <p id="view-service-duration">Service duration</p> 
                
                <strong>Service description</strong>
                <p id="view-service-description" style = "width: 300px; margin:5px 10px">Service description</p>
                <button name="edit" value="Edit" onclick="togglePopup('popup-edit-service'); togglePopup('popup-show-service');">Edit</button>
                <button name="delete" value="Delete" onclick="togglePopup('popup-delete-service'); togglePopup('popup-show-service');">Delete</button>
            
                <!--<div class="rightColumn">
                    <div id="service-days">
                        <div>Mon <input type="checkbox" name="MONDAY" value="Monday" id="prefMon" /></div>
		                <div>Tue <input type="checkbox" name="TUESDAY" value="Tuesday" id="prefTues" /></div>
      	                <div>Wed <input type="checkbox" name="WEDNESDAY" value="Wednesday" id="prefWed" /></div>
		                <div>Thu <input type="checkbox" name="THURSDAY" value="Thursday" id="prefThr" /></div>
 		                <div>Fri <input type="checkbox" name="FRIDAY" value="Friday" id="prefFri" /></div>
                        <div>Sat <input type="checkbox" name="SATURDAY" value="Saturday" id="prefSat" /></div>
                        <div>Sun <input type="checkbox" name="SUNDAY" value="Sunday" id="prefSun" /></div>
                    </div>
                </div>-->
            </div>
        </div>

        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">SERVICES</h1>
                <button class="app-content-headerButton" onclick="togglePopup_add('popup-add-service')">Add Service</button>
            </div>

            <div class="app-content-actions">
                <div class="app-content-search">
                    <i class="fa fa-search"></i>
                    <input class="search-bar" placeholder="Search..." type="search">
                </div>
                
                <div class="app-content-actions-wrapper">
                    
                    <button class="action-button service-list active" title="List View">
                        <i class="fa fa-list-ul"></i>
                    </button>
                    <button class="action-button service-grid" title="Grid View">
                        <i class="fa fa-border-all"></i>
                    </button>
                </div>
            </div>

            <div class="service-area-wrapper tableView">
                
                <div class="service-header">
                    <div class="service-cell image">Service</div>
                    <div class="service-cell category">Category</div>
                    <div class="service-cell status-cell">Status</div>
                    <div class="service-cell price">Price</div>
                    <div class="service-cell duration">Duration</div>
                    <!--<div class="service-cell actions"></div>-->
                </div>
                <?php 
                    if ($services) {  
                        while ($row = $services->fetch_assoc()) {  
                            $duration = $row['duration'];?>
                            <div class='service-row' onclick="viewService('popup-show-service', <?php echo htmlspecialchars(json_encode($row), ENT_QUOTES); ?>); 
                                                              storeID('<?php echo $row['serviceID']; ?>','delete-service-id'); 
                                                              storeID('<?php echo $row['serviceID']; ?>','edit-service-id');">
                                <div class='service-cell image'>
                                    <img src='<?php echo $row['image']?>' alt='Service' class='service-img'>
                                    <span><?php echo $row['serviceID']?></span>
                                </div>
                                <div class='service-cell category'>
                                    <span class='cell-label'>Category:</span>
                                    <?php echo $row['category']?>
                                </div>
                                <div class='service-cell status-cell'> 
                                    <span class='cell-label'>Status:</span>
                                    <?php if ($row['status'] == "Active") {
                                        echo "          <span class='status active'>Active</span>";
                                    }else{
                                        echo "          <span class='status disabled'>Disabled</span>";
                                    }?>
                                </div>
                                <div class='service-cell price'>
                                    <span class='cell-label'>Price:</span>R
                                    <?php echo $row['price']?>
                                </div>
                                <div class='service-cell duration'>
                                    <span class='cell-label'>Duration:</span> 
                                    <?php echo $duration?>
                                </div>
                                <!--<div class='service-cell actions'>
                                    <button class='crud-btn btn-view' onclick="togglePopup('popup-view-service')"><i class='fa fa-eye'></i></button>
                                    <button class='crud-btn btn-edit' onclick="togglePopup('popup-edit-service')"><i class='fa fa-pen-to-square'></i></button>
                                    <button class='crud-btn btn-delete' onclick="togglePopup('popup-delete-service','delete-service-id',<?php echo $row['serviceID']?>)"><i class='fa fa-trash-can'></i></button>
                                </div>-->
                            </div>
                        <?php 
                        }
                    }
                ?>
            </div>
        </main>
    </div>
</body>

<?php 
    if ($add_service_confirmation != null){
        $confirmationID = 'add_service_confirmation';
        if ($add_service_confirmation == true) {
            $confirmationMessage = 'The service was added successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to add the service.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
    
    if ($edit_service_confirmation != null){
        $confirmationID = 'edit_service_confirmation';
        if ($edit_service_confirmation == true) {
            $confirmationMessage = 'The service was updated successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to update the service.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
    
    if ($remove_service_confirmation != null){
        $confirmationID = 'remove_service_confirmation';
        if ($remove_service_confirmation == true) {
            $confirmationMessage = 'The service was deleted successfully!';
            $confirmationImage = '../_images/tick.png';
        } else {
            $confirmationMessage = 'Failed to delete the service.';
            $confirmationImage = '../_images/cross.png';
        }
        require_once '../partial/popup.php';
    }
?>
</html>
