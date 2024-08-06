<?php

session_start();

$name = $_SESSION['name'] ?? 'Guest';

// GET COOKIE
$gender = $_COOKIE['gender'] ?? 'Unknown';

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naija Pizza</title>
    <!-- Compiled and minified CSS/ Materialize CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .brand {
            background: #1B7339 !important;
        }

        .brand-text {
            color: #1B7339 !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza {
            width: 60px;
            height: 60px;
            float: left;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Naija Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Welcome <?php echo htmlspecialchars($name); ?> </li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>) </li>
                <li><a href="addPizza.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>