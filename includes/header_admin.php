<?php

if(isset($_POST['logout'])){
    unset($_SESSION['user']);
}
     
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="VBox - Repas préparés entièrement véganes" />
        <meta name="author" content="Caroline fontaine, Développeuse web" />
        <title>VBox - Tableau de bord</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <script src="js/scripts.js"></script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light custom-bg-color">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="https:www.caroline-fontaine.com/shopping">VBox</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Commandes courantes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Produits</a></li>
                    </ul>
                    <form class="d-flex">
                        <!--<div class="btn btn-outline-light">-->
                            <a href="index.php" class="cart-link" >Quitter &nbsp;<i class="bi bi-box-arrow-right"></i>
                            </a> 
                                                        
                            </div>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5 header-style">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-left text-white">
                    <h1 class="display-4 fw-bolder">VBox - Boîtes gourmet</h1>
                    <p class="lead fw-normal text-white-50 mb-0">TABLEAU DE BORD </p>
                    <?php if(isset($_SESSION['user'])){ 
                    echo "Bonjour " . $_SESSION['user']['prenom'] . "!"; 
                }?>
                </div>
             </div>
        </header>
