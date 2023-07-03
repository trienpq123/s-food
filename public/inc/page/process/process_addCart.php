<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/product_load.php');
    include_once('../../../../dao/cart.php');
 
  
    if(isset($_SESSION['user'])){
        // echo "<script>alert('Vui lòng đăng nhập để ')</script>";
        // // echo "<script>window.location.href='?quanly=userLogin'</script>";


    
    
                if(isset($_POST['btn_addCart'])){
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }else{
                        $id = '';
                    };
                    $quality = $_POST['Quality'];
                    echo $quality.'Số lượng';
                    $id_khach_hang = $_SESSION['user']['id_khach_hang'];
                    echo $id_khach_hang;
                    $select_cart = cart_select($id,$id_khach_hang);
                   
                                            
                    if(count($select_cart) > 0 ){
                      
                        foreach($select_cart as $cart){
                            extract($cart);
                            if($id == $id_san_pham){
                                $sl = $quality + $so_luong;
                                echo "<br>".$sl;
                                product_update($sl,$id,$id_khach_hang);
                            }
                        }
               
                        header('location:../../../../?quanly=productDetailt&id='.$id);
                        
                    }else{
                        product_insert($id_khach_hang,$id,$quality);
                        header('location:../../../../?quanly=productDetailt&id='.$id);
                    }

                    
                    
                }
            }else{
                //   echo "<script>alert('Vui lòng đăng nhập để mua ')</script>";
                  $_SESSION['mess_error'] =  "<script>alert('Vui lòng đăng nhập để mua ')</script>";
                  header('location: ../../../../?quanly=userLogin');
            }
?>