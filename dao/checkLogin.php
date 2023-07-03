<?php 
    // CHECK LOGIN


    function checkEmailLogin($username){
        $sql ="SELECT * FROM khach_hang WHERE email = '$username' ";
        return pdo_query_one($sql);
    }

    
?>