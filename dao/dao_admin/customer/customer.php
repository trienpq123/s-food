<?php 
    function customer_load(){
        $sql = "SELECT * FROM khach_hang where vai_tro = 0";
        return pdo_query($sql);
    }

    function customer_loadAll(){
        $Sql = "SELECT * FROM khacn_hang";
        return pdo_query($Sql);
    }

    function customer_delete($id){
        $sql = "DELETE FROM khach_hang where id_khach_hang = $id";
        return pdo_execute($sql);
    }

    function customer_one($id){
        $sql ="SELECT * FROM khach_hang where id_khach_hang = $id ";
        return pdo_query_one($sql);
    }

    function customer_vaitro($id,$vai_tro){
        $sql ="UPDATE khach_hang SET vai_tro = $vai_tro WHERE id_khach_hang = $id";
        return pdo_execute($sql);
    }

    function customer_update($id,$firstname,$lastname,$address,$sdt,$email,$image){
        $sql =  "UPDATE khach_hang SET
                                    ho_ten = '$firstname',
                                    ten = '$lastname',
                                    dia_chi = '$address',
                                    sdt = '$sdt',
                                    email = '$email',
                                    hinh = '$image'
                    WHERE id_khach_hang = $id
                ";
        return pdo_execute($sql);
    }
?>