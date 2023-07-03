<?php
    $account_data = find_user();
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $username = '';
    }
    
    if(isset($_POST['btn-searchUser'])){

     
        foreach($account_data as $account){
            extract($account);
        if($username == $email || $username == $sdt){
    
            echo "<script> window.location.href='?quanly=newPassword&id=$id_khach_hang';</script>";
    
        }else{
            $user_error = "<div class='alert alert-danger'>Không tìm thấy tài khoản</div>";
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
                            <h2 style="text-align:center;padding: 12px 0">QUÊN MẬT KHẨU</h2>
                            </div>
                            

                            <div class="box__password--content">
                                <div class="password--noti">Vui lòng nhập số điện thoại của bạn </div>
                                <?php 
                                    if(isset($user_error)){
                                        echo $user_error;
                                    }
                                ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-primary" name="btn-searchUser">Tìm kiếm</button>
                                    </div>
                                </form>

                    
                    </div>

                        
                </div>
                </div>
            </div>
        </div>

<?php 

    }
?>

    


</main>