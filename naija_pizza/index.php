<?php


include 'config/db_connect.php';


// Write Query to get Data from Database
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// Make Query & get Result from Database
$result = mysqli_query($conn, $sql);

// Fetch the info from resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// Close Connection to Database
mysqli_close($conn);

// Explode Function to traverse Pizza Ingredients in a List
explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<h4 class="center #1B7339-text">Pizzas</h4>

<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) { ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img class="pizza" src="images/pizza.png" alt="">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <!-- <div><?php echo htmlspecialchars($pizza['ingredients']) ?></div> -->
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach ?>
                        </ul>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text">More Info</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</html>