        <?php
        session_start();
        ?>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">EraaSoft PMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <?php if (isset($_SESSION['user'])): ?>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="form_add_product.php">Add Product</a></li>
                            <li class="nav-item"><a class="nav-link" href="handelers/logout.php">logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="Form_register.php">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="Form_login.php">login</a></li>
                        <?php endif ?>
                    </ul>
                    <form class="d-flex" action="cart.php">
                    <?php
                $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                ?>
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $cart_count ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>