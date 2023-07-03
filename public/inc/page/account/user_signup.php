<?php 
if(isset($_POST['btnSignUp'])){

    if(isset($_POST['firstname'])){
    $firstname = $_POST['firstname'];
    }else{
        $firstname = '';
    }
    if(isset($_POST['lastname'])){
    $lastname = $_POST['lastname'];
    }else{
        $lastname = '';
    }
    $phone =  $_POST['phone'];
    $emails  = $_POST['email'];
    $password = $_POST['password'];
    $md5_password = md5($password);

    $re_password = $_POST['re_password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $customer = find_user();
    $dangky = [];
    $i = 1;
    foreach($customer as $cus){
        extract($cus);
       if($emails == $email){
         $dangky['email'] = "<p style='color:#dc3545'>Email đã tồn tại</p>";
       }

       if($_POST['phone'] == $sdt){
           $dangky['phone'] = "<p style='color:#dc3545'>Số điện thoại đã tồn tại</p>";
       }
    }
    
    if(empty($firstname)){
        $dangky['firstname'] = "<p style='color:#dc3545'>Họ không được để trống</p>";
    }

    if(empty($lastname)){
        $dangky['lastname'] = "<p style='color:#dc3545'>Tên không được để trống</p>";
    }
    
    if(empty($phone)){
        $dangky['phone'] = "<p style='color:#dc3545'>Số điện thoại được để trống</p>";
    }

 
    
 
    
    if(empty($emails)){
        $dangky['email'] = "<p style='color:#dc3545'>Email không được để trống</p>";
    }


   
    
    if(empty($password)){
        $dangky['password'] = "<p style='color:#dc3545'>Mật khẩu được để trống</p>";
    }

    if(strlen($password) < 8){
        $dangky['password'] = "<p style='color:#dc3545'>Mật khẩu phải trên 8 ký tự</p>";
    }
    
    if(empty($re_password)){
        $dangky['re_password'] = "<p style='color:#dc3545'>Mật khẩu không khớp</p>";
    }
    
    if(empty($address)){
        $dangky['address'] = "<p style='color:#dc3545'>Địa chỉ không được để trống</p>";
    }
    

    
    
    if($re_password != $password){
       $dangky['re_password'] = "<p style='color:#dc3545'>Mật khẩu không khớp</p>";
    }
    
    if(empty($dangky)){
        signUp($firstname,$lastname,$md5_password,$phone,$address,$emails,$gender);
        // header('location: ?quanly=userLogin ');
        // echo "<script>window.location.href='?quanly=userLogin'</script>";
  
    }
    else{
        echo"456";
    }
}
    
?>

<main>
        <div class="container">
            <div class="col-lg-12">
                <div class="box__passwords">
                        
                    <div class="box--line">
                 
                    <div class="form__forget">
                
                            <div class="box__password--title">
                            <h2 style="text-align:center;padding: 12px 0">ĐĂNG KÝ</h2>
                            </div>

                            <div class="box__password--content">
                        
                                <!-- <div class="password--noti">Nhập lại mật khẩu</div> -->
                                <form action="" method="POST" id="formSignUp">
                                                            <div class="form-group">
                                                               <div class="row">
                                                               <div class="col-lg-6">
                                                                    <label for="">Họ </label>
                                                                    <input type="text" class="form-control"  name="firstname" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname'];} ?>">
                                                                    <?php
                                                                        if(isset($dangky['firstname'])){
                                                                            echo $dangky['firstname'];
                                                                        }
                                                                    ?>
                                                                </div>


                                                                <div class="col-lg-6">
                                                                    <label for="">Tên</label>
                                                                    <input type="text" class="form-control"  name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname'];} ?>">
                                                                    <?php 
                                                                        if(isset($dangky['lastname'])){
                                                                            echo $dangky['lastname'];
                                                                        }
                                                                    ?>
                                                                </div>
                                                               </div>
                                                              
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['fullname'])){
                                                                    echo $dangky['fullname'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Số diện thoại</label>
                                                                <input type="text" class="form-control" name="phone" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone'];} ?>"> 
                                                                
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['phone'])){
                                                                    echo $dangky['phone'];
                                                                }

                                                                if(isset( $dangky['error'])){
                                                                    echo  $dangky['error'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="email" class="form-control" name="email"   value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>">
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['email'])){
                                                                    echo $dangky['email'];
                                                                }

                                                                if(isset( $dangky['error'])){
                                                                    echo  $dangky['error'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Mật khẩu</label>
                                                                <input type="password" class="form-control" name="password" >
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['password'])){
                                                                    echo $dangky['password'];
                                                                }

                                                                if(isset($dangky['length_password'])){
                                                                    echo $dangky['length_password'];
                                                                }
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="">Nhập lại mật khẩu</label>
                                                                <input type="password" class="form-control" name="re_password">
                                                            </div>
                                                            
                                                            <?php 
                                                                if(isset($dangky['re_password'])){
                                                                    echo $dangky['re_password'];
                                                                }

                                                                if(isset($dangky['password_notSame'])){
                                                                    echo $dangky['password_notSame'];
                                                                }
                                                            ?>
                                                            
    
                                                            <div class="form-group">
                                                                <label for="">Giới tính</label>
                                                                <div class="form-control">
                                                                    <input type="radio" name="gender" value="0" checked> <label for="" >Nam</label>
                                                                    <input type="radio" name="gender" value="1"> <label for="">Nữ</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Địa chỉ</label>
                                                                <input type="text" class="form-control" name="address" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];} ?>">
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['address'])){
                                                                    echo $dangky['address'];
                                                                }
                                                            ?>

                                                            <!-- <div class="form-group">
                                                                <label for="">Avatar</label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div> -->

                                                       
                                                            <br>
                                                            <button class="btn btn-primary" name="btnSignUp">Đăng ký</button>
                                                            
                                                        </form>

                    
                            </div>

                        
                    </div>
                </div>
            </div>
        </div>
</main>