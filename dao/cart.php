<?php 
  // THÊM GIỎ HÀNG

    function product_insert($id_khach_hang,$id_san_pham,$soluong){
        $sql = "INSERT gio_hang VALUES($id_khach_hang,$id_san_pham,$soluong)";
    return pdo_execute($sql);
    }

// UPDATE SỐ LƯỢNG GIỎ HÀNG

    function product_update($soluong,$id_san_pham,$id_khach_hang){
        $sql = "UPDATE gio_hang SET so_luong = $soluong WHERE  id_san_pham = $id_san_pham AND id_khach_hang = $id_khach_hang";
        return pdo_execute($sql);
    }

// SELECT GIO HANG
    function cart_select($id_san_pham,$id_khach_hang){
        $sql = "SELECT * FROM gio_hang where id_san_pham = $id_san_pham AND id_khach_hang = $id_khach_hang";
       return pdo_query($sql);
    }

    function cart_select_all($id_khach_hang){
        $sql = "SELECT a.* , b.* , c.* , d.gia_giam FROM gio_hang a inner join bang_san_pham b on a.id_san_pham = b.id_san_pham 
                                                                    inner join khach_hang c on a.id_khach_hang = c.id_khach_hang
                                                                    left join bang_giam_gia d on a.id_san_pham = d.id_san_pham
                                                                    
                WHERE a.id_khach_hang = $id_khach_hang";
        return pdo_query($sql);
    }


    function cart_promotion(){
        $sql = "SELECT * FROM bang_san_pham a inner join chi_tiet_uu_dai";
       return  pdo_query($sql);
    }

    // DELETE GIỎ HÀNG

    function delete_cart($id_khach_hang){
        $sql = "DELETE   FROM gio_hang where id_khach_hang = $id_khach_hang ";
        return pdo_execute($sql);
        
    }

    function delete_one_cart($id_cart,$id_khach_hang){
        $sql = "DELETE FROM gio_hang where  id_san_pham = $id_cart and id_khach_hang = $id_khach_hang";
        return pdo_execute($sql);
    }

?>