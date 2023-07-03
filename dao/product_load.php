<?php 

    function product_load_top3(){
        $sql = "SELECT * FROM bang_san_pham WHERE 1 ORDER BY id_san_pham DESC limit 0,3";

        return pdo_query($sql);
    }

    function product_loadAll_category(){
        $sql = "SELECT * FROM danh_muc";
        return pdo_query($sql);
    }

    function product_load_all_one(){
        $sql =" SELECT a.* , b.gia_giam , b.ngay_het_han FROM bang_san_pham a 
                                            left join bang_giam_gia b on a.id_san_pham = b.id_san_pham
                ORDER BY a.id_san_pham DESC";
        return pdo_query($sql);
    }

    function product_loadAll(){
        $sql = "SELECT * FROM bang_san_pham";
        return pdo_query($sql);
    }

    function product_load_hot_top3(){
        $sql = "SELECT * FROM bang_san_pham  WHERE hot_san_pham=1 ";
        return pdo_query($sql);
    }

    function product_sale(){
        $sql = "SELECT a.*,d.ngay_het_han, d.gia_giam FROM bang_san_pham a 
                                                                            left join bang_giam_gia d on a.id_san_pham = d.id_san_pham
                 where a.hot_san_pham = 1 ORDER BY a.id_san_pham DESC LIMIT 0,3";
        return pdo_query($sql);
    }

    function product_loading_food_top_3(){
        $SQL = "SELECT a.*,e.gia_giam,e.ngay_het_han FROM bang_san_pham a left join bang_giam_gia e on a.id_san_pham = e.id_san_pham
  
                                                                            left join danh_muc c on a.id_danh_muc = c.id_danh_muc
                 WHERE a.id_danh_muc = 7 
                ORDER BY a.id_san_pham DESC LIMIT 0,3";
        return pdo_query($SQL);
    }

    function product_loading_water_top_3(){
        $SQL = "SELECT a.*,e.gia_giam,e.ngay_het_han FROM bang_san_pham a left join bang_giam_gia e on a.id_san_pham = e.id_san_pham
                
                                                                            left join danh_muc c on a.id_danh_muc = c.id_danh_muc
                WHERE a.id_danh_muc = 9 
                ORDER BY a.id_san_pham DESC LIMIT 0,3";
        return pdo_query($SQL);
    }


    // TÌM SẢN PHẨM QUA TỪ KHÓA SEARCH 

    function product_search($word){
        $sql = "SELECT a.* , b.gia_giam, b.ngay_het_han FROM bang_san_pham a left join bang_giam_gia b on a.id_san_pham = b.id_san_pham
                                                left join danh_muc c on a.id_danh_muc = c.id_danh_muc WHERE a.ten_san_pham LIKE '%$word%'";
        return pdo_query($sql);
    }

    // CHI TIẾT SẢN PHẨM
    
    function product_detail($id){
        $sql =" SELECT a.* , d.gia_giam , d.ngay_het_han FROM bang_san_pham a
                                                                                    left join bang_giam_gia d on a.id_san_pham = d.id_san_pham
                where a.id_san_pham = $id";
      return  pdo_query_one($sql);
    }
    
    // GIẢM GIÁ SẢN PHẨM

    function product_discount($code){
        $sql = "SELECT a.*, b.ma_uu_dai, c.gia_uu_dai,c.ngay_het_han FROM bang_san_pham a left join chi_tiet_uu_dai b on a.id_san_pham = b.id_san_pham
                                                left join uu_dai_san_pham c on b.ma_uu_dai = c.ma_uu_dai
                WHERE b.ma_uu_dai = '$code';
                ";
        return pdo_query($sql);
    }


    // LOAD SẢN PHẨM LIÊN QUAN
    function product_relation($id){
        $sql  = "SELECT a.* , d.gia_giam , d.ngay_het_han FROM bang_san_pham a 
                                                left join bang_giam_gia d on a.id_san_pham = d.id_san_pham
                where a.id_danh_muc = $id" ;
        return pdo_query($sql);
    }

  
    // giảm giá sản phẩm

    function product_reduce($id_sp,$gia_sp,$date){
        $sql = "INSERT INTO bang_giam_gia(id_san_pham,gia_giam,ngay_het_han) VALUES($id_sp,$gia_sp,'$date')";
        return pdo_execute($sql);
    }

    FUNCTION product_updateReduce($id,$gia_giam,$ngay_het_han){
        $sql = "UPDATE bang_giam_gia SET
                                        gia_giam = $gia_giam,
                                        ngay_het_han = '$ngay_het_han'
                WHERE id_san_pham = $id;
            ";
        return pdo_execute($sql);
    }

    function product_reduce_delete($id){
        $sql = "DELETE FROM bang_giam_gia where id_san_pham = $id";
        return pdo_execute($sql);
    }

    function product_reduce_one($id){
        $sql = "SELECT * FROM bang_giam_gia where id_san_pham = $id";
        return pdo_query_one($sql);
    }


    // THÊM MÃ GIẢM GIÁ

    function code_insert($ma_uu_dai,$gia_uu_dai,$ngay_het_han){
        $sql = "INSERT INTO uu_dai_san_pham VALUES('$ma_uu_dai',$gia_uu_dai,'$ngay_het_han')";
        return pdo_execute($sql);
    }

    function code_insert_product($ma_uu_dai,$id_san_pham){
        $sql ="INSERT INTO chi_tiet_uu_dai VALUES(null,'$ma_uu_dai',$id_san_pham)";
        return pdo_execute($sql);
    }

    function code_delete($id){
        $sql = "DELETE FROM uu_dai_san_pham where ma_uu_dai = '$id' ";
        return pdo_execute($sql);
    }

    function code_productdelete($code,$id){
        $sql = "DELETE FROM chi_tiet_uu_dai where ma_uu_dai = '$code'  AND id_san_pham = $id";
        return pdo_execute($sql);
    }

    function code_productupdate($code,$mauudai,$giauudai,$date){
        $sql = "UPDATE uu_dai_san_pham SET ma_uu_dai = '$mauudai',
                                            gia_uu_dai = $giauudai,
                                            ngay_het_han = '$date'
                WHERE ma_uu_dai = '$code'
                ";
        return pdo_execute($sql);
    }


    function code_update($code,$mauudai,$id){
        $sql = "UPDATE chi_tiet_uu_dai SET ma_uu_dai = '$mauudai',
                                            id_san_pham = $id
                                          
                WHERE ma_uu_dai = '$code'
                ";
        return pdo_execute($sql);
    }

    function select_one_code($code){
        $sql = "SELECT * FROM uu_dai_san_pham a inner join chi_tiet_uu_dai b on a.ma_uu_dai = b.ma_uu_dai  
                WHERE  a.ma_uu_dai = '$code'
                ORDER BY a.ngay_het_han DESC";
        return pdo_query($sql);
    }

    function select_all_listCode(){
        $sql = "SELECT * FROM uu_dai_san_pham ORDER BY ngay_het_han DESC";
        return pdo_query($sql);
    }

    function select_all_giftcode_product($code){
        $sql = "SELECT * FROM chi_tiet_uu_dai a inner join bang_san_pham b on a.id_san_pham = b.id_san_pham
                where a.ma_uu_dai = '$code'
                 ";
        return pdo_query($sql);
    }

    function select_giftcode_one($code){
        $sql = "SELECT * FROM uu_dai_san_pham where ma_uu_dai = '$code'";
        return pdo_query_one($sql);
    }

    function select_all_detailtcode($code){
        $sql = "SELECT * FROM chi_tiet_uu_dai where ma_uu_dai = '$code'";
        return pdo_query_one($sql);
    }
?>