<?php 
    session_start();
    include_once('../../../../../dao/pdo.php');
    include_once('../../../../../dao/product_load.php');
    include_once('../../../../../dao/dao_admin/product/product__add.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }

    product_reduce_delete($id);
    header('location: ../../?quanly=product_listReduce');
?>