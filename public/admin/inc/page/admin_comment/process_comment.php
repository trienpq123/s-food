<?php
    session_start();
    include_once('../../../../../dao/pdo.php');
    include_once('../../../../../dao/comment.php');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $id = '';
        }
        
        comment_update($id);

        header('location: ../../../?quanly=comment&id='.$id);


    
?>