<?php  
    function comment_add($text,$id_sp,$id_kh,$date){
        $sql = "INSERT binh_luan  VALUES(null,$id_sp,$id_kh,'$text','$date',0)";
        return pdo_execute($sql);
    }   

    function comment_delete($id){
        $sql = "DELETE FROM  binh_luan where ma_binh_luan = $id";
        pdo_execute($sql);
    }

    function comment_update($id){
        $sql  = "UPDATE  binh_luan  SET status = 1 WHERE ma_binh_luan = $id";
        return pdo_execute($sql);
    }

    function comment_list($id){
        $sql = "SELECT * from binh_luan a   inner join khach_hang b on a.id_khach_hang = b.id_khach_hang
                                            inner join bang_san_pham c on a.id_san_pham = c.id_san_pham
                WHERE a.id_san_pham = $id and a.status = 1" ;
        return pdo_query($sql);


    }

    function comment_list_all(){
        $sql = "SELECT COUNT(*) as tong_binh_luan , a.* , b.* , c.* FROM binh_luan a  inner join khach_hang b on a.id_khach_hang = b.id_khach_hang
                                                                                        inner join bang_san_pham c on a.id_san_pham = c.id_san_pham
                GROUP BY a.id_san_pham
                ORDER BY a.ma_binh_luan DESC
                ";
        return pdo_query($sql); 
    }

    function comment_list_text($id){
        $sql = "SELECT * FROM binh_luan a  inner join khach_hang b on a.id_khach_hang = b.id_khach_hang
                                                                                    inner join bang_san_pham c on a.id_san_pham = c.id_san_pham
                WHERE a.id_san_pham = $id 
                ORDER BY a.ma_binh_luan DESC";
        return pdo_query($sql);
    }
?>