<?php 
    if(!isset($_SESSION['user'])){
        echo "<script>window.location.href='?'</script>";
    }
    else{
        $user = $_SESSION['user'];
        $id_khach_hang = $_SESSION['user']['id_khach_hang'];
    }
    $carts = cart_select_all($id_khach_hang);
    if(count($carts)>0){
    



?>
    <main>

<div class="container">
    
    <div class="box--line">
      
     <div class="row">
         <div class="col-lg-8">
              <div class="product__cart--left">
                  <div class="total">
                      <h3>Thông tin khách hàng</h3>
                     <form action="public/inc/page/process/process_pay.php" method="POST">
                         <div class="form-group">
                             <label for="hoten"><strong>Họ tên</strong></label>
                             <input type="text" placeholder="Nhập họ tên tại đây" class="form-control" value="<?php echo $user['ho_ten'].$user['ten']; ?>">
                         </div>

                         <div class="form-group">
                             <label for="address"><strong>Địa chỉ</strong></label>
                             <input type="text" placeholder="Địa chỉ" class="form-control" id="address" value="<?php echo $user['dia_chi']; ?>">
                         </div>

                         <div class="form-group">
                             <label for="phone"><strong>Số điện thoại</strong></label>
                             <input type="text" placeholder="Số điện thoại" class="form-control" id="phone" value="<?php echo $user['sdt']; ?>">
                         </div>

                         <div class="form-group">
                             <label for="httt"><strong>Hình thức thanh toán</strong></label>
                             <div class="form-group">
                                
                                 <input type="radio" id="httt_home" value="0" name="pay_ht">
                                 <label for="httt_home">Thanh toán tại nhà</label>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="ghichu"><strong>Ghi chú</strong></label>
                             <textarea name="ghichu" id="" cols="30" rows="5" class="form-control"></textarea>
                         </div>

                         <input type="submit" class="btn btn-dark" value="Thanh toán" name="btn_userPay">
                     </form>
                  </div>
              </div>
         </div>
         
         <div class="col-lg-4">
              <div class="product__cart--right">
           
                  <div class="total">
                      <p>Thông tin Sản phẩm</p>
                      <?php 
                        foreach($carts as $cart){
                            extract($cart);
                      ?>
                      <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <div class="total--title">
                                  <img src="public/upload/<?php echo $hinh_anh; ?>" alt="FL" style="width: 80px; height: 80px;object-fit: contain;">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="total--price">
                                    <?php 
                                        if($gia_giam < 0  || $gia_giam == ''){
                                            $sp_gia = $gia_san_pham;
                                        }else{
                                            $sp_gia = $gai_giam;
                                        };

                                        echo number_format($sp_gia).'VNĐ';
                                    ?>
                                   
                              </div>
                              <span>
                              <?php 
                                        if($gia_giam < 0  || $gia_giam == ''){
                                            $sp_gia = $gia_san_pham;
                                        }else{
                                            $sp_gia = $gia_giam;
                                        };

                                        echo number_format($sp_gia).'VNĐ x '.$so_luong;
                                    ?>
                              </span>
                              <div class="gift-code">
                                    <?php 
                                       
                                    ?>
                                </div>
                          </div>
                      </div>
                      <hr>
                    <?php 
                        }
                    ?>


                        <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <div class="total--title">
                                Giảm giá
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="total--price">
                                    <?php 
                                        
                                            if(isset($_SESSION['product_id']) && isset($_SESSION['price'])){
                                                $product_id = $_SESSION['product_id'];
                                                $price = $_SESSION['price'];
                                             
                                                    echo number_format($price).'VNĐ';
                                                
                                            }else{
                                                echo "0VNĐ";
                                            }
                                           
                                    ?>
                                  
                              </div>
                          </div>
                      </div>


                        <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <div class="total--title">
                                Tổng tiền
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="total--price">
                                    <?php 
                                        $tongtien = 0;
                                        foreach($carts as $cart){
                                            extract($cart);
                                            if($gia_giam < 0  || $gia_giam == ''){
                                                $sp_gia = $gia_san_pham;
                                            }else{
                                                $sp_gia = $gia_giam;
                                            };

                                            $thanhtien = $sp_gia * $so_luong;
                                            $tongtien += $thanhtien;
                                           
                                        }
                                        echo number_format($tongtien).'VNĐ';
                                    ?>
                                  
                              </div>
                          </div>
                      </div>

                      <div class="product--code">
                          <form action="public/inc/page/process/process_codeSale.php" method="POST">
                              <div class="form-group">
                                 <label for="product--code">Mã giảm giảm</label>
                                  <input type="text" placeholder="Mã giảm giá" class="form-control" id="product--code" name="produce_code">
                          
                              </div>

                              <input type="submit" class="btn btn-dark" value="Áp dụng" name="btn_codeSale">
                       
                          </form>
                          <?php 
                            if(isset($_SESSION['error_code'])){
                                echo $_SESSION['error_code'];
                            }
                          ?>
                      </div>

                      <!-- <div class="cart__total--item row">
                          <div class="col-lg-6">
                              <div class="total--title">Tạm tính </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="total--price">195.000VNĐ</div>
                          </div>
                      </div> -->

                      <!-- <div class="cart__total--item">
                          <div class="total--btn">
                              <a href="#" class="btn btn-dark">Thanh Toán</a>
                          </div>
                      </div> -->
                  </div>
              </div>
         </div>
     </div>
 </div>
</div>

</main>

<?php 
    }
?>