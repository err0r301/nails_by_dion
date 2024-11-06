<?php
require('../scripts/report_script.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
            max-width: 800px;
            height: 820px;
            margin: 20px auto 0 auto;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

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

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        @media print {
            .report-page {
                page-break-after: always;
            }
        }

        #filterForm {
            position: absolute;
            top: 93px;
            right: 350px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: block;
            width: auto;
        }

        #filterForm label,
        #filterForm input,
        #filterForm select,
        #filterForm button {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 0px;
            padding: 5px;
            vertical-align: middle;
        }

        #filterForm input,
        #filterForm select {
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #filterForm button {
            background-color: black;
            color: white;
            transition: background-color 0.3s, color 0.3s;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            margin-left: 5px;
        }
        #filterForm button:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="grid-container">
        <?php
        $page = 'report';
        include '../partial/admin_header.php';
        include '../partial/admin_sidebar.php';
        $report = getReport("year");
        ?>

        <main class="main-container">
            <div class="top" style="margin-bottom: 40px; position: relative;">
                <h1 class="main-title font-weight-bold">REPORT</h1>
                <button class="app-content-headerButton" onclick="generatePDF()">Download</button>
            </div>

            <!-- Filter Form -->
            <div id="filterForm" style="display: block;">
                <form id="dateFilterForm" action="" method="post">

                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" name="startDate">

                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate" name="endDate">

                    <button type="button" id="submitButton" class="form-submit-button" onclick="applyDateFilter()">Filter</button>
                </form>
            </div>
            <div class="report-container">
                <div class="report-page active">
                    <div style="text-align: center;">
                        <h1>Nails By Dion</h1>
                        <div class="report-header">
                            <img src="../_images/logo.png" alt="Salon Logo" style="width: 200px;">
                            <div>
                                <h3 id="report-date"><?php echo date("F Y"); ?></h3>
                                <p>Sales this <span class="sales-period">month</span>: R <?= $report['sales'] ?></p>
                                <p>Appointments this <span class="sales-period">month</span>:
                                    <?= $report['appointments'] ?></p>
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
                        $x = 0;
                        if (isset($report['services']) && is_array($report['services']) && count($report['services']) > 0) {
                            $limit = min(13, count($report['services']));
                            for ($x = 0; $x < $limit; $x++): ?>
                                <tr>
                                    <td><?= $report['services'][$x]['name'] ?? 'N/A' ?></td>
                                    <td><?= $report['services'][$x]['category'] ?? 'N/A' ?></td>
                                    <td>R <?= $report['services'][$x]['price'] ?? '0.00' ?></td>
                                    <td>R <?= $report['services'][$x]['revenue'] ?? '0.00' ?></td>
                                </tr>
                        <?php endfor;
                        } else {
                            echo "<tr><td colspan='4'>No services available.</td></tr>";
                        } ?>
                    </table>
                </div>
                <?php if ($x < count($report['services'])) { ?>
                    <div class="report-page active">
                        <table>
                            <?php for (; $x < count($report['services']); $x++): ?>
                                <tr>
                                    <td><?= $report['services'][$x]['name'] ?? 'N/A' ?></td>
                                    <td><?= $report['services'][$x]['category'] ?? 'N/A' ?></td>
                                    <td>R <?= $report['services'][$x]['price'] ?? '0.00' ?></td>
                                    <td>R <?= $report['services'][$x]['revenue'] ?? '0.00' ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>

                        <h2 style="margin-top : 80px">Staff Report</h2>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Appointments completed</th>
                                <th>Appointments canceled</th>
                                <th>Revenue</th>
                            </tr>

                            <?php
                            if (isset($report['staff']) && is_array($report['staff'])) {
                                $limit = min(13, count($report['staff']));
                                for ($x = 0; $x < $limit; $x++): ?>
                                    <tr>
                                        <td><?= $report['staff'][$x]['name'] ?? 'N/A' ?></td>
                                        <td><?= $report['staff'][$x]['complete_appointments'] ?? '0' ?></td>
                                        <td><?= $report['staff'][$x]['cancelled_appointments'] ?? '0' ?></td>
                                        <td>R <?= $report['staff'][$x]['revenue'] ?? '0.00' ?></td>
                                    </tr>
                            <?php endfor;
                            } else {
                                echo "<tr><td colspan='4'>No Staff data available.</td></tr>";
                            } ?>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>

    <script>
        function generatePDF() {
            const reportPages = document.querySelectorAll('.report-page');
            const pdfContainer = document.createElement('div');

            reportPages.forEach(page => {
                const clonedPage = page.cloneNode(true);
                pdfContainer.appendChild(clonedPage);
            });

            const reportType = document.getElementById('reportType').value;
            const day = document.getElementById('day') ? document.getElementById('day').value : '';
            const month = document.getElementById('month') ? document.getElementById('month').value : '';
            const year = document.getElementById('year') ? document.getElementById('year').value : '';
            let filenameDate = '';

            if (reportType === 'day' && day && month && year) {
                filenameDate = `${day}-${new Date(0, month - 1).toLocaleString('default', { month: 'long' })}-${year}`;
            } else if (reportType === 'month' && month && year) {
                filenameDate = `${new Date(0, month - 1).toLocaleString('default', { month: 'long' })}-${year}`;
            } else if (reportType === 'year' && year) {
                filenameDate = `${year}`;
            } else {
                filenameDate = '<?php echo date("F-Y"); ?>';
            }

            const options = {
                filename: `${filenameDate}_report.pdf`,
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
                .from(pdfContainer)
                .set(options)
                .save();
        }

        function applyDateFilter() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (startDate && endDate) {
                const formattedStartDate = new Date(startDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
                const formattedEndDate = new Date(endDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
                const dateString = `${formattedStartDate} - ${formattedEndDate}`;
                document.getElementById('report-date').textContent = dateString;
                document.querySelectorAll('.sales-period').forEach(element => {
                    element.textContent = 'period';
                });
            }
        }

        document.getElementById('reportType').addEventListener('change', function() {
            const rangeDateInputs = document.getElementById('rangeDateInputs');
            if (this.value === 'range') {
                rangeDateInputs.style.display = 'block';
            } else {
                rangeDateInputs.style.display = 'none';
            }
        });
    </script>
</body>

</html>