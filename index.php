<?php
session_start();
require_once(__DIR__ . "/configs/db_connect.php");
$db_handle = new DBController();
include_once(__DIR__ . '/includes/header.php');
?>
         <!-- Section-->
         <section class="py-5">
            <div class="container px-4 px-lg-5 mt-2">
                <div class="row gx-4 gx-lg-5 row-cols-2 justify-content-left">
                    <h2>Tous nos produits</h2>
                </div>
            </div>
        </section>
        <!-- Section-->
        <section class="py-2">
            <div class="container px-4 px-lg-5 mt-0">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!--Product card-->
                    <?php
                        $product_array = $db_handle->runQuery("SELECT * FROM tbproducts ORDER BY idProduct ASC");
                        if(!empty($product_array)){
                            foreach($product_array as $key => $value) {
                                //if null in inventory, the item will not show
                                if($product_array[$key]['inventaire']){
                                ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        
                                    <form action="index.php?action=add&code=<?php echo $product_array[$key]["idProduct"]; ?>" method="post">
                                        <!-- Product image-->
                                        <img class="card-img-top" src="assets\<?php echo $product_array[$key]["image"]; ?>" alt="<?php echo $product_array[$key]["productName"]; ?>" />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder"><?php echo $product_array[$key]["productName"] ; ?></h5>
                                                <!-- Product price-->
                                                <p><?php echo $product_array[$key]["prix"]; ?>$</p>
                                                <!-- Product description-->
                                                <p><?php echo $product_array[$key]["description"]; ?></p>
                                            </div>
                                        </div>
                                        
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-outline-dark" name="btnAdd" value="Ajouter au panier"/>
                                            </div>
                                            <input type="hidden" name="quantity" value="1" size="2" />
                                        </div>
                                    </form>        
                                </div>
                              </div>
                                <?php
                                }
                            }
                        } ?>  
                </div>
        </section>
 <?php
 include_once(__DIR__ . '/includes/footer.php');
 ?>      
