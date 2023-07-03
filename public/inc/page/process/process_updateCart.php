<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/product_load.php');
    include_once('../../../../dao/cart.php');
    if(!isset($_SESSION['user'])){
        header('location: ../../../../?');
    }

    if(isset($_POST['btn_updateCart'])){
        $product_code = [];
        $product_quality = [];
        $id_khach_hang = $_SESSION['user']['id_khach_hang'];
        for($i = 0; $i < count($_POST['sp_code']); $i++){
            $product_ma = $_POST['sp_code'][$i];
            $product_soluong = $_POST['sp_quality'][$i];
            

            product_update($product_soluong,$product_ma,$id_khach_hang);



            
            // $_SESSION['cart'] = $product;
            // var_dump($_SESSION['cart']);

        }
        header('location: ../../../../?quanly=userCart&id='.$_SESSION['user']['id_khach_hang']);
    }
?>