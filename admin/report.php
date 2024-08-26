<?php
    $filePath = __DIR__ . '/../data/services.json';
    $servicesData = file_get_contents($filePath);
    $services = json_decode($servicesData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="../scripts/admin_script.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/admin_styles.css">


    <style>
        .report-container {
            max-width: 800px;
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
        th, td {
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
    </style>

</head>
<body>
    <div class="grid-container">
        <?php
            include '../partial/admin_header.php';
            include '../partial/admin_sidebar.php';
            $sales = 0;
            for ($i = 0; $i < count($services); $i++) {
                $sales += $services[$i]['month-revenue'];
            }
        ?>
        
        <main class="main-container">
            <div class="top" style="margin-bottom: 40px">
                <h1 class="main-title font-weight-bold">REPORT</h1>
                <button class="app-content-headerButton" onclick="generatePDF()">Download</button>
            </div>
            <div class="report-container">
                <div style="text-align: center;">
                    <h1>Nails By Dion</h1>
                    <div class="report-header">
                        <img src="../_images/logo.png" alt="Salon Logo" style="width: 200px;">
                        <div>
                            <h3>Monthly Report</h3>
                            <p>Sales this month: R <?= $sales ?></p>
                            <p>Appointments this month: 236</p>
                            <p>Number of customers: 520</p>
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

                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td><?= $service['name'] ?></td>
                            <td><?= $service['category'] ?></td>
                            <td>R <?= $service['price'] ?></td>
                            <td>R <?= $service['month-revenue'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        </main>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            const element = document.querySelector('.report-container');

            const options = {
                filename: 'June-2024_report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf()
                .from(element)
                .set(options)
                .save();
        }
    </script>
</body>
</html>

