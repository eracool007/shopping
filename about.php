<?php
session_start();

include_once(__DIR__ . '/includes/header.php');
?>

<div class="container px-4 px-lg-5 mt-0">
  <div class="container px-4 px-lg-5 my-5 text-center w-80">
      <h2 class="my-5">À propos de ce projet</h2>
      
      <div class="container align-auto">
          <div class="bg-light rounded-3 p-3 text-start">
            <p><h4 class="color-green">Mise en contexte</h4></p>
            <p class="px-4">Suite au cours "Programmation d'une application web transactionnelle" du programme d'études en développement web du Cégep de Saint-Félicien, il nous a été demandé de produire un mini site de commerce électronique. Ce dernier devait contenir au minumum les éléments suivants: </p>
                <div class="px-3">
                <ul>
                    <li>Permettre à l’utilisateur d’ajouter un produit dans le panier.</li>
                    <li>Avoir un tableau avec un aperçu de ce que l’utilisateur à mis dans son panier.</li>
                    <li>Offrir la possibilité de vider tous les éléments du panier.</li>
                    <li>Offrir la possibilité de vider les éléments du panier individuellement.</li>
                    <li>Inclure les informations suivantes au panier:</li>
                    <ul>
                        <li>Le nom de l’article</li>
                        <li>Son prix</li>
                        <li>Les quantités</li>
                        <li>Le total</li>
                    </ul>
                </ul>
                </div>
            <p class="px-4">L'inclusion d'une API de paiement Stripe ou Paypal était facultative.</p>
            
            <p class="px-4">Avec ces objectifs en tête, j'ai conçu le projet <i>Vbox - Boîtes gourmet</i> qui se veut un site fictif de préparation de boîtes repas véganes. Une fois la commande envoyée, le client pourra passer la récupérer selon l'horaire de cueillette établi. </p>
            
            <p><h4 class="color-green mt-5">Description</h4></p>
            
            <p class="px-4"><h5 class="orange">Accueil</h5></p>
            <p class="px-4">Le site, conçu en PHP et utilisant la librairie Bootstrap, compte 2 sections distinctes: la plate-forme d'achat et le tableau de bord pour l'administrateur du site (dans notre cas l'employé en charge des commandes). </p>
            <p class="px-4">Dès la page d'accueil, le client accède à la liste complète des repas disponibles dans l'inventaire (donc non null dans la base de données). Il pourra ainsi ajouter des items dans son panier simplement en cliquant sur le bouton à cet effet. Le nombre d'items indiqués à côté du bouton panier dans la barre de menu sera alors incrémenté. Une fois qu'il aura terminé d'ajouter les items, il pourra visionner son panier en cliquant sur le bouton panier.</p>
            
            <p class="px-4"><h5 class="orange">Panier</h5></p>
            <p class="px-4">Le panier présente tous les items que le client a choisi en incluant une photo pour les écrans de format de plus de 768px.</p>
            <p class="px-4">Il sera possible d'enlever un item en cliquant sur la corbeil, ou d'augmenter et diminuer la quantité en cliquant sur les signes moins et plus. Les totaux seront ajustés en conséquence.</p>

            <p class="px-4">Trois options sont disponibles au bas du panier: Vider le panier, continuer à magasiner ou passer à la caisse.Cette dernière option utilise l'API Stripe pour effectuer le paiement et passer la commande. Le client et la transactions seront ajoutés à la base de données.</p> 
            
            <p class="px-4"><h5 class="orange">Tableau de bord</h5></p>
            <p class="px-4">Le tableau de bord, permet à l'employé en charge des commandes d'accéder au commandes en cours. Pour y accéder, il devra tapper l'adresse puis entrer son courriel et son mot de passe. Pour des raisons de sécurité, le tableau de bord ne permet pas d'ajouter un nouvel utilisateur. </p>

            <p class="px-4">Une fois connecté, l'utilisateur pourra voir un résumé de toutes les commandes en cours qui n'ont pas le status de complété ou annulée. </p>

            <p class="px-4">Il pourra également changer le status de la commande selon l'évolution de la commande. Afin d'éviter les erreurs, le bouton mettre à jour changera de couleur pour mettre à jour le status de la commande (et ainsi confirmer le choix).</p> 

            <p class="px-4">Un bouton de sortie est inclu pour fermer la session.</p>
            
            <p><h4 class="color-green mt-5">Fonctionnalités supplémentaires pouvant être ajoutées</h4></p>
            <p class="px-4">Ce projet permet l'implantation de fonctionnalités supplémentaires selon les besoins qu'auraient l'éventuel client. Par exemple:</p>
            <div class="px-3">
            <ul>
                    <li>Un courriel de confirmation suite au paiement</li>
                    <li>Une description complète des repas</li>
                    <li>La créations et l'enregistrement de comptes utilisateurs pour se rappeler des clients</li>
                    <li>La possibilité à l'adminstrateur de voir toutes les commandes et de faire des recherches</li>
                    <li>La possibilité à l'adminstrateur d'ajouter/enlever/et modifier des produits</li>
                    <li>La possibilité à l'administrateur d'envoyer un courriel au client lorsque la commande est prête à la cueuillette, et ce directement de la plate-forme</li>
                    <li>Sur le tableau de bord de l'administrateur, avoir l'option de trier et compter les produits à préparer</li>
                    <li>L'ajout d'un bouton en cas d'oubli de mot de passe</li>
                </ul>
            </div>
          </div>
          <p class="mt-5"><h5>Technologies utilisées</h4></p>
          <p class="about-min text-secondary">JavaScript, PHP, CSS, Bootstrap, API Stripe, HTML, mySql</p>
          <p><h5>Crédits photos</h4></p>
          <p class="about-min text-secondary">Les photos disponibles sur ce sites provients du site <a class="about-link" href="https://unsplash.com/">Unsplash</a> et des auteurs suivants: <br><a class="about-link" href="https://unsplash.com/@rejoyced?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Joyce</a> | <a class="about-link" href="https://unsplash.com/@ellaolsson?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Ella Olsson</a> | <a class="about-link" href="https://unsplash.com/@charlesdeluvio?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Charles Deluvio</a> | <a class="about-link" href="https://unsplash.com/@yoavaziz?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Yoav Aziz</a> | <a class="about-link" href="https://unsplash.com/@rolandepg?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Rolande PG</a> | <a class="about-link" href="https://unsplash.com/@abhishek_hajare?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">ABHISHEK HAJARE</a> | <a class="about-link" href="https://unsplash.com/@louishansel?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Louis Hansel </a>

       
      </div>
  </div>
</div>
    
