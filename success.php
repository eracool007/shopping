<?php
session_start();
if(!empty($_GET['tid'])){
  $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
  $tid= $GET['tid'];
}else{
  header('location: erreur.php');
}
include_once(__DIR__ . '/includes/header.php');
?>

<div class="container px-4 px-lg-5 mt-0">
  <div class="container px-4 px-lg-5 my-5 text-center w-75">
      <h2 class="my-5">Merci pour votre commande!</h2>
      <!-- Product price-->
      <div class="container align-auto">
          <div class="bg-light rounded-3 align-auto p-3">
            <p><h3>Votre numero de commande est le :  <?php echo $tid; ?></h3></p>
            <p>Pour toute question, vous pouvez nous contacter au: <br><strong>418-111-2222.</strong>
          </div>
      </div>
  </div>
</div>
    

  
