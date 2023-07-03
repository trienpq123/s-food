<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/comment.php');
    if(!isset($_SESSION['user'])){
        header('location: ../../../../?');
    }

    if(isset($_GET['id']) && isset($_GET['id_product'])){
        $id = $_GET['id'];
        $id_product = $_GET['id_product'];
    }else {
        $id = '';
    }

    comment_delete($id);
    header('location: ../../../..?quanly=productDetailt&id='.$id_product);
?>