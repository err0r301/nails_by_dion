<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
</head>

<body>
    <div class="grid-container">
        <?php
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            if (require '../scripts/service_scripts/add_service.php') {
                echo "<script>console.log('added')</script>";
            }
        ?>

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
                        <select name="category" class="form-selector" id="ass-category">
                            <option value="Manicure">Manicure</option>
                            <option value="Pedicure">Pedicure</option>
                            <option value="Beauty Treatment">Beauty Treatment</option>
                            <option value="Hair beauty">Hair Beauty </option>
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
                        <textarea name="description" id="description-box" maxlength="150" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="upload-image" for="service-image">Upload Image</label>
                        <input type="file" name="image" id="service-image" accept="image/JPEG, image/PNG, image/JPG" required>
                    </div>
                    <button type="submit" name="add" value="Add">Add</button>
                    <button type="reset">Reset</button>
                </form>
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
                </div>
                <?php 
                    include '../scripts/service_scripts/get_services.php';
                    $services = getServices();

                    if ($services) {  
                        while ($row = $services->fetch_assoc()) {  
                            $duration = $row['duration'];
                            echo "  <div class='service-row'>";
                            echo "      <div class='service-cell image'>";
                            echo "          <img src='$row[image]' alt='Service' class='service-img'>";
                            echo "          <span>$row[name]</span>";
                            echo "      </div>";
                            echo "      <div class='service-cell category'><span class='cell-label'>Category:</span>$row[category]</div>";
                            echo "      <div class='service-cell status-cell'> <span class='cell-label'>Status:</span>";
                            if ($row['status'] == "Active") {
                                echo "          <span class='status active'>Active</span>";
                            }else{
                                echo "          <span class='status disabled'>Disabled</span>";
                            }
                            echo "      </div>";
                            echo "      <div class='service-cell price'><span class='cell-label'>Price:</span>R$row[price]</div>";
                            echo "      <div class='service-cell duration'><span class='cell-label'>Duration:</span> $duration</div>";
                            echo "  </div>";
                        }
                    }

                    
                    /*foreach ($services as $service): ?>

                        <div class='service-row'>
                            <div class='service-cell image'>
                                <img src='../_images/<?= $service['image'] ?>' alt='Service' class='service-img'>
                                <span><?= $service['name']?></span>
                            </div>
                            <div class='service-cell category'><span class='cell-label'>Category:</span><?=$service['category']?></div>
                            <div class='service-cell status-cell'>
                                <span class='cell-label'>Status:</span>
                                <?php
                                if ($service['status'] == "Active") {
                                    echo "<span class='status active'>Active</span>";
                                }else{
                                    echo "<span class='status disabled'>Disabled</span>";
                                }
                                ?>
                            </div>
                            <div class='service-cell price'><span class='cell-label'>Price:</span>R<?=$service['price']?></div>
                        </div>
                    
                <?php endforeach;*/ ?>
            </div>
        </main>
    </div>
</body>

</html>
