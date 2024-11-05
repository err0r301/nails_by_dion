<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../scripts/report_script.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="../scripts/admin_script.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">


    <style>
        .report-page {
            /*display: inline;*/
            max-width: 800px;
            height: 820px;
            margin: 20px auto 0 auto;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /*
        .report-page.active {
            display: block;
        }*/

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .report-header img {
            width: 200px;
        }

        .report-header div {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-left: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media print {
            .report-page {
                page-break-after: always;
            }
        }

        /*
        .pagination {
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .page {
            display: inline-block;
            height: 25px;
            padding: 0px 9px;
            margin-right: 4px;
            border-radius: 3px;
            border: solid 1px #c0c0c0;
            background: #e9e9e9;
            box-shadow: inset 0px 1px 0px rgba(255, 255, 255, .8), 0px 1px 3px rgba(0, 0, 0, .1);
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            color: #717171;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 1);
        }

        .page:hover,
        .page.gradient:hover {
            background: #fefefe;
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
            background: -moz-linear-gradient(0% 0% 270deg, #FEFEFE, #f0f0f0);
        }

        .page.active {
            border: none;
            background: #616161;
            box-shadow: inset 0px 0px 8px rgba(0, 0, 0, .5), 0px 1px 0px rgba(255, 255, 255, .8);
            color: #f0f0f0;
            text-shadow: 0px 0px 3px rgba(0, 0, 0, .5);
        }*/
    </style>

</head>

<body>
    <div class="grid-container">
        <?php
        $page = 'report';
        include '../partial/admin_header.php';
        include '../partial/admin_sidebar.php';
        $report = getReport();
        /*$sales = 0;
            for ($i = 0; $i < count($services); $i++) {
                $sales += $services[$i]['month-revenue'];
            }*/
        ?>

        <main class="main-container">
            <div class="top" style="margin-bottom: 40px">
                <h1 class="main-title font-weight-bold">REPORT</h1>
                <div class="dropdown">
                    <button class="app-content-headerButton dropdown-toggle">Filter</button>
                    <div class="dropdown-content">
                        <a href="#">Daily</a>
                        <a href="#">Monthly</a>
                        <a href="#">Yearly</a>
                        <a href="#">Custom</a>
                    </div>
                </div>
                <button class="app-content-headerButton" onclick="generatePDF()">Download</button>
            </div>
            <div class="report-container">
                <div class="report-page active">
                    <div style="text-align: center;">
                        <h1>Nails By Dion</h1>
                        <div class="report-header">
                            <img src="../_images/logo.png" alt="Salon Logo" style="width: 200px;">
                            <div>
                                <h3><?php echo date("F Y"); ?></h3>
                                <p>Sales this month: R <?= $report['sales'] ?></p>
                                <p>Appointments this month: <?= $report['appointments'] ?></p>
                                <p>Number of customers: <?= $report['users'] ?></p>
                            </div>

                        </div>

                    </div>

                    <h2>Services Report</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Revenue</th>
                        </tr>

                        <?php
                        // Ensure $report['services'] is defined and is an array before using it  
                        if (isset($report['services']) && is_array($report['services'])) {
                            $limit = min(13, count($report['services']));
                            for ($x = 0; $x < $limit; $x++): ?>
                                <tr>
                                    <td><?= $report['services'][$x]['name'] ?? 'N/A' ?></td>
                                    <td><?= $report['services'][$x]['category'] ?? 'N/A' ?></td>
                                    <td>R <?= $report['services'][$x]['price'] ?? '0.00' ?></td>
                                    <td>R <?= $report['services'][$x]['monthlyRevenue'] ?? '0.00' ?></td>
                                </tr>
                        <?php endfor;
                        } else {
                            // Optional: Display a message if there are no services  
                            echo "<tr><td colspan='4'>No services available.</td></tr>";
                        } ?>
                    </table>
                </div>
                <?php if ($x < count($report['services'])) { ?>
                    <div class="report-page active">
                        <table>
                            <?php for ($x = $limit; $x < count($report['services']); $x++): ?>
                                <tr>
                                    <td><?= $report['services'][$x]['name'] ?? 'N/A' ?></td>
                                    <td><?= $report['services'][$x]['category'] ?? 'N/A' ?></td>
                                    <td>R <?= $report['services'][$x]['price'] ?? '0.00' ?></td>
                                    <td>R <?= $report['services'][$x]['monthlyRevenue'] ?? '0.00' ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                <?php } ?>

                <!-- Staff Report -->
                <div class="report-page">
                    <h2>Staff Report</h2>
                </div>

                <!-- Inventory Report -->
                <div class="report-page">
                    <h2>Inventory Report</h2>
                </div>
            </div>
            <!--
            <div class="pagination">
                <a href="#" class="page" data-page="back">&#129120;</a>
                <a href="#" class="page active" data-page="1">1</a>
                <a href="#" class="page" data-page="2">2</a>
                <a href="#" class="page" data-page="3">3</a>
                <a href="#" class="page" data-page="4">4</a>
                <a href="#" class="page" data-page="5">5</a>
                <a href="#" class="page" data-page="next">&#129122;</a>
            </div>-->
        </main>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            const reportPages = document.querySelectorAll('.report-page');
            const pdfContainer = document.createElement('div');

            // Append all pages to the new container  
            reportPages.forEach(page => {
                const clonedPage = page.cloneNode(true); // Clone the page  
                pdfContainer.appendChild(clonedPage); // Add cloned page to the new container  
            });

            const options = {
                filename: '<?php echo date("F-Y"); ?>_report.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf()
                .from(pdfContainer) // Use the combined container  
                .set(options)
                .save();
        }


    // FILTER FUNCTIONALITY
    document.addEventListener('DOMContentLoaded', function() {
        const filterLinks = document.querySelectorAll('.dropdown-content a');
        const appointmentsElement = document.querySelector('.report-header p:nth-child(3)');
        const dateElement = document.querySelector('.report-header h3');

        filterLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const filterType = this.textContent.trim().toLowerCase();

                // Fetch the data based on the filter type
                fetchAppointmentsData(filterType);
                updateDateDisplay(filterType);
            });
        });

        function fetchAppointmentsData(filterType) {
            // Simulate fetching data based on filter type
            let appointments, sales, customers;
            switch (filterType) {
                case 'daily':
                    appointments = '5'; // Example data
                    sales = '500'; // Example data
                    customers = '3'; // Example data
                    break;
                case 'monthly':
                    appointments = '150'; // Example data
                    sales = '15000'; // Example data
                    customers = '100'; // Example data
                    break;
                case 'yearly':
                    appointments = '1800'; // Example data
                    sales = '180000'; // Example data
                    customers = '1200'; // Example data
                    break;
                default:
                    appointments = '0';
                    sales = '0';
                    customers = '0';
            }

            // Update the appointments, sales, and customers display
            appointmentsElement.textContent = `Appointments this ${filterType}: ${appointments}`;
            document.querySelector('.report-header p:nth-child(2)').textContent = `Sales this ${filterType}: R ${sales}`;
            document.querySelector('.report-header p:nth-child(4)').textContent = `Number of customers: ${customers}`;
        }

        function updateDateDisplay(filterType) {
            const currentDate = new Date();
            let formattedDate;

            switch (filterType) {
                case 'daily':
                    formattedDate = currentDate.toLocaleDateString('en-GB', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    break;
                case 'monthly':
                    formattedDate = currentDate.toLocaleDateString('en-GB', {
                        month: 'long',
                        year: 'numeric'
                    });
                    break;
                case 'yearly':
                    formattedDate = currentDate.getFullYear();
                    break;
                default:
                    formattedDate = currentDate.toLocaleDateString('en-GB', {
                        month: 'long',
                        year: 'numeric'
                    });
            }

            // Update the date display
            dateElement.textContent = formattedDate;
        }
    });
    </script>
    <script>
        // Function to show the selected page and hide others  
        function showPage(pageNumber) {
            const reportPages = document.querySelectorAll('.report-page');
            reportPages.forEach((page, index) => {
                if (index + 1 === pageNumber) {
                    page.classList.add('active');
                } else {
                    page.classList.remove('active');
                }
            });

            // Update pagination link styles  
            const paginationLinks = document.querySelectorAll('.pagination .page');
            paginationLinks.forEach(link => {
                if (parseInt(link.getAttribute('data-page')) === pageNumber) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Add event listeners to pagination links  
        document.querySelectorAll('.pagination .page').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior  

                const pageNumber = this.getAttribute('data-page');

                // Handle the 'next' functionality  
                if (pageNumber === 'next') {
                    const currentActive = document.querySelector('.pagination .page.active');
                    if (currentActive) {
                        const nextPage = parseInt(currentActive.getAttribute('data-page')) + 1;
                        if (nextPage <= 5) { // assuming 5 total pages  
                            showPage(nextPage);
                        }
                    }
                }
                // Handle the 'back' functionality  
                else if (pageNumber === 'back') {
                    const currentActive = document.querySelector('.pagination .page.active');
                    if (currentActive) {
                        const previousPage = parseInt(currentActive.getAttribute('data-page')) - 1;
                        if (previousPage >= 1) { // assuming 1 is the first page  
                            showPage(previousPage);
                        }
                    }
                }
                // For normal page numbers  
                else {
                    showPage(parseInt(pageNumber));
                }
            });
        });

        // Initialize the first page as active  
        showPage(1);
    </script>
</body>

</html>