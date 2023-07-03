<?php
    if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $id =  $user['id_khach_hang'];
    $cus_data = customer_one($id);
    extract($cus_data);

    if(isset($_POST['btnChange'])){
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $path = "public/upload/";

        $user = [];
        if(empty($firstName)){
            $user['firstName'] = "<p sytle='color:#dc3545'>Họ không được để trống</p>";
        }

        if(empty($lastName)){
            $user['lastName'] = "<p sytle='color:#dc3545'>Tên không được để trống</p>";
        }
        
        if(empty($address)){
            $user['address'] = "<p sytle='color:#dc3545'>Địa chỉ không được để trống</p>";
        }
        
        if(empty($email)){
            $user['email'] = "<p sytle='color:#dc3545'>Email không được để trống</p>";
        }

        if(empty($phone)){
            $user['phone'] = "<p sytle='color:#dc3545'>Số điện thoại không được để trống</p>";
        }

        if(empty($user)){
            customer_update($id,$firstName,$lastName,$address,$phone,$email,$image);
            move_uploaded_file($tmp_image,$path.$image);
        }

    }   
?>
<main>

       <div class="container">
        
           
            
            <div class="row">
                <!-- <div class="col-lg-12">
                    <div class="noti__access">
                        <div class="noti__access--title">
                            <i class="far fa-check-circle"></i> Đặt hàng thành công
                        </div>
                        <div class="noti__access--content">
                            <p>Cám ơn quý khách đã đặt hàng tại SFOOD</p>
                            <p>Đơn hàng sẽ được vấn chuyển đến tay bạn nhanh nhất có thể</p>
                        </div>
                        <a href="#" class="btn btn-danger">Quay về trang chủ</a>
                        <a href="#" class="btn btn-dark">Xem đơn hàng của bạn</a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-8">
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
                                 <tbody>
                                     <tr>
                                         <td>1</td>
                                         <td>
                                             <img src="image/product/FL.jpeg" alt="FL" style="width:80px;height:80px;object-fit: contain;"> 
                                         </td>
                                         <td>Món: FL</td>
                                         <td>
                                             <div class="product__text--item product__text--count">
                                                 <div class="product__count--minus">-</div>
                                                 <div class="product__count--show">1</div>
                                                 <div class="product__count--plus">+</div>
                                             </div>
                                         </td>
         
                                         <td><span class="price"><strong>195.000VNĐ</strong></span></td>
         
                                         <td><span class="price"><strong>195.000VNĐ</strong></span></td>
                                         <td><a href="#" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                                     </tr>
         
                                    
                                 </tbody>
                                 <tfoot>
                                     <tr align="center">
                                         <td colspan="7"><a href="#" class="btn btn-dark">Cập nhật</a></td>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                     </div>
                </div> -->

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
                                <li class="active" ><a href="?quanly=userInfor"><i class="fas fa-user"></i> Thông tin tài khoản</a></li> 

                                <li><a href="?quanly=userOrder"><i class="fas fa-history"></i>Quản lý đơn hàng</a></li> 
                                <li ><a href="?quanly=changepassword"><i class="fas fa-history"></i>Đổi mật khẩu</a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
         
         
                
                <div class="col-lg-9">
                     
                    <div class="product__cart--right box--line" style="width: 100%;">
                         
                           <h3>Thông tin cá nhân</h3>
                            
                           <form action="" method="POST" enctype="multipart/form-data">
                           
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="fullname">Họ</label>
                                                <input type="text" class="form-control" placeholder="Thêm họ tên" value="<?php echo $ho_ten; ?>" name="firstname">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="fullname">Tên</label>
                                                <input type="text" class="form-control" placeholder="Thêm họ tên" value="<?php echo $ten; ?>" name="lastname">
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Thêm địa chỉ" value="<?php echo $dia_chi; ?>" name="address">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Thêm Email" value="<?php echo $email; ?>" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Thêm số điện thoại" value="<?php echo $sdt; ?>" name="phone">
                                </div>

                        

                                <div class="form-group" style="margin:3px 0">
                                   
                                        <div class="user">
                                            <div class="user--avatar">
                                                <img src="public/upload/<?php echo $hinh; ?>" alt="Avatar" style="width:80px;height:80px;border-radius: 50%;" ">
                                            </div>
                                           
                                            <div class="user--change">
                                                <input type="file" class="form-control" value="<?php echo $hinh_anh ?>" name="image">
                                            </div>
                                        </div>
                                  
                                </div>

                               <div class="form-group">
                                    <button class="btn btn-dark" name="btnChange">Lưu thay đổi</button>
                               </div>
                           </form>
                      
                    </div>
                </div>
            </div>
    
       </div>
  
    </main>
    <?php 
    }else {
        echo "<script>window.location.href='?'</script>";
    }
    ?>