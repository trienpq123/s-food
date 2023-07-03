
<?php 


    $order_list = select_order_all();

    
?>

<div class="navbars__brand">
    <div class="navbars__brand--title">Quản lý danh mục</div>

</div>

<div class="navbars__sidebars">
    <div class="search__form ">
        
            <div class="form">
                <!-- <form action="" method="post">
                <div class="form-group">
                    <div class="input--search ">
                        <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                        <div class="search--iconl">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                </form> -->
            </div>

            <div class="form__reload">
                <a href="?quanly=order"><i class="fas fa-sync-alt"></i></a>
            </div>
    </div>

   

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày mua</th>
                <th>Hình thức thanh toán</th>
                <th>Trạng thái đơn hàng</th>

            </tr>
        </thead>
        
        <tbody class=""> 
         <?php 
            $category_data = list_category();
            $i = 1;
            foreach($order_list as $order){
                extract($order);
         ?>
            <tr>
                <td><?php echo $madonhang; ?></td>
                <td><?php echo $ho_ten.$ten; ?></td>
                <td><?php echo $tong_tien;?></td>
                <td><?php echo $ngay_mua;?></td>
                <?php 
                    if($hinh_thuc_thanh_toan == 0){
                        echo "<td>Thanh toán tại nhà</td>";
                    }
                    if($trang_thai_hoa_hang == 0){
                        echo "<td>Chưa xử lý</td>";
                    }
                    else if($trang_thai_hoa_hang == 1){
                        echo "<td style='color:#d35'>Đang giao hàng</td>";
                    }else{
                      echo  "<td style='color: #28a745'>Đã xử lý</td>";
                    }
                ?>
               
                <td>
                    <a  href="?quanly=order&madonhang=<?php echo $madonhang; ?>"class="btn btn-primary" id="editProduct">Chi tiết đơn hàng</a>
                    <a href="inc/page/admin_order/order_delete.php?madonhang=<?php echo $madonhang; ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>

    </table>


</div>


<?php 
    if(isset($_GET['madonhang'])){
        $madonhang = $_GET['madonhang'];
        if(isset($_POST['btn_updateOrder'])){
            $status = $_POST['status'];
            $date = date_format(date_create(),'Y-m-d');
            update_status($madonhang,$status);
            if($status == 1){
                    // THỐNG KÊ DOANH THU
                $data_lietke = select_showAll_order($madonhang);
                $data_thongke = select_thongke($date);
                $soluongmua = 0;
                $doanhthus = 0;
                foreach($data_lietke as $lietke){
                    extract($lietke);
                    $soluongmua += $so_luong_sp;
                    $doanhthus += $tong_tien;
                }

                if(count($data_thongke) > 0){
                    foreach($data_thongke as $thongke){
                        extract($thongke);
                        $soluongban = $soluongmua + $soluong;
                        $doanhthus = $doanhthu + $doanhthus;
                        $don_hang = $donhang + 1;
                        update_thongke($don_hang,$doanhthus,$soluongban,$date);
                    }
                }else{
                    foreach($data_thongke as $thongke){
                        extract($thongke);
                        $soluongban = $soluong;
                        $doanhthus = $doanhthu;
                        $don_hang = 1;
                        update_thongke($don_hang,$doanhthus,$soluongban,$date);
                    }
                }
            }
            echo "<script>window.location.href='?quanly=order&madonhang=$madonhang'</script>";
        }
?>


<div class="navbars__sidebars">
    <div class="search__form ">
       <h3>Đơn hàng số: <?php echo $madonhang; ?></h3>
    </div>

   

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng mua</th>
                <th>Giá</th>
                <th>Trạng thái đơn hàng</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody class=""> 
         <?php 
            $order_list = select_code_order($madonhang);
            foreach($order_list as $order){
                extract($order);
         ?>
            <tr>
                <td><?php echo $madonhang; ?></td>
                <td><?php echo $ten_san_pham    ; ?></td>
                <td><?php echo $so_luong_sp?></td>
                <td><?php echo $thanh_tien; ?></td>
                <?php 
                 if($trang_thai_hoa_hang == 0){
                    echo "<td>Chưa xử lý</td>";
                }
                else if($trang_thai_hoa_hang == 1){
                    echo "<td style='color:#d35'>Đang giao hàng</td>";
                }else{
                   echo "<td style='color: #28a745'>Đã xử lý</td>";
                }
                ?>
            </tr>
            <?php 
            }
            ?>
        </tbody>

    </table>
    <p>Cập nhật đơn hàng</p>
    <form action="" method="post">
        <select name="status" id="" class="form-control" style="width:25%">
            <option value="0">Chưa xử lý</option>
            <option value="1">Đang giao hàng</option>
            <option value="2">Đã xử lý</option>
        </select>
        <div class="form-group">
            <button class="btn btn-primary" name="btn_updateOrder">Cập nhật</button>
        </div>
    </form>

</div>

<?php 
    }
?>