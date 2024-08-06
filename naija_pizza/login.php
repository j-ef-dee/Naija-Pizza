<?php

// include 'config/db_connect.php';

// Sessions
if (isset($_POST['submit'])) {

    // COOKIES
    setcookie('gender', $_POST['gender'], time() + 864000);
    
    session_start();

    $_SESSION['name'] = $_POST['name'];

    header('location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naija Pizza Login Page</title>
\</head>

<body>
    <div class="container">
        <div class="center z-depth-0">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text" name="name">

                <select name="gender" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>

</html>