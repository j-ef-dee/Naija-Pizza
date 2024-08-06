<?php

// Include $conn file
include 'config/db_connect.php';

if (isset($_POST['delete'])) {
    $id_delete = mysqli_real_escape_string($conn, $_POST['id_delete']);

    $sql = "DELETE FROM pizzas WHERE id =  $id_delete";

    if (!mysqli_query($conn, $sql)) {
        echo 'query error:' . $mysql_error($conn);
    } else {
        header('Location: index.php');
    }
}

// Check GET Request ID Parameter
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    // Query SQL
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // GET SQL Query Result
    $result = mysqli_query($conn, $sql);

    // Fetch Result in Array Format
    $pizza = mysqli_fetch_assoc($result);

    // Free Result & Pass Conection 
    mysqli_free_result($result);
    mysqli_close($conn);
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<div class="container center">
    <?php if ($pizza) : ?>

        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- Delete form   -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_delete" value="<?php echo $pizza['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

        </form>

    <?php else : ?>

        <h5>Pizza does not exist</h5>

    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>

</html>