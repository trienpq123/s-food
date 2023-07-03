<?php 
    function signUp($username,$name,$password,$sdt,$address,$email,$gioitinh){
        
        $sql = "INSERT INTO  khach_hang(ho_ten,ten,pass,gioi_tinh,email,sdt,dia_chi,vai_tro) VALUES('$username','$name','$password',$gioitinh,'$email','$sdt','$address',0)";

       return pdo_execute($sql);
    }
?>