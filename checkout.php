<?php require_once('inc/header.php'); 
$total_price = 0;

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <?php foreach ($_SESSION['cart'] as $key => $value):
                             $item_total = $value['price'] * $value['quantity'];
                             $total_price += $item_total;
                              ?>
                        <ul class="list-unstyled">
                            <li class="border p-2 my-1"> <?= $value['name'];echo " #" .$key+1?> -
                                <span class="text-success mx-2 mr-auto bold"><?= $value['price'] ."$" . " x " . $value['quantity']?></span>
                            </li>
                        </ul>
                        <?php endforeach?>
                    </div>
                    <h3>Total : <?=  number_format($total_price,2) ?> $</h3>
                </div>
            </div>
            <div class="col-8">
                <form action="handelers/checkout_user.php" method="POST" class="form border my-2 p-3">
                    
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="number" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="text" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>