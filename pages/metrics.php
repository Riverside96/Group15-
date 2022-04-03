<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../navigation/admindashnavbar.php';
    require ('../config/dbcon.php'); ?>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../navigation/admindashnavbar.css">
    <link rel="stylesheet" href="../css/admindash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">



    <div class="dashboard-cards">
        <div class="card" id="card-1">
            <div class="chart-canvas">
                <canvas id="LiquidityPlanning"></canvas>
            </div>
        </div>
        <div class="card"  id="card-2">
            <div class="chart-canvas">
                <div class="chart-options">
                    <select onchange="updateStreamEC()" name="cashstream" id="cashstreamEC">
                        <option value="Expense">Expense</option>
                        <option value="Income">Income</option>
                    </select>
                </div>
                <canvas id="ExpensesByCategory"></canvas>

            </div>
        </div>
        <div class="card"  id="card-3">
            <div class="chart-canvas">
                <canvas id="ExpensesByPaymentMethod"></canvas>
            </div>
        </div>
        <div class="card"  id="card-4">
            <div class="chart-canvas">
                <canvas id="ExpensesByCategoryBenchmark"></canvas>
            </div>
        </div>
    </div>
</div>
</body>
</html>
