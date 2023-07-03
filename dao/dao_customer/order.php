<?php 

    function insert_order($madonhang,$id_kh,$thanh_tien,$mauudai,$tongtien,$httt,$ghichu,$ngaymua,$trangthai){
        $sql = "INSERT INTO hoa_don VALUES(null,$madonhang,$id_kh,$thanh_tien,'$mauudai',$tongtien,$httt,'$ghichu','$ngaymua',$trangthai)";
        return pdo_execute($sql);
    }

    function insert_order_more($madonhang,$id_sp,$soluong,$thanhtien){
        $sql = "INSERT INTO hoa_don_chi_tiet VALUES(null,$madonhang,$id_sp,$soluong,$thanhtien)";
        return pdo_execute($sql);
    }

    function select_order($id){
        $sql = "    SELECT * from hoa_don_chi_tiet a inner join hoa_don b on a.madonhang = b.madonhang
                    inner join bang_san_pham c on a.id_san_pham = c.id_san_pham
                    where  b.id_khach_hang = $id AND b.trang_thai_hoa_hang = '2';
                ";
        return pdo_query($sql);
    }

    function select_order_wait($id){
        $sql = "    SELECT * from hoa_don_chi_tiet a inner join hoa_don b on a.madonhang = b.madonhang
                    inner join bang_san_pham c on a.id_san_pham = c.id_san_pham
                    where id_khach_hang = $id AND b.trang_thai_hoa_hang = 0 or b.trang_thai_hoa_hang = 1;
                ";
        return pdo_query($sql);
    }

    function select_order_all(){
        $sql = "SELECT * FROM khach_hang a inner join hoa_don b on a.id_khach_hang = b.id_khach_hang";
        return pdo_query($sql);
    }

    function select_code_order($id){
        $sql = "SELECT a.* , b.* , c.trang_thai_hoa_hang FROM bang_san_pham a inner join hoa_don_chi_tiet b on a.id_san_pham = b.id_san_pham
                                                inner join hoa_don c on b.madonhang = c.madonhang
                WHERE b.madonhang  = $id";
        return pdo_query($sql);
    }


    // UPDATE 

    function update_status($madonhang,$status){
        $sql = "UPDATE hoa_don SET trang_thai_hoa_hang = $status WHERE madonhang = $madonhang";
        return pdo_execute($sql);
    }

    // DELETE

    function delete_order($madonhang){
        $sql = "DELETE FROM hoa_don where madonhang = $madonhang";
        return pdo_execute($sql);
    }

    function delete_orders($madonhang){
        $sql = "DELETE FROM hoa_don_chi_tiet where madonhang = $madonhang";
        return pdo_execute($sql);
    }


    // SELECT ORDER
    function select_order_one($madonhang){
        $sql = "SELECT * FROM hoa_don where madonhang = $madonhang";
        return pdo_query($sql);
    }



    function select_order_code($code_sale,$id){
        $sql = "SELECT * FROM hoa_don where ma_uu_dai = '$code_sale' and id_khach_hang = $id";
        return pdo_query($sql);
    }

    


    // DOANH THU

    function  select_showAll_order($madonhang){
        $sql = "SELECT * FROM hoa_don_chi_tiet a inner join bang_san_pham b on a.id_san_pham = b.id_san_pham
                                        inner join hoa_don c on a.madonhang = c.madonhang
                WHERE c.madonhang = $madonhang  ORDER BY c.id_hoa_don DESC";
        return pdo_query($sql);
    }

    function select_thongke($date){
        $sql = "SELECT * FROM thongke where ngaydat = '$date'";
        return pdo_query($sql);
    }

    function update_thongke($donhang,$doanhthu,$soluong,$date){
        $sql = "UPDATE thongke SET donhang = $donhang, doanhthu = '$doanhthu', soluong = $soluong  where ngaydat = '$date'";
        return pdo_execute($sql);
    }
?>