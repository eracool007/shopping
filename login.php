<?php
//user email: boss@example.com, password: 1234

//Process login

session_start();
include_once(__DIR__ . '/includes/header_admin.php');

if(isset($_POST['email'])){
    require "configs/user-lib.php";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $USR->login($email, $_POST['password']);
}
//Redirect if logged in
if(isset($_SESSION['user'])){
    header('location:dashboard.php');
    exit();
}
?>
<section class="py-2">
            
<div class="container px-4 px-lg-5 mt-0">
    <div class="container px-4 px-lg-5 my-5">
      <!--Login form-->
        <div class="container text-left mt-2 w80 payment">
            <div class="container align-auto">
                <h2  class="pt-3 pb-4">Connection au tableau de bord</h2>    
                <?php
                    if(isset($_POST['wrong'])){
                        echo '<p class="text-danger">Mauvais courriel ou mot de passe</p>';
                    }
                    
                ?>
                <form  id = "login" class="row g-3 CheckoutForm" method="post">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Courriel</label>
                            <input type="email" class="form-control"  name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                            
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn custom-bg-color text-light my-1 hover-green mb-4"> Accéder</button>
                            <input type="hidden" name="wrong" value="wrong" />
                        </div>  
                    </form>       
                <div> 
        </div>    
    </div>
</div>
</section>