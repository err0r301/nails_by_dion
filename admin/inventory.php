<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <script src="../scripts/popup.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">
    
</head>

<body>
    <div class="grid-container">
        <?php
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';

            error_reporting(E_ALL);  
            ini_set('display_errors', 1); 

            if (require '../scripts/inventory_scripts/add_inventory_item.php') {
                echo "<script>console.log('Successfully added inventory item!')</script>";
            }
            //require '../scripts/inventory_scripts/edit_inventory_item.php';
            //require '../scripts/inventory_scripts/delete_inventory_item.php';
        ?>

        <!--popups-->
        <!--add popup-->
        
        <div class="popup" id="popup-add-product">
            <div class="overlay" onclick="togglePopup('popup-add-product')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-add-product')">
                    &times;</div>
                <h2>Add Product</h2>
                <form id="add-product-form" action="" method="post">
                    <div class="form-group">
                        
                        <input type="text" id="product-name" name="product-name" placeholder="Product name" required>
                    </div>
                    <div class="form-group">
                       
                        <input type="number" id="product-stock" name="product-stock" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="number" id="product-price" name="product-price" placeholder="Price (ZAR)" required>
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>

        <!--edit popup-->
        <div class="popup" id="popup-edit-product">
            <div class="overlay" onclick="togglePopup('popup-edit-product')"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopup('popup-edit-product')">
                    &times;</div>
                <h2>Edit Product</h2>
                <form action="" method="post">
                    <div class="form-group">
                        
                        <input type="text" id="edit-product-name" placeholder="Product name" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="number" id="edit-product-stock" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="number" id="edit-product-price" placeholder="Price (ZAR)" required>
                    </div>
                    <button type="button" id="save-edit-btn">Save</button>
                </form>
            </div>
        </div>

        <!-- Main -->
        <main class="main-container">
            <div class="top">
                <h1 class="main-title font-weight-bold">INVENTORY</h1>
                <button class="app-content-headerButton" onclick="togglePopup('popup-add-product')">Add
                    Product</button>
            </div>

            <div class="app-content-actions">
                <div class="app-content-search">
                    <i class="fa fa-search"></i>
                    <input class="search-bar" placeholder="Search..." type="search">
                </div>
            </div>

            <div class="table-container">
                <table class="table" id="product_table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0,'product_table','product_arrow_1')">#<i class="arrow"
                                    id="product_arrow_1"></i></th>
                            <th onclick="sortTable(1,'product_table','product_arrow_2')">Item<i class="arrow"
                                    id="product_arrow_2"></i></th>
                            <th onclick="sortTable(2,'product_table','product_arrow_3')">Stock<i class="arrow"
                                    id="product_arrow_3"></i></th>
                            <th onclick="sortTable(3,'product_table','product_arrow_4')">Price<i class="arrow"
                                    id="product_arrow_4"></i></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../scripts/inventory_scripts/get_inventory_items.php';
                        $inventories = getInventoryItems();
  
                        if ($inventories) {  
                            while ($row = $inventories->fetch_assoc()) {  
                                echo "
                                    <tr>
                                        <td>$row[inventoryID]</td>
                                        <td>$row[name]</td>
                                        <td>$row[stock]</td>
                                        <td>$row[price]</td>
                                        <td>
                                            <button class='crud-btn p-btn-edit' onclick="."togglePopup('popup-edit-product')"."><i class='fa fa-pen-to-square'></i></button>
                                            <button class='crud-btn p-btn-delete' onclick="."togglePopup('popup-edit-product')"."><i class='fa fa-trash-can'></i></button>
                                        </td>
                                    </tr> 
                                ";
                                 
                            }  
                        } else {  
                            echo "Query failed: " . $mysqli->error;  
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
