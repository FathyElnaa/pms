<?php require_once('inc/header.php');
$total_price = 0;
?>


<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php
                if (!empty($_SESSION['cart'])):
                ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $key => $value):

                                $item_total = $value['price'] * $value['quantity'];
                                $total_price += $item_total;
                            ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= number_format($value['price'], 2) ?></td>
                                    <td>
                                        <form method="post" action="handelers/update_cart.php">
                                            <input type="hidden" name="index" value="<?= $key ?>">
                                            <input type="number" name="quantity" value="<?= $value['quantity'] ?>" min="1">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td>$<?= number_format($item_total, 2) ?></td>
                                    <td>
                                        <a href="handelers/remove_from_cart.php?index=<?= $key ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                            <tr>
                                <td colspan="2">
                                    Total Price
                                </td>
                                <td colspan="3">
                                    <h3><?= number_format($total_price, 2) ?> $</h3>
                                </td>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <td>
                                        <a href="checkout.php" class="btn btn-primary">Checkout</a>
                                    </td>
                                <?php else:
                                    header("location: Form_login.php");
                                    exit;
                                ?>
                                <?php endif ?>

                            </tr>
                    </table>
                <?php else: ?>
                    <h3 class="text-center">Your cart is empty</h3>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>