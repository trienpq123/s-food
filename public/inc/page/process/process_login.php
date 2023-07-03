<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/checkLogin.php');
    include_once('../../../../dao/signUp.php');
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $remember_login = $_POST['remember_login'];

    $checkEmailLogin = checkEmailLogin($username);
   
    if(is_array($checkEmailLogin)){

        extract($checkEmailLogin);

        if($password == $checkEmailLogin['pass']){
            $_SESSION['user'] = $checkEmailLogin;
            $_SESSION['noti'] = "<p style='color:#198754'>Đăng nhập thành công</p>";
            header('location: ../../../../?');

        }else {
            $_SESSION['noti'] = "<p style='color:#dc3545'>Sai mật khẩu</p>";
            header('location: ../../../../?');
        }

    }else{
        $_SESSION['noti'] ="<p style='color:#dc3545'>Tài khoản này không tồn t</p>";
        header('location: ../../../../?');
    }

}

?>