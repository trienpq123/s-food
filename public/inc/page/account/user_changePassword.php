
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
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
            echo "<script> window.location.href='?';</script>";
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
</main>