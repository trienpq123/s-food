<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    delete_category($id);
    header('location: ?quanly=category');

?>