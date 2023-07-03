<?php 
    session_start();
    include_once('../../../../../dao/pdo.php');
    include_once('../../../../../dao/product_load.php');
    if(isset($_POST['btnDiscount'])){
        
        $id = $_POST['id_product'];
        $discount = $_POST['discount'];
        $date = $_POST['date'];

        product_reduce($id,$discount,$date);
        

    }
?>