<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
        ?>

        <!--popups-->
        <!--add popup-->
        <div class="p-popup" id="popup-add-product">
            <div class="p-overlay" onclick="document.getElementById('popup-add-product').style.display='none'"></div>
            <div class="p-content">
                <div class="p-close-btn" onclick="document.getElementById('popup-add-product').style.display='none'">
                    &times;</div>
                <h2>Add Product</h2>
                <form id="add-product-form">
                    <div class="p-form-group">
                        
                        <input type="text" id="product-name" name="name" placeholder="Product name" required>
                    </div>
                    <div class="p-form-group">
                       
                        <input type="number" id="product-stock" name="stock" placeholder="Stock" required>
                    </div>
                    <div class="p-form-group">
                        
                        <input type="number" id="product-price" name="price" placeholder="Price (ZAR)" required>
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>

        <!--edit popup-->
        <div class="p-popup" id="popup-edit-product">
            <div class="p-overlay" onclick="document.getElementById('popup-edit-product').style.display='none'"></div>
            <div class="p-content">
                <div class="p-close-btn" onclick="document.getElementById('popup-edit-product').style.display='none'">
                    &times;</div>
                <h2>Edit Product</h2>
                <form>
                    <div class="p-form-group">
                        
                        <input type="text" id="edit-product-name" placeholder="Product name" required>
                    </div>
                    <div class="p-form-group">
                        
                        <input type="number" id="edit-product-stock" placeholder="Stock" required>
                    </div>
                    <div class="p-form-group">
                        
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
                <button class="add-product-button">Add
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
                                            <button class='crud-btn p-btn-edit'><i class='fa fa-pen-to-square'></i></button>
                                            <button class='crud-btn p-btn-delete'><i class='fa fa-trash-can'></i></button>
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.querySelector(".search-bar");
        const table = document.getElementById("product_table");
        const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        searchInput.addEventListener("keyup", function() {
            const filter = searchInput.value.toLowerCase();
            for (let i = 0; i < rows.length; i++) {
                let match = false;
                const cells = rows[i].getElementsByTagName("td");
                for (let j = 0; j < cells.length - 1; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? "" : "none";
            }
        });

        const addProductButton = document.querySelector(".add-product-button");
        const popupAddProduct = document.getElementById("popup-add-product");
        const addProductForm = document.getElementById("add-product-form");

        addProductButton.addEventListener("click", function() {
            popupAddProduct.style.display = "block";
        });

        addProductForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const productName = document.getElementById("product-name").value;
            const productStock = document.getElementById("product-stock").value;
            const productPrice = document.getElementById("product-price").value;

            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td>${table.rows.length - 1}</td>
                <td>${productName}</td>
                <td>${productStock}</td>
                <td>R ${productPrice}</td>
                <td>
                    <button class='crud-btn p-btn-edit'><i class='fa fa-pen-to-square'></i></button>
                    <button class='crud-btn p-btn-delete'><i class='fa fa-trash-can'></i></button>
                </td>
            `;

            popupAddProduct.style.display = "none";
            addProductForm.reset();
        });

        table.addEventListener("click", function(event) {
            if (event.target.closest(".p-btn-delete")) {
                const row = event.target.closest("tr");
                row.remove();
            }

            if (event.target.closest(".p-btn-edit")) {
                const popupEditProduct = document.getElementById("popup-edit-product");
                const saveEditButton = popupEditProduct.querySelector("#save-edit-btn");

                const productNameInput = popupEditProduct.querySelector("#edit-product-name");
                const productStockInput = popupEditProduct.querySelector("#edit-product-stock");
                const productPriceInput = popupEditProduct.querySelector("#edit-product-price");

                const row = event.target.closest("tr");
                const productName = row.cells[1].textContent;
                const productStock = row.cells[2].textContent;
                const productPrice = row.cells[3].textContent.slice(2); // Remove the "R " prefix

                productNameInput.value = productName;
                productStockInput.value = productStock;
                productPriceInput.value = productPrice;

                popupEditProduct.style.display = "block";

                saveEditButton.onclick = function() {
                    row.cells[1].textContent = productNameInput.value;
                    row.cells[2].textContent = productStockInput.value;
                    row.cells[3].textContent = "R " + productPriceInput.value;

                    popupEditProduct.style.display = "none";
                };
            }
        });
    });
    </script>
</body>

</html>