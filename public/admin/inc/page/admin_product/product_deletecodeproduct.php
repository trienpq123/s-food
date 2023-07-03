<?php 
    session_start();
    include_once('../../../../../dao/pdo.php');
    include_once('../../../../../dao/product_load.php');
    include_once('../../../../../dao/dao_admin/product/product__add.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $code = $_GET['code'];
    }else {
        $id = '';
        $code = '';
    }

    code_productdelete($code,$id);
    header('location: ../../../?quanly=product_listCode&id='.$code);

?>