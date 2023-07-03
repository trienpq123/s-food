<?php
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/cart.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(!isset($_SESSION['user'])){
        // header('location: ../../../../?');
    }else{
        $id_kh = $_SESSION['user']['id_khach_hang'];
       delete_one_cart($id,$id_kh);
       header('location: ../../../../?quanly=userCart');
    }

?>