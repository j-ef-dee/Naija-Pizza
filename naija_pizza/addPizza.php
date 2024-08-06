<?php

include 'config/db_connect.php';

$email = '';
$title = '';
$ing = '';

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {

    //VALIDATE FORM INPUTS

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = 'E-mail Address is Required';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter Valid E-mail Address';
        }
    }

    // Validate Title
    if (empty($_POST['title'])) {
        $errors['title'] = 'Pizza Title is Required';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title Must be Letters & Spaces only';
        }
    }

    // Validate Ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'Pizza Ingredients is Required';
    } else {
        $ing = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(, \s*[a-zA-Z\s]*)*$/', $ing)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }

    if (array_filter($errors)) {
        echo 'errors in form';
    } else {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ing = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // Create SQL to Save Data
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ing')";

        //Save to Database and Check Save
        if (!mysqli_query($conn, $sql)) {
            echo 'query error:' . mysqli_error($conn);
        } else {
            // echo 'Submission Successful';
            header('location: index.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="white">
        <label for="email">Your E-mail:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">

        <label for="title">Pizza Title:</label>
        <input type="text" name="title" value="<?php htmlspecialchars($title); ?>">

        <label for="ingredients">Ingredients (Comma Separated)</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ing); ?>">

        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'footer.php'; ?>

</html>