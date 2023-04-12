<?php
  include('header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">

        <h1>Zaloguj się</h1>
<form action="" method="POST">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="login">
          Login
            <br><input type="text" class="form-control"  placeholder="Login" id="exampleInputEmail1" name="login">
        </div>
        <div class="haslo">
           
            Hasło
           <br> <input type="password" placeholder="Hasło" class="form-control" name="haslo">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
        <button type="clear" class="btn btn-primary">Cancel</button>
</form>
    </form>
        </div>
    </div>
</div>
