<?php require_once ('inc/header.php');?>
        <!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                foreach(Get_Product() as $pro){
                    echo "
                    <div class='col mb-5'>
                        <div class='card h-100'>
                            <img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' />
                            <div class='card-body p-4'>
                                <div class='text-center'>
                                    <h5 class='fw-bolder'>{$pro['name']}</h5>
                                    <p>\${$pro['price']}</p>
                                </div>
                            </div>
                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                <form method='post' action='handelers/add_cart.php'>
                                    <input type='hidden' name='name' value='{$pro['name']}'>
                                    <input type='hidden' name='price' value='{$pro['price']}'>
                                    <input type='hidden' name='type' value='{$pro['type']}'>
                                   <div class='text-center'> <button type='submit' name='add_to_cart' class='btn btn-outline-dark mt-auto'>Add to Cart</button></div>
                                </form>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>
</section>
<?php require_once ('inc/footer.php'); ?>