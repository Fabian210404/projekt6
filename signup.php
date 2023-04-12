<?php include('header.php'); ?>
<?php $error = array("", "", "", "", "", true); 

if(isset($_POST['submit'])){
    $imie = htmlspecialchars($_POST['imie']);

    if($imie == "" || strlen($imie) < 3) {
        $error[0] = "Brak imienia."; 
    }
    $nazwisko = htmlspecialchars($_POST['nazwisko']);

    if($nazwisko == "" || strlen($nazwisko) < 3) {
        $error[1] = "Brak nazwiska."; 
    }
    $login = htmlspecialchars($_POST['login']);

    if($login == "" || strlen($login) < 3) {
        $error[2] = "Brak loginu."; 
    }
    $email = htmlspecialchars($_POST['email']);
    
    if($email == "" || strlen($email) < 1) {
        $error[3] = "Brak mail'a."; 
     }
     $haslo = htmlspecialchars($_POST['haslo']);
     $phaslo = htmlspecialchars($_POST['phaslo']);
     if (
        !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', '$haslo') 
        || !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', '$phaslo') 
        || $haslo != $phaslo
        ){
         $error[4] ="Hasło musi posiadać min. 8 znaków i być identyczne." ;
        //  1wwwdAw@dwaA!aa
        
                if(!empty($_POST['regulamin'])) {
                   $error[5] = true;
                }else {
                    $error[5] = false;
                }
            }
    }
    
    ?>
<!-- formularz -->
<div class="container">
    <div class="row">
        <div class="col-12">

        <h1>Załóż konto</h1>
<form action="signup.php" method="POST">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="imie">
    <?php if($error[0] != "" ) {
        ?>
            <label for="" class="alert alert-warning"><?php echo $error[0];?></label>
            <?php } ?>
            <input type="text" placeholder="Imie" class="form-control" id="exampleInputEmail1" name="imie">

        </div>
        <div class="nazwisko">
            <?php if($error[1] != ""){ 
                ?>
            <label for="exampleInputEmail1" class="alert alert-warning"><?php echo $error[1];?></label>
            <?php }?>
            <br><input type="text"placeholder="Nazwisko" class="form-control" id="exampleInputEmail1" name="nazwisko">
            
        </div>
        <div class="login">
        <?php if($error[2] != ""){ 
                ?>
            <label for="exampleInputEmail1" class="alert alert-warning"><?php echo $error[2];?></label>
            <?php }?>
            <br><input type="text" class="form-control"  placeholder="Login" id="exampleInputEmail1" name="login">
        </div>
        <div class="e-mail">
        <?php if($error[3] != ""){ 
                ?>
            <label for="exampleInputEmail1" class="alert alert-warning"><?php echo $error[3];?></label>
            <?php }?>
            <br><input type="email" placeholder="nazwa@mail.com" class="form-control" id="exampleInputEmail1" name="email">
            
        </div>
        <div class="haslo">
        <?php if($error[4] != ""){ 
                ?>
            <label for="exampleInputPassword1" class="alert alert-warning"><?php echo $error[4];?></label>
            <?php }?>
           <br> <input type="password" placeholder="Hasło" class="form-control" name="haslo">
        </div>
        <div class="phaslo">
        
            <label for="exampleInputPassword1" class=""></label
            
            <br><input type="password" placeholder="Powtórz hasło" class="form-control" name="phaslo">
            
        </div>
        <br>
        <div class="regulamin">
            <?php
            if(!$error[5]){
                ?>
                <label for="" class="alert alert-warning">Musisz zaakceptować regulamin, aby korzystać z serwisu Internetowej.</label>
                <?php } ?>
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="regulamin">
            <label class=""  for="exampleCheck1">Akceptuję regulamin strony internetowej</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Załóż konto</button>
        <button type="clear" class="btn btn-primary">Wyczyść</button>
</form>
    </form>
        </div>
    </div>
</div>

<!-- end - formularz -->
<?php
if($error[0] == "" &&  $error[1] == "" && $error[2] == "" && $error[3] == "" && $error[4] == "" && $error[5]) {
    $conn = mysqli_connect('Admin','webPLA','webPLA','portal');
    if(!$conn){
        echo 'Błąd połączenia z bazą danych. ERROR : '.mysqli_connect_error();
    }else{
        echo 'Połączono z bazą danych!';
        echo $_POST['imie'];
        echo $_POST['nazwisko'];
        echo $_POST['login'];
        echo $_POST['email'];
        echo $_POST['haslo'];
        echo $_POST['phaslo'];
    }
}


?>