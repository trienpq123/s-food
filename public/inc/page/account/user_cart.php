<?php 
    if(!isset($_SESSION['user'])){
      echo  "<script>window.location.href = '?quanly=userLogin'</script>";
      header('location: ?quanly=userLogin');
    }else{
        $id_khach_hang = $_SESSION['user']['id_khach_hang'];
    }

    $carts = cart_select_all($id_khach_hang);


?>

<main>

<div class="container">
 
    <div class="box--line">
    <?php 
          if(count($carts) > 0){
            
    ?>
     <h3>GIỎ HÀNG</h3>

     <div class="row">
       
         <div class="col-lg-8">
              <div class="product__cart--left">
                  <div class="total">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>STT</th>
                                  <th></th>
                                  <th>Tên sản phẩm</th>
                                  <th>Số lượng</th>
                                  <th>Gía</th>
                                  <th>Thành Tiền</th>
                                  <th></th>
                              </tr>
                          </thead>
                  
                          <form action="public/inc/page/process/process_updateCart.php" method="post">
                            <tbody>
                                <?php 
                                    
                                    $i = 1;
                                    foreach($carts as $cart){
                                        extract($cart);
                                      
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <img src="public/upload/<?php echo $hinh_anh;; ?>" alt="FL" style="width:80px;height:80px;object-fit: contain;line-height:2rem"> 
                                    </td>
                                    <td><?php echo $ten_san_pham; ?></td>
                                    <td>
                                        <!-- <div class="product__text--item product__text--count">
                                            <div class="product__count--minus">-</div>
                                            <div class="product__count--show">1</div>
                                            <div class="product__count--plus">+</div>
                                        </div> -->
                                        <input type="number" min=1 class="form-control" name="sp_quality[]" value="<?php echo $so_luong; ?>">
                                        <input type="text" name="sp_code[]" value="<?php echo $id_san_pham; ?>" hidden>
                                    </td>
                                    <?php 
                                        if($gia_giam < 0 || $gia_giam == ''){
                                    ?>
                                    <td><span class="price"><strong><?php echo number_format($gia_san_pham); ?>VNĐ</strong></span></td>
                                    <td><span class="price"><strong><?php echo number_format($gia_san_pham * $so_luong) ?>VNĐ</strong></span></td>
                                    <?php 
                                        }else{
                                    ?>
                                        <td><span class="price"><strong><?php echo $gia_giam; ?>VNĐ</strong></span></td>
                                        <td><span class="price"><strong><?php echo number_format($gia_giam * $so_luong) ?>VNĐ</strong></span></td>
                                    <?php 
                                        }
                                    ?>
                                    
                                    <td><a href="public/inc/page/process/process_deleteCart.php?id=<?php echo $id_san_pham; ?>" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                                </tr>
                                <?php 
                                    }
                                
                                ?>
                                
                            </tbody>
                         
                          <tfoot>
                              <tr align="center">
                                  <td colspan="7"><button  class="btn btn-dark" name="btn_updateCart">Cập nhật</button></td>
                              </tr>
                          </tfoot>
                        </form>
                      </table>
                  </div>
              </div>
         </div>
         
         <div class="col-lg-4">
              <div class="product__cart--right">
              

                  <div class="total">
                      <p>Đơn hàng</p>

                      <div class="cart__total--item row">
                            <?php 
                                foreach($carts as $cart){
                                    extract($cart);
                            ?>
                             <div class="col-lg-12">
                                 <span style="color:#ccc;"><?php echo "$so_luong x $ten_san_pham" ?></span>
                             </div>  
                            <?php 
                                }
                            ?>     
                      </div>

                      <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <!-- <div class="total--title">Tạm tính </div> -->
                              <span>Tạm tính</span>
                          </div>
                          <div class="col-lg-6">
                              <!-- <div class="total--price">195.000VNĐ</div> -->

                              <span>
                                  
                              <?php 
                                $tongtien = 0;
                                foreach($carts as $cart){
                                    extract($cart);
                                    if($gia_giam < 0 || $gia_giam == ''){
                                        $giasp = $gia_san_pham;
                                    }else{
                                        $giasp = $gia_giam;
                                    }

                                    $thanhtien = (float)$so_luong * $giasp;
                                    $tongtien += $thanhtien;
                                }
                                echo number_format($tongtien);
                              ?>
                              VNĐ</span>
                          </div>
                      </div>

                      <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <!-- <div class="total--title">Phí vẫn chuyển</div> -->
                              <span>Phí vận chuyển</span>
                          </div>
                          <div class="col-lg-6">
                              <!-- <div class="total--price">44.000VNĐ</div> -->
                              <span>Miễn phí</span>
                          </div>
                      </div>

                      <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <div class="total--title">Tổng tiền </div>
                          </div>
                          <div class="col-lg-6">
                                <div class="total--price" style="color:#dc3545;">
                                    <?php 
                                  
                                    echo number_format($tongtien);
                                ?>
                                VNĐ
                                </div>
                          </div>
                      </div>

                   

                

                      <div class="cart__total--item">
                          <div class="total--btn">
                              <a href="?quanly=userPay" class="btn btn-dark">Thanh Toán</a>
                          </div>
                      </div>

                  </div>

                  <!-- <div class="total">
                            <div class="cart__total--item">
                                <span>Nhập mã khuyến mãi</span>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="product__sale">
                                                <div class="product__sale--item">
                                                    <input type="text" name="product_code" class="form-control">
                                                </div>
                                                <div class="product__sale--item">
                                                    <button class="btn btn-dark">Áp dụng</button>
                                                </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                  </div> -->

              

                  
              </div>
         </div>
     </div>
     <?php 
          }else{
      
          
     ?>
        <div class="product__cart--no">
            <img src="public/image/cart-empty.png" alt="" style="width: 420px;height:100%;object-fit:contain">
            <p>Giỏ hàng của bạn đang trống</p>
            <a href="?" class="btn btn-danger">Quay lại mua hàng</a>
        </div>
     <?php 
          }
     ?>
 </div>
</div>

</main>