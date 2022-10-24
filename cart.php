<?php require 'inc/head.php'; ?>

<?php
if (!empty($_SESSION['loginname'])) {
?>

    
    <section class="cookies container-fluid">
        <div class="row">

            <?php
            if (empty($_SESSION['cart'])) {
            ?>
                <h2>You have 0 items in your cart</h2>
            <?php
            } else {
                $products = count($_SESSION['cart']);
            ?>
            
                <h2>You have <?= $products ?> items in your cart</h2>
                <ul>
                    <?php
                    foreach ($_SESSION['cart'] as $cooki) {
                    ?>
                        <li><?= $cooki ?></li>
                    <?php
                    }
                    ?>
                </ul>

            <?php
            }
            ?>
        </div>
    </section>
    <?php require 'inc/foot.php'; ?>






<?php
} else {
    header('Location:login.php');
}
?>