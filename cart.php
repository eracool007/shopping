<?php
session_start();
require_once(__DIR__ . "/configs/db_connect.php");
//$db_handle = new DBController();
include_once(__DIR__ . '/includes/header.php');

if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	

<div class="container mt-5 mb-3">                
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="m-b-30">
                <div class="card-header custom-bg-color text-light">
                    <h5 class="card-title">Mon panier</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="cart-container">
                            <div class="cart-head">
                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle">
                                        <thead>
                                            <tr>
                                                <th class="mw25"></th>    
                                                <th class="col-photo"></th>
                                                <th>Produit</th>                                               
                                                <th class="mw25"></th>
                                                <th class="text-center">Qté</th>
                                                <th></th>
                                                <th class="text-end">Prix unitaire</th>
                                                <th class="text-end">Total</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        <?php		
                                        foreach ($_SESSION["cart_item"] as $item){
                                            $item_price = $item["quantity"]*$item["price"]; ?>
                                                <tr>
                                                    <td class="text-center mw25">
                                                        <form action="cart.php?action=remove&code=<?php echo $item["idProduct"]; ?>" method="post">
                                                        <button type="submit" class="no-button" name="btnRemove">
                                                            <a href="index.php?action=remove&code=<?php echo $item["code"]; ?>"><i class="cart-action bi bi-trash"></i></a></button>
                                                        </form>
                                                    </td>
                                                    <td class="col-photo text-center"><img src="assets\<?php echo $item["image"]; ?>" class="img-fluid rounded cart-img" alt="<?php echo $item["productName"]; ?>"></td>
                                                    <td class="text-start"><?php echo $item["productName"]; ?>
                                                    </td>
                                                    
                                                    <td class="text-center mw25">
                                                    <form action="cart.php?action=removeone&code=<?php echo $item["idProduct"]; ?>" method="post">
                                                        <button type="submit" class="no-button" name="btnAddone">
                                                            <a href="index.php?action=removeone&code=<?php echo $item["code"]; ?>"><i class="cart-action bi bi-dash-circle-fill"></i></i></a></button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo $item["quantity"]; ?>
                                                    </td>
                                                    <td class="text-center mw25">
                                                        <form action="cart.php?action=addone&code=<?php echo $item["idProduct"]; ?>" method="post">
                                                        <button type="submit" class="no-button" name="btnAddone">
                                                            <a href="index.php?action=add&code=<?php echo $item["code"]; ?>"><i class="cart-action bi bi-plus-circle-fill"></i></a></button>
                                                        </form>
                                                    </td>
                                                    <td class="text-end"><?php echo $item["price"]."$"; ?></td>
                                                    <td class="text-end"><?php echo number_format($item_price,2)."$"; ?></td>
                                                </tr>
                                        <?php 
                                            $total_quantity += $item["quantity"];
                                            $total_price += ($item["price"]*$item["quantity"]);
                                        }
                                        $tps=$total_price*5/100;
                                        $tvq=($total_price+$tps)*9.975/100;    
                                        $grand_total = $total_price + $tps+$tvq;
                                        ?>                                                
                                                </tr>
                                                    <tr>
                                                        <td colspan="8" class="text-end"><hr class="hr-style"> </td>
                                                    </tr>
                                        </tbody>
                                    </table>
                                    <table  class="table-borderless align-middle w100">
                                        <tbody>
                                            <tr class="w100">
                                                <td class="text-end">Nombre d'articles: <?php echo $total_quantity; ?></td></tr>
                                            <tr class="w100">
                                                <td class="text-end">Total avant taxes: <?php echo number_format($total_price,2)."$"; ?></td>
                                            </tr>
                                            <tr class="w100">
                                            <td class="text-end">Total tps: <?php echo number_format($tps,2)."$"; ?></td>
                                            
                                            </tr>
                                            <tr class="w100">
                                            <td class="text-end">Total tvq: <?php echo number_format($tvq,2)."$"; ?></td>
                                            
                                            </tr class="w100">
                                            <td class="text-end"><strong>Grand total: <?php echo number_format($grand_total,2)."$"; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cart-btn-section">
                            <form action="pay.php" method="post" id="pay-form">     
                                    <a id="btnEmpty" href="index.php?action=empty" class="btn btn-danger my-1"><i class="bi bi-cart-x-fill"></i>&nbsp Vider mon panier</a>
                                    
                                    <a id="btncontinue" href="index.php" class="btn custom-bg-orange text-light my-1"></i>&nbsp Continuer à magasiner</a>

                                    <input type="hidden" name="total_price" value="<?php echo number_format($grand_total,2) ?>" >
                                    
                                    <button type="submit" class="btn custom-bg-color text-light my-1 hover-green">Passer à la caisse &nbsp<i class="bi bi-arrow-right"></i></button>
                            </form>
                        </div>  
                        <!--If empty cart-->
                        <?php } else{ ?>
                        <div class="container mt-5 mb-3">                
                        <div class="contentbar">
                        <div class="row">
                            <!-- Start col -->
                            <div class="container px-4 px-lg-5">
                                <div class="card m-b-30">
                                    <div class="card-header custom-bg-color text-light">
                                        <h5 class="card-title">Mon panier</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="cart-head text-center mt-5">
                                                Votre panier est vide
                                            </div>
                                            <div class="cart-footer text-center m-5">
                                                <a href="index.php" class="btn custom-bg-orange text-light my-1"><i class="bi bi-arrow-left"></i></i> &nbsp Retour à l'accueil</i></a>
                                            </div>      
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
<?php
} ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once(__DIR__ . '/includes/footer.php');
 ?>      
