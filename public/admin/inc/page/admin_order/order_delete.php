<?php 
    session_start();
    include_once('../../../../../dao/pdo.php');
    include_once('../../../../../dao/dao_customer/order.php');
    if(isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1){
        $madonhang = $_GET['madonhang'];
        delete_order($madonhang);
        delete_orders($madonhang);
        header('location: ../../../?quanly=order');
    }
?>