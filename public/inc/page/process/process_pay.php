<?php 

        include_once('../../../../dao/pdo.php');
        include_once('../../../../dao/dao_customer/order.php');
        include_once('../../../../dao/cart.php');
        include_once('../../../../dao/dao_customer/order.php');
        include_once('./process_codeSale.php');
        require('../../../mail/senmail.php');
    if(!isset($_SESSION['user'])){
        // header('location: ../../../../?');
        $_SESSION['error'] = "<script>alert('Bạn chưa đăng nhập')</script>";
        echo $_SESSION['error'];
        $user = [];
    }else{
        $users = $_SESSION['user'];
        $id_khach_hang = $users['id_khach_hang'];
        $carts = cart_select_all($id_khach_hang);
        
    }
    if(isset($_POST['btn_userPay'])){
        $date = date_format(date_create(),'Y-m-d');
        $ghichu = $_POST['ghichu'];
        $httt = $_POST['pay_ht'];
        $tong_thanh_tien = 0;
        $tongtien = 0;
        $madonhangs = rand(1000,9999);
        // TÍNH TỔNG TIỀN
        foreach($carts as $cart){
            extract($cart);
            if($gia_giam > 0){
                $gia_sp = $gia_giam;
            }else{
                $gia_sp = $gia_san_pham;
            }
            $thanhtien = $gia_sp * $so_luong;
            $tong_thanh_tien += $thanhtien;
        }


        if(isset($_SESSION['gift_code'])){
            $ma_uu_dai = $_SESSION['gift_code'];
            $price = $_SESSION['price'];
            $tongtien = $tong_thanh_tien - $price;
            echo "123";
        }else{
            $ma_uu_dai = '';
            $tongtien = $tong_thanh_tien;
            echo "456";
        }

        // INSERT HÓA ĐƠN
        $orde_data = select_order_all();
        extract($orde_data);
        if($madonhangs == $madonhang){
            $madonhangs = rand(1000,9999);
            insert_order($madonhangs,$id_khach_hang,$tong_thanh_tien,$ma_uu_dai,$tongtien,$httt,$ghichu,$date,0);
        // INSRT HÓA ĐƠN CHI TIẾT
     
            foreach($carts as $cart){
                extract($cart);
                if($gia_giam > 0){
                    $gia_sp = $gia_giam;
                }else{
                    $gia_sp = $gia_san_pham;
                }
                $thanhtien = $gia_sp * $so_luong;
                // echo "$thanhtien";
        
                insert_order_more($madonhangs,$id_san_pham,$so_luong,$thanhtien);
            }
        }else{
            insert_order($madonhangs,$id_khach_hang,$tong_thanh_tien,$ma_uu_dai,$tongtien,$httt,$ghichu,$date,0);
            // INSRT HÓA ĐƠN CHI TIẾT
         
                foreach($carts as $cart){
                    extract($cart);
                    if($gia_giam > 0){
                        $gia_sp = $gia_giam;
                    }else{
                        $gia_sp = $gia_san_pham;
                    }
                    $thanhtien = $gia_sp * $so_luong;
                    // echo "$thanhtien";
            
                    insert_order_more($madonhangs,$id_san_pham,$so_luong,$thanhtien);
                }
        }
        $tieude ="Đặt hàng thành công tại S-FOOD";
        $i=0;
       
        $tongtien;
        $noidung = "
            <table style='border:1px solid #333;border-collapse:collapse'>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
            <tbody>
        ";
        foreach($carts as $cart){
            $i++;
            extract($cart);
            if($gia_giam > 0){
                $gia_sp = $gia_giam;
            }else{
                $gia_sp = $gia_san_pham;
            }
            $thanhtien = $gia_sp * $so_luong;
            $tongtien+=$thanhtien;
        
            $noidung.= "
                        <tr>
                            <td>$i</td>
                            <td>$ten_san_pham</td>
                            <td>$gia_sp</td>
                            <td>$so_luong</td>
                            <td>$thanhtien</td>
                        </tr>
                    
             
            ";
        };
        $noidung.= "
            </tbody>
            <tfoot>
                <td colspan='5' align='right'><strong>Tổng tiền: $tongtien </strong></td>
            </tfoot>
            </table>
        ";

        $email = $_SESSION['user']['email'];
        $ten_kh = $_SESSION['user']['ten'];

        $mail  = new Mailer();
        $mail -> ordermail($tieude,$noidung,$email,$ten_kh);

            delete_cart($id_khach_hang);
            unset($_SESSION['gift_code']);
            unset($_SESSION['price']);
            unset($_SESSION['product_id']);

       header('location: ../../../../?quanly=notiPay');

    }
    

?>