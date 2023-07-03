<?php 
    session_start();
    include_once('../../../../dao/pdo.php');
    include_once('../../../../dao/dao_customer/customer.php');
    include_once('../../../../dao/product_load.php');
    include_once('../../../../dao/dao_customer/order.php');
    if(!isset($_SESSION['user'])){
        header('location: ../../../../?');
    }else{
        // KIỂM TRA SESSION GIFT CODE CO TỒN TẠI CHƯA NẾU CÓ RỒI THÌ UNSET ALL VÀ TẠO LẠI HẾT 
        // unset($_SESSION['error_code']);
       

                $id_kh = $_SESSION['user']['id_khach_hang'];
                if(isset($_POST['btn_codeSale']) ){

                        if(isset($_SESSION['error_code'])){
                            unset($_SESSION['product_id']);
                            unset($_SESSION['price']);
                            unset($_SESSION['gift_code']);
                        }
                        
                      





                                            $code = $_POST['produce_code'];
                                        
                                            $data_sale = product_discount($code);
                                            if(count($data_sale) > 0){
                                                foreach($data_sale as $sale){
                                                    extract($sale);
                                                    $date_theend =   strtotime($ngay_het_han);
                                                }
                                               
                                                $today = strtotime(date_format(date_create(),'Y-m-d'));
                                                if($today > $date_theend){
                                                // KIỂM TRA CODE XEM HẾT HẠN CHƯA
                                                    $_SESSION['error_code'] = "<span style='color:#d35'>Mã giảm giá đã hết hạn</span>";
                                                    if(isset($_SESSION['gift_code'])){  
                                                        unset($_SESSION['product_id']);
                                                        unset($_SESSION['price']);
                                                        unset($_SESSION['gift_code']);
                                                    }
                                  
                                                }else{
                                                    // SAU ĐÓ MỚI VÀO KIỂM TRA  MÃ ÁP DỤNG CHƯA CỦA KHÁCH TRONG HÓA ĐƠN
                                                    $code_sale = select_order_code($ma_uu_dai,$id_kh);

                                                    if(count($code_sale) <= 0){
                                                        $_SESSION['product_id'] = $id_san_pham;
                                                        $_SESSION['price'] = $gia_uu_dai; 
                                                        $_SESSION['gift_code'] = $ma_uu_dai;
                                                       if(isset($_SESSION['error_code'])){
                                                           unset($_SESSION['error_code']);
                                                       }
                                                    }else{
                                                        $_SESSION['error_code'] = "<span style='color:#d35'>Mã giảm giá đã sử dụng</span>";
                                                        if(isset($_SESSION['gift_code'])){
                                                            unset($_SESSION['product_id']);
                                                            unset($_SESSION['price']);
                                                            unset($_SESSION['gift_code']);
                                                        }
                                              
                                                    }
                                                }

                                                
                                                
                                            }else{
                                                $_SESSION['error_code'] = "<span style='color:#d35'>Mã giảm giá không tồn tại</span>";
                                                if(isset($_SESSION['gift_code'])){
                                                    unset($_SESSION['product_id']);
                                                    unset($_SESSION['price']);
                                                    unset($_SESSION['gift_code']);
                                                }
                                            
                                            
                                            }   

                        

                        header('location: ../../../../?quanly=userPay');
                 
                }
        
    }
?>