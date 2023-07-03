<!-- <?php 






    if(isset($_POST['btnLogin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $remember_login = $_POST['remember_login'];

        $checkEmailLogin = checkEmailLogin($username);
       
        if(is_array($checkEmailLogin)){

            extract($checkEmailLogin);

            if($password == $checkEmailLogin['pass']){
                $_SESSION['user'] = $checkEmailLogin;
                $loginSuccess = "<p style='color:#198754'>Đăng nhập thành công</p>";
            }else {
                $loginSuccess = "<p style='color:#dc3545'>Sai mật khẩu</p>";
            }

        }else {
            $loginSuccess ="<p style='color:#dc3545'>Tài khoản này không tồn t</p>";
        }

    }

    if(isset($_SESSION['user'])){
        $id_kh = $_SESSION['user']['id_khach_hang'];
        $cart_data = cart_select_all($id_kh);
    }


?> -->

<header class="header">
        <div class="container">
            
                <div class="navbar .col-lg-12">
                    <div class="navbar--menu">
                        <ul  class="navbar--nav hidden-navbar">
                            <li><a href="?">TRANG CHỦ</a></li>
                            <li>
                                <a href="?quanly=productList">THỰC ĐƠN</a>
                                <div class="submenu">
                                    <ul>
                                        <?php
                                            $categorys = list_category();
                                            foreach($categorys as $category){
                                                extract($category);
                                        ?>
                                         <li><a href="?quanly=productList&id_danhMuc=<?php echo $id_danh_muc; ?>"><?php echo $ten_danh_muc ?></a></li>
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li><a href="#">SẢN PHẨM KHUYẾN MÃI</a></li> -->
                            <li><a href="?quanly=contact">LIÊN HỆ</a></li>
                            <li><a href="?quanly=intro">GIỚI THIỆU</a></li>
                        </ul>
                        <div class="show_M"><i class="fas fa-bars"></i></div>
                    </div>
    
                    <div class="navbar--menu">
                        <!-- <img src="image/Logo.png" alt="LOGO" style="width:100px;height:100px;"> -->
                        <div class="navbar--logo"><a href="?">S-FOOD</a></div>
                    </div>
                    
                    <div class="navbar--menu">
                        <div class="navbar--nav ">
                            <div class=" navbar__menu--right navbar--search">
                                <form action="?quanly=productList&keyword=1" method="POST">
                                    <label for="search"><i class="fas fa-search"></i></label>
                                    <input type="text" id="search" placeholder="Tim kiem" class="search__product" name="word">
                                    <input type="submit" name="btnSearch" hidden >
                                </form>
                            </div>
    
                            <div class="navbar__menu--right navbar--cart">
                                <a href="?quanly=userCart" >
                                    <i class="fas fa-shopping-bag"></i>
                                    <?php 
                                    if(isset($_SESSION['user'])){
                                        if(count($cart_data) > 0){
                                            $count = count($cart_data);
                                       ?>
                                       <span><?php echo $count ?></span> 
                                    <?php
                                        }
                                    }else{
                                        echo "    <span>0</span> ";
                                        }
                                    ?>
                                        
                                    
                                </a>
                                <!-- SUB CART MENU MINI -->
                                <!-- <div class="cart__sub">
                                    <div class="cart__sub--hidden">
    
                                    </div> -->
                                    <!-- <div class="cart__sub--image">
                                        <img src="public/image/product/banh_lava.jpeg" alt="Bánh Lava" style="width:40px;height:40px;">
                                    </div> -->
    
                                    <!-- <div class="cart__sub--name"> -->
                                        <!-- <p>Bánh lava</p>
                                        <p>1 cái</p> -->
                                        <!-- <p>Chưa có sản phẩm</p>
                                    </div> -->
                                    <!-- <div class="cart__sub-total">
                                        <p>Tổng</p>
                                        <strong><span>0VNĐ</span></strong>
                                    </div> -->
                                    <!-- <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <tr>
                                                <td></td>
                                                <td>ABD</td>
                                                <td>123VNĐ</td>
                                                <td>3</td>
                                            </tr>
                                       </tbody>
                                       <tfoot align="center">
                                           <td colspan="4">Tổng: 123px</td>
                                       </tfoot>
                                    </table>
                                    <hr>
                                    
                                    <div class="cart__sub--pay">
                                        <a href="#" class="btn btn-danger" style="color:white">Thanh toán</a>
                                    </div>
                                 
                                </div> -->
                                
                            </div>
                        <?php 
                            if(!isset($_SESSION['user'])){
                        ?>
                            <div class="navbar__menu--right navbar__menu--user">
                                <a href="?quanly=userLogin"><i class="far fa-user"></i></a>
    
                                        <div class="user__form">
                                                <!-- <div class="form_hidden">
                                                    dsaads
                                                </div> -->
                                                <h3>LOGIN</h3>
                                                <form action="./public/inc/page/process/process_login.php" method="POST">
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
                                                      if(isset($_SESSION['noti'])){
                                                            echo $_SESSION['noti'];

                                                      }else{
                                                          echo "";
                                                      }
                                                               
                                                    ?>
                                                </form>

                                                
                                        </div>

                                        <div class="over--lay" id="over--lay">
                                                    <div class="form__signup">
                                                        <div class="title--sign">
                                                            <div class="title--name">ĐĂNG KÝ</div>
                                                            <div class="title--close" id="sigup--close"><i class="fas fa-times"></i></div>
                                                        </div>
                                                        <form action="" method="POST" id="formSignUp">
                                                            <div class="form-group">
                                                                <label for="">Họ tên</label>
                                                                <input type="text" class="form-control"  name="fullname">
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['fullname'])){
                                                                    echo $dangky['fullname'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Số diện thoại</label>
                                                                <input type="text" class="form-control" name="phone">
                                                                
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['phone'])){
                                                                    echo $dangky['phone'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="email" class="form-control" name="email">
                                                            </div>

                                                            <?php 
                                                                if(isset($dangky['email'])){
                                                                    echo $dangky['email'];
                                                                }
                                                            ?>
    
                                                            <div class="form-group">
                                                                <label for="">Mật khẩu</label>
                                                                <input type="password" class="form-control" name="password">
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
                                                                <input type="text" class="form-control" name="address">
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
                            <?php 
                            }else{
                            ?>
                                <div  class="navbar__menu--right navbar__menu--user" ">
                                        <div class="welcome--user">Xin chào, Triển <i class="fas fa-sort-down"></i></div>

                                        <div class="user__form">
                                            <!-- <div class="form_hidden">
                                                dsaads
                                            </div> -->
                                            <ul>
                                                <li><a href="?quanly=userInfor"><i class="fas fa-user"></i> Thông tin cá nhân</a></li>
                                                <li><a href="?quanly=userOrder"><i class="far fa-id-card"></i> Theo dõi đơn hàng</a></li>
                                                <?php 
                                                if(isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1){
                                                ?>
                                                <li><a href="public/admin/index.php"><i class="fas fa-tasks"></i> Trình quản lý sản phẩm</a></li>
                                                <?php 
                                                }
                                                ?>
                                                <li><a href="?quanly=userCart"><i class="fab fa-opencart"></i> Giỏ hàng của bạn</a></li>
                                                <li><a href="?quanly=dangxuat"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                </div>
                            <?php 
                            }
                            ?>
                            </div>
                        </div>
                    </div>


                    <div class="overlay">
                        <div class="navbar-m">
                            <div class="navbar--menu-m">
                                <h2>S-FOOD</h2>
                                <div class="m-search">
                                    <form action="?quanly=productList&keyword=1" method="POST">
                                      
                                        <input type="text" id="search" placeholder="Tim kiem" class="form-control" name="word">
                                        <button name="btnSearch"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <ul  class="navbar--nav">
                                    <li><a href="?">TRANG CHỦ</a></li>
                                    <li>
                                            <a href="?quanly=productList">THỰC ĐƠN     <span><i class="fas fa-chevron-down"></i></span></a>
                                        
                                            
                                    
                                        <div class="submenu-m">
                                            <ul>
                                                <?php
                                                    $categorys = list_category();
                                                    foreach($categorys as $category){
                                                        extract($category);
                                                ?>
                                                <li><a href="?quanly=productList&id_danhMuc=<?php echo $id_danh_muc; ?>"><?php echo $ten_danh_muc ?></a></li>
                                                <?php 
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- <li><a href="#">SẢN PHẨM KHUYẾN MÃI</a></li> -->
                                    <li><a href="?quanly=contact">LIÊN HỆ</a></li>
                                    <li><a href="?quanly=intro">GIỚI THIỆU</a></li>
                                </ul>
                        
                            </div>
                            <div class="close" id="close-m-menu"><i class="fas fa-times"></i></div>
                        </div>
                    </div>
                </div>
        
        </div>

        
    </header>