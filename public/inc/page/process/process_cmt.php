<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/comment.php');
    if(!isset($_SESSION['user'])){
        header('location: ../../../../?');
    }else{
        if(isset($_GET['id_product'])){
            $id_sp = $_GET['id_product'];
        }else {
            $id_sp = '';
        }
        if(isset($_POST['btn_cmt'])){
            $text = $_POST['cmt_text'];
            $id_kh = $_SESSION['user']['id_khach_hang'];
            $date = date_format(date_create(),'Y-m-d');
            comment_add($text,$id_sp,$id_kh,$date);
            header('location: ../../../../?quanly=productDetailt&id='.$id_sp);
        }
    }
?>