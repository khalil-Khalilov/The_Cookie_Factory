<?php require 'inc/head.php'; ?>

<?php require 'inc/data/products.php'; ?>

<?php
if (!empty($_GET['add_to_cart'])) {
    if (!empty($_SESSION['loginname'])) {
        if ($_GET['add_to_cart'] != 0 && is_numeric($_GET['add_to_cart'])) {
            $cookie_id = (int)trim(($_GET['add_to_cart']));

            $_SESSION['cart'][] = $catalog[$cookie_id]['name'];

            echo '<h3 style="background-color:green; color:white; font-weight:bold;"> 
        You have successfully added the product to the cart 
        </h3>';
            header("Refresh:2; index.php");
        }
    }
    else{
        header('Location:login.php');
    }
}
?>



<?php
if (!empty($_SESSION['loginname'])) {
    $user_name = $_SESSION['loginname'];
?>
    <h1>Welocome <?= $user_name; ?></h1>
<?php
} else {
?>
    <h1>Welcome Wilder !</h1>
<?php
}
?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>