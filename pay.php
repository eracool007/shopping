<?php
session_start();
require_once(__DIR__ . "/configs/db_connect.php");
$db_handle = new DBController();
include_once(__DIR__ . '/includes/header.php');
$total_price = $_POST['total_price']*100;
?>    

<section class="py-2">
            
<div class="container px-4 px-lg-5 mt-0">
    <div class="container px-4 px-lg-5 my-5">
        <h2 class="my-5">Information pour la cueuillette</h2>
        <!-- Product price-->
        <h5 class="fw-bolder my-4 text-center">Lieu de cueuillette: 123, RUE DU PAPE, QUÉBEC, QC, G1C 0R0</h5>
        <div class="container align-auto">
            <div class="d-info align-auto p-3">
                <p>Toutes les commandes transmises avant le vendredi soir minuit seront disponibles pour la cueuillette de midi à 21h le lundi suivant.<br><br>
            
                Toutes les commandes transmises avant le mardi soir minuit seront disponibles pour la cueuillette de midi à 21h le vendredi suivant.</p>
            </div>
        </div>
        <!--formulaire de commande-->
        <div class="container text-left mt-2 w80 payment">
            <div class="container align-auto">
                <h2  class="pt-3 pb-4">Formulaire de commande et de paiement</h2>    
                <form  action="<?php echo htmlspecialchars('./charge.php'); ?>" class="row g-3 CheckoutForm" method="post" id="payment-form">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control"  name="firstname" required>
                        </div>

                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Nom de famille</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Courriel</label>
                            <input type="email" class="form-control"  name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input id="phone" class="form-control" type="telephone" placeholder="ex: 123-456-1111" name="telephone" required>
                        </div>
                        
                        <div class="col-12">
                            <label for="info" class="form-label">Information supplémentaire</label>
                            <textarea class="form-control" type="text" maxlength="255" placeholder="Notes spéciales avant la cueuillette à notre comptoir (Par exemple: allergies alimentaires) - Maximum 255 caractères" name="notes"></textarea>
                        </div>
                    
                        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>" >

                        <div class="row">
                            <div class="form-row align-auto p-3">
                                <h5 class="pb-3 orange">Montant de la commande: <?php echo number_format((float)$_POST['total_price'], 2) . " $ CA"; ?></h5>
                                <label for="card-element">Veuillez entrer l'information relative à votre carte de crédit pour effectuer le paiement</label>
                                <div id="card-element" class="form-control my-3">
                                
                                <!-- a Stripe Element will be inserted here. -->

                                <!--Stripe.js injects the Payment Element-->
                                </div>
                    
                                </div>
                                <div id="card-errors" ></div>
                                <button type="submit" class="btn custom-bg-color text-light my-1 hover-green mb-4">
                                <div class="spinner hidden" id="spinner"></div>
                                Payer maintenant &nbsp<i class="bi bi-credit-card-2-back"></i></button>
                            
                            </div>
                        </div>
                    </form>       
                <div> 
        </div>    
    </div>
</div>
</section>
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/validation.js" defer></script>
    <script src="js/charge.js" defer></script>
</BODY>
</HTML>