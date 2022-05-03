<?php
session_start();
include_once(__DIR__ . '/includes/header.php');
?>

<div class="container px-4 px-lg-5 mt-0">
    <div class="container px-4 px-lg-5 my-5 text-center w-75">
        <h2 class="my-5 text-danger">Erreur de processus</h2>
        <div class="container align-auto">
            <div class="bg-light rounded-3 align-auto p-3">
            <?php
            if(!empty($_GET['error'])){
                $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
                $error = $GET['error'];
                ?>
                <p>Malheureusement, pour une raison inconnue la transaction n' a pas fonctionné.</p>
                <p>Merci de <a class="" href="cart.php">réessayer </a> ou de nous contacter par téléphone au :<br><strong>418-111-2222.</strong>
              </p><?php
                echo "Code erreur :  ".$error;

            }else{ ?>
              <p>Malheureusement, pour une raison inconnue la transaction n' a pas fonctionné.</p>
              <p>Merci de <a class="" href="cart.php">réessayer </a> ou de nous contacter par téléphone au :<br><strong>418-111-2222.</strong>
            </p>
            <?php }
          ?>
        </p>
    </div>
</div>
    







