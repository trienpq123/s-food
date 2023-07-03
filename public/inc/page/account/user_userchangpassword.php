<?php
    if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $id =  $user['id_khach_hang'];
    $cus_data = customer_one($id);
    extract($cus_data);


    // CHANGE PASSWORD
    if(isset($_POST['btn-changePw'])){
        if(isset($_POST['newPw'])){
       $newPw = $_POST['newPw'];
        }else{
            $newPw = '';
        }

        if(isset($_POST['re_newPw'])){
       $re_newPw = $_POST['re_newPw'];
        }else{
            $re_newPw = '';
        }
       $password = [];
       if(empty($newPw)){
           $password['newPw'] =  "<p style='color:#dc3545'>Mật khẩu không được để trống</p>";
       }

       if(strlen($newPw) < 8){
           $password['newPw'] = "<p style='color:#dc3545'>Mật khẩu phải trên 8 ký tự</p>";
       }

       if(empty($re_newPw)){
           $password['re_newPw'] = "<p style='color:#dc3545'>Mật khẩu không khớp</p>";
        }

        if($re_newPw != $newPw){
            $password['re_newPw'] = "<p style='color:#dc3545'>Mật khẩu không khớp</p>";
        }

        if(empty($password)){
            update_password($newPw,$id);
            echo "<script>alert('Đổi mật khẩu thành công')</script>";
        }
    }
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
                        <li ><a href="?quanly=userInfor"><i class="fas fa-user"></i> Thông tin tài khoản</a></li> 

                        <li><a href="?quanly=userOrder"><i class="fas fa-history"></i>Quản lý đơn hàng</a></li> 
                        <li class="active"><a href="?quanly=changepassword"><i class="fas fa-history"></i>Đổi mật khẩu</a></li> 
                     </ul>
                 </div>
             </div>
         </div>
         
         <div class="col-lg-9">

            <div class="box__passwords">

                <div class="box--line">

                    <div class="form__forget">

                        <div class="box__password--title">
                            <p>Đặt lại mật khẩu mới</p>
                        </div>

                        <div class="box__password--content">
                            <!-- <div class="password--noti">Nhập lại mật khẩu</div> -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" class="form-control"  name="newPw">
                                </div>
                                <?php 
                                    if(isset($password['newPw'])){
                                        echo $password['newPw'];
                                    }
                                ?>

                                <div class="form-group">
                                    <label for="">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control"  name="re_newPw">
                                </div>
                                <?php 
                                    if(isset($password['re_newPw'])){
                                        echo $password['re_newPw'];
                                    }
                                ?>
                                <hr>
                                <div class="form-group">
                                    <button class="btn btn-primary" name="btn-changePw">Xác nhận</button>
                                </div>
                            </form>


                        </div>

                    
                    </div>
                </div>
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