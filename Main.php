<?php
include ("config.php");
$DB= new DataBase();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart project -Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Icon library  -->
    <script src="https://kit.fontawesome.com/7963dd1579.js" crossorigin="anonymous"></script>
    <!--  Bootstrap5 Libraries  -->
    <link href="bootstrap-5%20libraries/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google API Libraries-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart1);
        google.setOnLoadCallback(drawChart2);
        google.setOnLoadCallback(drawChart3);
        function drawChart1() {
            var data = google.visualization.arrayToDataTable([

                ['Item','Category'],
                <?php
            $DB->dataFetch("SELECT COUNT(Item) as Number,Category FROM reciept GROUP BY Category",'Category');
                ?>

        ]);

            var options = {
                title: '',
                pieHole: 0.3,
                pieSliceTextStyle: {
                    color: 'white',
                },
                legend: 'bottom'
            };
            var chart = new google.visualization.PieChart(document.getElementById("Chart1"));
            chart.draw(data,options);
        }
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([

                ['Number','Item'],
                <?php
                $DB->dataFetch("SELECT COUNT(Item) as Number,ItemGroup FROM reciept GROUP BY ItemGroup",'ItemGroup');
                ?>

            ]);

            var options = {
                title: '',
                is3D: true
            };
            var chart = new google.visualization.PieChart(document.getElementById("Chart3"));
            chart.draw(data,options);
        }
        function drawChart3() {
            var data = google.visualization.arrayToDataTable([

                ['y','n.','€'],
                <?php
                $DB->dataFetch2("SELECT Time_stamp,COUNT(Item) as Citem,SUM(Price) as Sprice FROM reciept GROUP BY Time_stamp",'Time_stamp','Citem','Sprice');
                ?>

            ]);

            var options = {
                title : '',
                vAxis: {title: 'Numbers ;D'},
                hAxis: {title: 'Date'},
                seriesType: 'bars',
                series: {5: {type: 'line'}},
                colors: ['#a3cfbb', '#8caae7']
            };

            var chart = new google.visualization.ComboChart(document.getElementById("Chart2"));
            chart.draw(data,options);
        }

    </script>
    <!-- Disable scrollbar -->
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
        /*RE*/
        @media (min-width:768px) {
            .responsive-card{
                height: auto;
                width: 22rem;
            }
            .responsive-container{
                display: flex;
                flex-wrap: wrap
            }

        }
    </style>
</head>
<body class="container-fluid d-flex flex-column p-0"
      style="background-image: url(assets/bg.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;">
<!-- Navigation Bar -->
<nav class="navbar navbar-light ">
    <div class="container-fluid justify-content-center p-0">
        <!--Top visible part of navbar-->
        <div class="navbar-brand">
            <i class="fab fa-android fa-lg"></i> <!-- Android icon -->
            Chart Project
        </div>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Collapsable Navigation Bar List-->
            <ul class="navbar-nav align-items-center bg-success-subtle mt-3">
                <li class="nav-item border-bottom border-3 border-light">
                    <a class="nav-link" aria-current="page" href="Form.php">Form - insert page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"><-- What you staring at<i class='fas fa-angry'></i> ? --></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- Group/Father Card-->
<div class="container-fluid d-flex justify-content-evenly mt-5 h-50 responsive-container" style="display: flex;flex-wrap: wrap">
    <!-- First Card -->
    <div id="card1">
        <div class="card-body p-0">
            <div id="Chart1" class="h-100"></div>
        </div>
        <div class="card-footer">
            <p class="text-center">Number of Items in each Category.</p>
        </div>
    </div>
    <!-- Second Card -->
    <div id="card2">
        <div class="card-body p-0">
            <div id="Chart2" class="h-100"></div>
        </div>
        <div class="card-footer">
            <p class="text-center">Money and Number of Items bought in Time</p>
        </div>
    </div>
    <!-- Third Card -->
    <div id="card3">
        <div class="card-body p-0">
            <div id="Chart3" class="h-100"></div>
        </div>
        <div class="card-footer">
            <p class="text-center">Funds spent on Items</p>
        </div>
    </div>
    <!-- Father Card-->
</div>
<!-- Copyright -->
<div class="text-center p-3 m-2">
    © 2024 Copyright: Daniel Charts Project
</div>
<!-- Copyright -->

<!-- JavaScript for grouping bootstrap classes-->
<script>
    <!--  Code to reuse the class based styling from Bootstrap5  -->
    const cardStyle = 'card container h-75 ms-1 m-2 border-4 border-success-subtle shadow-lg responsive-card';
    document.getElementById('card1').className = cardStyle;
    document.getElementById('card2').className = cardStyle;
    document.getElementById('card3').className = cardStyle;
</script>
</body>
</html>