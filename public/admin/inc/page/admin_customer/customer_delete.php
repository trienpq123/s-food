<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    
    customer_delete($id);

    header('location: ?quanly=customer');

?>