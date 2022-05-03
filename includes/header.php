<?php
    
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
     if(!empty($_GET["action"])) {

        function countItems(){
            $numofitems = 0;
                    foreach ($_SESSION["cart_item"] as $item){
                        $numofitems = (int)$numofitems + (int)$item["quantity"];
                    }
                    if($numofitems==0){
                        unset($_SESSION["cart_item"]);	
                    }
        }
         
        switch($_GET["action"]) {
            case "add":
                if(!empty($_POST["quantity"])) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM tbproducts WHERE idProduct='" . $_GET["code"] . "'");
                    $itemArray = array($productByCode[0]["idProduct"]=>array('idProduct'=>$productByCode[0]["idProduct"], 'productName'=>$productByCode[0]["productName"],  'image'=>$productByCode[0]["image"], 'price'=>$productByCode[0]["prix"], 'quantity'=>$_POST["quantity"]));
                }
                if(!empty($_SESSION["cart_item"])) {
                   
                    //if (in_array($productByCode[0]["idProduct"],array_keys($_SESSION["cart_item"]))) {
                    $itemid = array_column($_SESSION["cart_item"], "idProduct");
                    if(in_array($productByCode[0]["idProduct"],$itemid)){
                        foreach($_SESSION["cart_item"] as $k => $v) {
                          
                           //$productDetail["productId"] == $v['id']) 
                            if((int)($productByCode[0]["idProduct"]) == (int)$v["idProduct"]) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
                break;
            case "remove":
                if(!empty($_SESSION['cart_item'])) {
                    // $k: key, $v:value
                    foreach($_SESSION['cart_item'] as $k => $v) {
                        if($_GET["code"] == $_SESSION["cart_item"][$k]["idProduct"]) {
                            unset($_SESSION["cart_item"][$k]);	
                        }
                    }
                }
                countItems();
                break;
            case "addone":
                if(!empty($_SESSION['cart_item'])) {
                        
                    // $k: key, $v:value
                    foreach($_SESSION['cart_item'] as $k => $v) {
                        if($_GET["code"] == $_SESSION["cart_item"][$k]["idProduct"]) {
                           $_SESSION["cart_item"][$k]["quantity"] ++ ;	
                        }
                    }
                }
                break;
            case "removeone":
                    if(!empty($_SESSION['cart_item'])) {
                            
                        // $k: key, $v:value
                        foreach($_SESSION['cart_item'] as $k => $v) {
                            
                            if($_GET["code"] == $_SESSION["cart_item"][$k]["idProduct"]) {
                                if($_SESSION["cart_item"][$k]["quantity"] =="1" ) {
                                    if($_GET["code"] == $_SESSION["cart_item"][$k]["idProduct"]) {
                                        unset($_SESSION["cart_item"][$k]);	
                                    }
                                }else{
                                    $_SESSION["cart_item"][$k]["quantity"] -- ;
                                }
                            }
                        }
                    }
                    countItems();
                    break;
            case "empty":
                unset($_SESSION["cart_item"]);	
                
                break;
         } 
        }              
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="VBox - Repas préparés entièrement véganes" />
        <meta name="author" content="Caroline fontaine, Développeuse web" />
        <title>VBox - Repas préparés entièrement véganes</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light custom-bg-color">
            <!--bg-light-->
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-light" href="http://localhost/shopping">VBox</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">À propos</a></li>
                    </ul>
                    <form class="d-flex">
                        <div class="cart-link">
                        <a href="cart.php" class="cart-link" ><i class="bi-cart-fill me-1"></i>Panier</a>
                        <span class="badge bg-light ms-1 rounded-pill item-no">
                        <?php
                            if(!empty($_SESSION["cart_item"])) {
                                $numofitems = 0;
                                $counter = 0;
                                foreach ($_SESSION["cart_item"] as $item){
                                    $numofitems = (int)$numofitems + (int)$item["quantity"];
                                    
                                }
                                echo $numofitems;
                            } else {
                                echo "0";
                            }
                            ?>               
                        </span>
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
                    <p class="lead fw-normal text-white-50 mb-0">Manger végane n'a jamais été aussi facile!</p>
                </div>
            </div>
        </header>