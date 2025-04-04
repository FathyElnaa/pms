<?php require_once ('inc/header.php'); ?>

<h2>Login Form</h2>
<form action="handelers/login.php" method="POST">

   <div class="mb-3">
       <label for="email" class="form-label">Email:</label>
       <input type="text" id="email" name="email" class="form-control">
   </div>

   <div class="mb-3">
       <label for="password" class="form-label">PassWord:</label>
       <input type="password" id="password" name="password" class="form-control">
   </div>


   <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once "inc/footer.php"; ?>