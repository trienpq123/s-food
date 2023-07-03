<?php
    if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $id =  $user['id_khach_hang'];
    $cus_data = customer_one($id);
    extract($cus_data);


    // TAKE A CART
    $customer_order = select_order($id);
    $order_wait  = select_order_wait($id);
?>

<main>

<div class="container">
 
    
     
     <div class="row">

        <div class="col-lg-3">
             <div class="product__cart--left box--line">
                 <div class="user__welcome">
                     <div class="user__welcome--item user__avatar">
                         <img src="public/upload/<?php echo $hinh; ?>" alt="Avatar" style="width:70px;height:70px;object-fit: contain;">
                     </div>
                     <div class="user__welcome--item user__welcome--content">
                         
                         Xin chào, <?php echo $ten; ?>
                         
                     </div>
                 </div>
                 <h3>Quản lý tài khoản</h3>
                 <div class="menu__user">
                     <ul>
                        <li  ><a href="?quanly=userInfor"><i class="fas fa-user"></i> Thông tin tài khoản</a></li> 

                        <li class="active"><a href="?quanly=userOrder"><i class="fas fa-history"></i>Quản lý đơn hàng</a></li> 
                        <li ><a href="?quanly=changepassword"><i class="fas fa-history"></i>Đổi mật khẩu</a></li> 
                     </ul>
                 </div>
             </div>
         </div>
         
         <div class="col-lg-9">
              
             <div class="product__cart--right box--line" style="width: 100%;">
                  
                    <h3>Đơn hàng của tôi</h3>
                     
                    <table class="table">
                         <thead>
                             <tr>
                                 <th>Mã đơn hàng</th>
                                 <th>Ngày mua</th>
                                 <th>Tên Sản phẩm</th>
                                 <th>Giá</th>
                                 <th>Số lượng </th>

                                 <th>Trạng thái dơn hàng</th>
                             </tr>
                         </thead>
                         
                         <tbody>
                           <?php 
                  
                           if(count($customer_order) > 0){
                       
                            foreach($customer_order as $order){
                                extract($order);
                           ?>
                             <tr>
                                 <td><a href="#"><?php echo $madonhang; ?></a></td>
                                 <td><?php echo $ngay_mua; ?></td>
                                 <td><?php echo $ten_san_pham; ?></td>
                                 <td><?php echo $thanh_tien ?>VNĐ</td>
                                 <td><?php echo $so_luong_sp; ?></td>
                                 <?php 

                                    if($trang_thai_hoa_hang == 2){
                                        echo "<td style='color:#dc3545;font-weight:700'>Giao hàng thành công</td>;";
                                    }
                                 ?>
                                  <!-- <td  style="color:#dc3545; font-weight: 700;">Giao hàng thành công</td> -->
                             </tr>
                            <?php 
                            }
                        }else{
                            echo "<td colspan='6' align='center'>Bạn chưa có đơn hàng nào</td>;";
                        }
                            ?>
                         </tbody>
                    </table>

                    
               
             </div>

             <div class="product__cart--right box--line" style="width: 100%;">
                  
                 <h3>Đơn hàng đang được giao</h3>
                  
                 <table class="table">
                      <thead>
                          <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày mua</th>
                              <th>Sản phẩm</th>
                              <th>Tổng tiền</th>
                              <th>Trạng thái dơn hàng</th>
                              <td></td>
                          </tr>
                      </thead>
                      
                      <tbody>
                          <?php 
                          if(count($order_wait) > 0){
                            foreach($order_wait as $order){
                                extract($order);
                                
                          ?>
                          <tr>
                              <td><a href="#"><?php echo $madonhang; ?></a></td>
                              <td><?php echo $order['ngay_mua']; ?></td>
                              <td><?php echo $ten_san_pham; ?></td>
                              <td><?php echo $tong_tien; ?> VNĐ</td>
                              <?php 
                                if($trang_thai_hoa_hang == 0){
                                    echo "<td colspan='2' style='color:#333'>Chờ xác nhận</td>
                                            <td><a href='public/inc/page/process/process_cancelOrder.php?id=$madonhang'>Hủy đơn hàng</a></td>";
                                }else{
                              ?>
                              <td  style="color:#dc3545; font-weight: 700;">Đang giao hàng </td>
                             
                              <?php 
                                }
                              ?>
                          </tr>
                          <?php 
                            }
                        }else{
                            echo "<td colspan='6' align='center'>Bạn chưa có đơn hàng nào</td>;";
                        }
                        
                          ?>
                      </tbody>
                 </table>

                 
            
          </div>
         </div>
     </div>

</div>

</main>

<?php 
    }else{
        header('location: ?');
    }
?>