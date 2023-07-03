<?php 
    function find_user(){
        $sql = "SELECT * FROM khach_hang";
        return pdo_query($sql);
    }

    function update_password($password,$id){
        $sql = "UPDATE khach_hang SET pass = '$password' where id_khach_hang = $id";
        return pdo_execute($sql);
    }

    function find_user_one($id){
        $sql = "SELECT * FROM khach_hang where id_khach_hang = $id";
        return pdo_query_one($sql);
    }
?>