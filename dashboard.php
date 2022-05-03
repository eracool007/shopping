<?php
//page to manage current orders. More options such as adding and removing products could be implemented.

require 'checklog.php'; 
require_once(__DIR__ . "/configs/db_connect.php");
$db_handle = new DBController();
include_once(__DIR__ . '/includes/header_admin.php');

//check if the order update button has been clicked
if(isset($_POST['select-status'])){
    $newStatus = $_POST['select-status'];
    $tid=$_POST['tid'];
    $queryStatus="UPDATE transactions
    SET STATUS = '$newStatus'
    WHERE transaction_id = '$tid';";
    $db_handle->insertDataQuery($queryStatus);
    header('Location: dashboard.php');
    exit();
}

//fetch all transactions
$transaction_array = $db_handle->runQuery("
SELECT * FROM transactions AS t
left JOIN customers AS c
ON t.customer_id = c.id 
ORDER BY t.created_at ASC");
?>

<!--current order transactions-->
<section class="py-2">
    <div class="container px-4 px-lg-5">
    <h3 class="py-4 show" id="active_orders">Commandes en attente <span id="number_of_orders" class="noo"></></h3>
    <?php
    $count=0;
        if(!empty($transaction_array)){
            
            foreach($transaction_array as $key => $value) {
                
                if(($transaction_array[$key]['status'] !=="COMPLETE") && ($transaction_array[$key]['status'] !=="ANNULEE")){
                    $count++;
                    
                    $productArray = unserialize($transaction_array[$key]["product"]);
                    $transId= $transaction_array[$key]["transaction_id"];
                    $transCustomerId = $transaction_array[$key]["customer_id"];
                    
                    $transTotalAmount = $transaction_array[$key]["amount"];
                    $transStatus = $transaction_array[$key]["status"];
                    $transDate = $transaction_array[$key]["created_at"];
                    $transNotes = $transaction_array[$key]["notes"] ;
                    $transFirstname = $transaction_array[$key]["firstname"] ;
                    $transLastname = $transaction_array[$key]["lastname"];
                    $transEmail = $transaction_array[$key]["email"];
                    $transTelephone = $transaction_array[$key]["telephone"];
                    ?>
                    <div class="container d-info pt-3">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="telephone">Téléphone</th>
                                <th scope="col" class="text-end">Status</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $transFirstname; ?></td>
                                <td><?php echo $transLastname; ?></td>
                                <td><?php echo $transTelephone; ?></td>
                                <td class="text-end">
                                
                                <!--order update section-->
                                <form action="" method="post">
                                    <select name="select-status" onChange="changeBtnColor('<?php echo $key; ?>')">
                                    <?php echo $transStatus; ?>
                                    <option value="COMMANDE" <?php if($transStatus =="COMMANDE"){ ECHO " selected"; } ?> >COMMANDE</option>
                                    <option value="PRETE" <?php if($transStatus =="PRETE"){ ECHO " selected"; } ?> >PRETE</option>
                                    <option value="COMPLETE" <?php if($transStatus =="COMPLETE"){ ECHO " selected"; } ?> >COMPLETE</option>
                                    <option value="ANNULEE" <?php if($transStatus =="ANNULEE"){ ECHO " selected"; } ?>>ANNULEE</option>
                                    </select>
                                    <input type="hidden" name="tid" id="tid" value="<?php echo $transId; ?>" />
                                    <input class="btn btn-secondary" type="submit" name="btn-status" value="Mettre à jour" id="<?php echo $key ?>"/>
                                </form>
                                </td>
                            </tr>
                        </table>    
                        <div>
                            <hr>
                            <table class="table  table-borderless">
                                <thead>
                                    <tr>
                                    <th scope="col" class="w15">Qty</th>
                                    <th scope="col" class="w85">Item</th>
                                
                                    </tr>
                                </thead>
                            <?php
                            foreach($productArray as $key => $value) { ?>
                                <tr>
                                    <td>
                                    <?php
                                    echo $productArray[$key]["qty"]; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $productID = $productArray[$key]['productID'];
                                    
                                        //get product name
                                        $productName = $db_handle->runQuery("
                                        SELECT productName FROM tbproducts
                                        WHERE idProduct = $productID");
                                        echo $productName[0]['productName']; ?> 
                                    </td> 
                                </tr>
                            <?php } ?>
                            <tr><td colspan="2">
                                <?php
                                if($transNotes !=""){
                                    ?><span class="notes">NOTES: &nbsp;</span><i><?php echo $transNotes; ?></i><?php
                                }?>
                                </td>
                            </tr>
                            </table>
                        </div>   
                    </div> 
                    <?php
                } 
            }
        } 
        if ($count==0) { 
            echo '<script>','toggle_item("active_orders");',
                '</script>';
            ?>
            <div class="container px-4 px-lg-5 mt-0">
            <div class="container px-4 px-lg-5 my-5 text-center w-75">
                <div class="container align-auto">
                    <div class="bg-light rounded-3 align-auto p-3">
                    <p><h3 class="py-4" id="no_active_order">Aucune commande active</h3></p>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }else{
        //print number of orders
        echo '<script>', 'print_no('.$count.');','</script>';
    }
    ?>
    </div>
</section>    
</body>
</html>

