<?php 
    function product__add($product_name,$product_price,$product_image,$product_des,$product_hot,$product_category){
        $sql = "INSERT INTO bang_san_pham(ten_san_pham,gia_san_pham,hinh_anh,mo_ta,hot_san_pham,id_danh_muc)
                        VALUES('$product_name',$product_price,'$product_image','$product_des',$product_hot,$product_category);
                ";
        return pdo_execute($sql);
    };

    function product_load(){

        $sql = "SELECT * FROM bang_san_pham a  left join bang_giam_gia b on a.id_san_pham = b.id_san_pham  ";
        return pdo_query($sql);
    }

    function product_load_one($id){
        $sql = "SELECT * FROM bang_san_pham WHERE id_san_pham = $id";
        return pdo_query_one($sql);
    }

    function product_update($productName,$productPrice,$productImage,$productDes,$productHot,$productCategory,$id){
        $sql = "UPDATE bang_san_pham SET
                                    ten_san_pham = '$productName',
                                    gia_san_pham = $productPrice,
                                    hinh_anh = '$productImage',
                                    mo_ta = '$productDes',
                                    hot_san_pham = $productHot,
                                    id_danh_muc = $productCategory
                WHERE id_san_pham = $id
                ";
      return   pdo_execute($sql);
    }


    function product_delete_one($id){
        $sql = "DELETE FROM bang_san_pham WHERE id_san_pham = $id";
        return pdo_execute($sql);
    }

    function product_all_reduce(){
        $sql = "SELECT * FROM bang_giam_gia a inner join bang_san_pham b on a.id_san_pham = b.id_san_pham ORDER BY a.id_giam_gia DESC";
        return pdo_query($sql);
    }






    

    
?>