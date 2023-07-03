<?php 
        session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/product_load.php');
    include_once('../../../../dao/dao_customer/order.php');
    if(isset($_GET['id'])){
        $id  = $_GET['id'];
    }else{
        $id = '';
    }

    delete_order($id);
    delete_orders($id);
    header('location: ../../../../?quanly=userOrder');
?>