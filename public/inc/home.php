<?php 


        if(isset($_GET['quanly'])){
            $qly = $_GET['quanly'];
        }



        else{
            $qly = '';
        }

        if($qly == "productList"){
            include_once('public/inc/page/banner.php');
         
            include_once('public/inc/page/product_all.php');
         
          
        }

        else if($qly == "contact"){
            include_once('public/inc/contact.php');
        }
        else if($qly == "intro"){
            include_once('public/inc/intro.php');
        }

        elseif($qly == "userInfor"){
            include_once('public/inc/page/account/user_infor.php');
        }

        else if($qly =="changepassword"){
            include_once('public/inc/page/account/user_userchangpassword.php');
        }

        elseif($qly == "notiPay"){
            include_once('public/inc/page/account/user_notiPay.php');
        }

        elseif($qly=="SignUp"){
            include_once('public/inc/page/account/user_signup.php');
        }

     
        elseif($qly == "dangxuat"){
            include_once('public/inc/page/account/user_logout.php');
        }

        elseif($qly == "forgetPassword"){
            include_once('public/inc/page/account/user_forgetPassword.php');
        }

        elseif($qly == "newPassword"){
            include_once('public/inc/page/account/user_changePassword.php');
        }

        

        else if($qly == "userOrder"){
            include_once('public/inc/page/account/user_manageOrder.php');
        }

        elseif($qly == "userCart"){
            include_once('public/inc/page/account/user_cart.php');
        }

        elseif ($qly == "userLogin"){
            include_once('public/inc/page/account/user_login.php');
        }

        
        elseif($qly=="userPay"){
            include_once('public/inc/page/account/user_pay.php');
        }


        else if($qly == "productDetailt"){
            include_once('public/inc/page/product_detailt.php');
        }


        else if($qly == "security"){
            include_once('public/inc/security.php');
        }
        else if($qly =="politeuse"){
            include_once('public/inc/politeuse.php');
        }
        else if($qly =="politepay"){
            include_once('public/inc/politepay.php');
        }
        
        
     
        else{

            include_once('public/inc/page/banner.php');
            include_once('public/inc/page/layout_default.php');
        }


        
        
    
?>
   

