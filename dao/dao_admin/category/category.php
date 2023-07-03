<?php 

    function list_category(){
        $sql = "SELECT * FROM danh_muc";
      return  pdo_query($sql);
    }

    function add_category($categoryName){
        $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES('$categoryName')";
        return pdo_execute($sql);
    }

    function delete_category($id){
        $sql = "DELETE FROM danh_muc WHERE id_danh_muc = $id";
        return pdo_execute($sql);
    }
?>