<?php 
if(isset($_SESSION['user'])){
    echo "<script>window.location.href='?'</script>";
}
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $md5_password = md5($password);
    $remember_login = $_POST['remember_login'];

    $checkEmailLogin = checkEmailLogin($username);
   
    if(is_array($checkEmailLogin)){

        extract($checkEmailLogin);

        if($md5_password == $checkEmailLogin['pass']){
            $_SESSION['user'] = $checkEmailLogin;
            $loginSuccess = "<p style='color:#198754'>Đăng nhập thành công</p>";
        }else {
            $loginSuccess = "<p style='color:#dc3545'>Sai mật khẩu</p>";
        }

    }else {
        $loginSuccess ="<p style='color:#dc3545'>Tài khoản này không tồn t</p>";
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
                            <h2 style="text-align:center;padding: 12px 0">ĐĂNG NHẬP</h2>
                            </div>

                            <div class="box__password--content">
                        
                                <!-- <div class="password--noti">Nhập lại mật khẩu</div> -->
                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="username">Email/sdt</label>
                                                        <input type="text" placeholder="" class="form-control" name="username">
                                                    </div>

                                              
                
                                                    <div class="form-group">
                                                        <label for="password">Mật khẩu</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                
                                                    <div class="form-group">
                                                        <input type="checkbox"  name="remember_login" checked> <label for="">Ghi nhớ đăng nhập</label>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-danger" value="Đăng nhập" name="btnLogin">
                                                        <label for="">
                                                            <div class="btn-forgetpass">
                                                                <a href="?quanly=forgetPassword">Quên mật khẩu</a>
                                                            </div>
                                                        </label>
                
                                                    </div>
                                            
                                                    <div class="form-group">
                                                    <div class="signup--title" id="sigup--titles"><a href="?quanly=SignUp">Đăng ký</a></div>
                                                    </div>

                                                    <?php 
                                                      if(isset($loginSuccess)){
                                                            echo $loginSuccess;
                                                      }                       
                                                    ?>
                                </form>

                    
                            </div>

                        
                    </div>
                </div>
            </div>
        </div>
</main>