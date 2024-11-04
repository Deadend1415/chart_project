<?php
    include ("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DB = new DataBase();
    //insert
    $DB->set_User($_POST["Price"],$_POST["Item"],$_POST["Category"],$_POST["Time_Stamp"]);
    //passing variables
    $price = $_POST['Price'];
    $item = $_POST['Item'];
    $category = $_POST['Category'];
    $timeStamp = $_POST['Time_Stamp'];
    //Alert to the user
    echo "
        <div class='toast position-fixed bottom-0 end-0 show' role='alert' aria-live='assertive' aria-atomic='true'>
    <div class='toast-header'>
        <i class='fab fa-android fa-lg' style='color: rgb(34 179 112 / 65%);margin-right:5px;'></i>
        <strong class='me-auto'>Chart Project</strong>
        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
    </div>
    <div class='toast-body bg-success-subtle'>
    Item: ".$item." Price: €".$price." <br>Category:".$category." Date: ".$timeStamp."
    <br>
    Data inputed Sucessfully.
    <i class='fas fa-check-circle fa-lg' style='color: rgb(34 179 112 / 65%)'></i>
    </div>
</div>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart project -Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Icon library  -->
    <script src="https://kit.fontawesome.com/7963dd1579.js" crossorigin="anonymous"></script>
    <!--  Bootstrap5 Libraries  -->
    <link href="bootstrap-5%20libraries/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Disable scrollbar -->
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="container-fluid d-flex flex-column vh-100 p-0 justify-content-between"
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
                <li id="nav_list1">
                    <a class="nav-link" aria-current="page" href="Main.php">Main - display data on main page</a>
                </li>
                <li id="nav_list2">
                    <a class="nav-link" href="#"><-- What you staring at<i class='fas fa-angry'></i> ? --></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Card -->
<div id="card1">
    <div class="card-body">
        <!-- Form -->
        <form class="was-validated" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="h4 pb-2 mb-3">
                <label id="badge1">Item <i class='fas fa-cookie-bite'></i></label>
                <input type="text" name="Item" class="form-control border-success" placeholder="...Like an apple" required>
            </div>

            <div class="h4 pb-2 mb-3">
                <label id="badge2">ItemGroup <i class='fas fa-cookie-bite'></i></label>
                <input type="text" name="ItemGroup" class="form-control border-success" placeholder="...Biscuit?" required>
            </div>

            <div class="h4 pb-2 mb-3">
                <label  id="badge3">Category <i class='fas fa-archive'></i></label>
                <select class="form-select" name="Category">
                    <option selected>Choose...</option>
                    <option value="Snack">Snack</option>
                    <option value="Utilities">Utilities</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="h4 mb-3 pb-2">
                <div class="d-flex justify-content-between">
                    <label  id="badge4">Price <i class='fas fa-euro-sign'></i></label>
                    <label  id="badge5">Date <i class='far fa-calendar'></i></label>
                </div>
                <div class="input-group">
                    <input type="text" name="Price" class="form-control border-success" placeholder="$1.99" required>
                    <input type="date" name="Time_Stamp" class="form-control border-success" placeholder="Day-Year-Month" required>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-success input-group">Submit</button>
        </form>
        <!-- Form -->
    </div>
</div>
<!-- Card -->
<!-- Copyright -->
<div class="text-center p-3 m-2">
    © 2024 Copyright: Daniel Charts Project
</div>
<!-- Copyright -->
</div>


<!-- JavaScript for grouping bootstrap classes-->
<script>
    // Resuse badge styling
    const BadgeStyle = 'form-label badge rounded-pill border-bottom border-success text-dark bg-success-subtle shadow';
    document.getElementById('badge1').className = BadgeStyle;
    document.getElementById('badge2').className = BadgeStyle;
    document.getElementById('badge3').className = BadgeStyle;
    document.getElementById('badge4').className = BadgeStyle;
    document.getElementById('badge5').className = BadgeStyle;

    <!--  Code to reuse the class based styling from Bootstrap5  -->
    const cardStyle = 'card border-4 m-3 border-success-subtle shadow-lg align-self-center';
    document.getElementById('card1').className = cardStyle;

    //     To reuse the nav bar item styling
    const Nav_ListStyle = 'nav-item border-bottom border-3 border-light';
    document.getElementById('nav_list1').className = Nav_ListStyle;
    document.getElementById('nav_list2').className = Nav_ListStyle;
    document.getElementById('nav_list3').className = Nav_ListStyle;

</script>
</body>
</html>