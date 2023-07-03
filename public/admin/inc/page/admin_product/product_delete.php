<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    product_delete_one($id);
    header('location: ?quanly=productList');

?>