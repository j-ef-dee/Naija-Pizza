<?php

include 'config/db_connect.php';

if (isset($_POST['submit'])) {
    // Validate form emtries

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(oop_styles.css);
    </style>
</head>

<body>
    <div class="new-user">
        <h2>Create New User</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <label for="">Username:</label>
            <input type="text" name="username">

            <label for="email">Email:</label>
            <input type="text" name="email">

            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>

</html>