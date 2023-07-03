<?php 
    // $product_data = product_load_hot_top3();
    $product_sale = product_sale();
    extract($product_sale);
?>

<main>

<div class="container">

    <div class="product col-lg-12">
     
        <h3><i class="fas fa-pizza-slice"></i> Sản phẩm HOT</h3>
       
  
        <div class="product__title">
           
            <div class="product__title--name">
                Sản phẩm HOT <span>( <?php  echo count($product_sale); ?> SẢN PHẨM )</span>
            </div>
            <div class="product__title--more">
                <a href="?quanly=productList&id_danhMuc=1">Xem thêm</a>
            </div>
                    
        </div>
        
      
            <div class="product__list">
            <?php 
                foreach ($product_sale as $product) {
                    extract($product);

                
            ?>
                <div class="col-12 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="product__list--item ">
                            <div class="product--hot">HOT</div>
                            <div class="product--image">
                                <img src="public/upload/<?php echo $hinh_anh; ?>" alt="Món An" style="width:100%;height:100%;object-fit:cover">
                                <div class="product--add">
                                <a href="?quanly=productDetailt&id=<?php echo $id_san_pham;?>">Thêm giỏ hàng</a>
                                </div>
                            </div>
                            <a href="?quanly=productDetailt&id=<?php echo $id_san_pham;?>">
                                <div class="product--name">
                                    <?php echo $ten_san_pham; ?>
                                </div>
                            </a>
                    
                            <div class="product__box">
                                    <div class="product__price">
                                        <?php

                                            if(isset($gia_giam)){
                                        ?>
                                            <div class="product__price--old"> <?php echo number_format($gia_san_pham);  ?>  &nbsp</div>
                                                
                                            <span class="product__price--sale"><?php  $gia =  $gia_san_pham - $gia_giam; echo number_format($gia).'VNĐ'; ?>&nbsp;</span>
                                        <?php 
                                            }else{
                                        ?>
                                            <span class="product__price--sale"><?php echo number_format($gia_san_pham).'VNĐ'; ?>&nbsp;</span>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                            
                            </div>

                    </div>

                </div>
            <?php 
                }
            ?>
                

                
                
       

            </div>
     
        
    </div>

    <hr>

<?php 
    $data_category = product_loading_food_top_3();  

               
?>

    <div class="product">
     
        <h3><i class="fas fa-pizza-slice"></i>Thức Ăn</h3>
       
  
        <div class="product__title">
        
            <div class="product__title--name">
                Thức Ăn<span>(<?php echo count($data_category) ?> Sản phẩm)</span>
            </div>
            <div class="product__title--more">
                <a href="?quanly=productList&id_danhMuc=<?php echo $id_danh_muc; ?>">Xem thêm</a>
            </div>
        </div>
        
        
            <div class="product__list">
                <?php 
                    foreach($data_category as $data){
                        extract($data);
                ?>
                <div class="col-12 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="product__list--item">
                    
                            <div class="product--image">
                                <img src="public/upload/<?php echo $hinh_anh; ?>" alt="Món Ăn" style="width:100%;height:100%">
                                <div class="product--add">
                                <a href="?quanly=productDetailt&id=<?php echo $id_san_pham; ?>">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        <a href="#">
                            <div class="product--name">
                                <?php echo $ten_san_pham; ?>
                            </div>
                    </a>
                    
                    <div class="product__box">
                        <?php 
                            if(isset($gia_giam)){
                        ?>
                            <div class="product__price">
                                <div class="product__price--old"><?php echo number_format($gia_san_pham).'VNĐ'; ?>&nbsp;&nbsp;</div>
                                <span class="product__price--sale"><?php $gia =  $gia_san_pham - $gia_giam; echo number_format($gia).'VNĐ'; ?>&nbsp;&nbsp;</span>
                            </div>
                            <!-- <div class="product__sale">
                                -<?php echo 4  ?>
                            </div> -->
                        <?php 
                            }else{
                        ?>

                            <div class="product__price">
                                    <span class="product__price--sale"><?php echo  number_format($gia_san_pham).'VNĐ'; ?>&nbsp;&nbsp;</span>
                                
                            </div>
                
                        <?php 
                            }
                            ?>
                    </div>

                    </div>

        

                </div>
                <?php 
                    }
                ?>
        </div>
        
    </div>


    <div class="flash--sale">
        <img src="public/image/banner_shipper.jpg" alt="">
    </div>

<?php 
    
    $data_waster = product_loading_water_top_3();
  
 
  
    if(count($data_waster) > 0){
        extract($data_waster);
     
?>
    <div class="product">
     
        <h3><i class="fas fa-cocktail"></i>ĐỒ UỐNG</h3>
       
  
        <div class="product__title">
           
            <div class="product__title--name">
                ĐỒ UỐNG <span>(<?php echo count($data_waster); ?> SẢN PHẨM )</span>
            </div>
            <div class="product__title--more">
                <a href="?quanly=productList&id_danhMuc=9">Xem thêm</a>
            </div>
        </div>
        
        
            <div class="product__list">
                <?php 
                    foreach($data_waster as $waster){
                        extract($waster);
                ?>
                <div class="col-12 col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="product__list--item">
                    
                            <div class="product--image">
                                <img src="public/upload/<?php echo $hinh_anh; ?>" alt="Món An" style="width:100%;height:100%">
                                <div class="product--add">
                                <a href="?quanly=productDetailt&id=<?php echo $id_san_pham; ?>">Thêm giỏ hàng</a>
                                </div>
                            </div>
                        <a href="?quanly=productDetailt&id=<?php echo $id_san_pham; ?>">
                            <div class="product--name">
                                <?php echo $ten_san_pham; ?>
                            </div>
                    </a>
                    <?php 
                            if(isset($gia_uu_dai)){
                        ?>
                    <div class="product__box">
                            <div class="product__price">
                                <div class="product__price--old"><?php echo number_format($gia_san_pham).'VNĐ'; ?>&nbsp;&nbsp;</div>
                                <span class="product__price--sale"><?php echo $ $gia =  $gia_san_pham - $gia_giam; echo number_format($gia).'VNĐ'; ?>&nbsp;&nbsp;</span>
                            </div>
                    </div>
                        <?php 
                        }else{
                                
                        
                        ?>  
                        <div class="product__box">
                            <div class="product__price">
                                <span class="product__price--sale"><?php echo number_format($gia_san_pham).'VNĐ' ?>&nbsp;&nbsp;</span>
                            </div>

                        
                    </div>

                        <?php 

                        }?>
         

                    </div>
                

                <!-- DISPLAY GRID  -->
       

                </div>
            <?php 
                    }
            ?>
        </div>
        
    </div>

<?php 
    }
?>



    


</div>


<section class="infor--more">
   

    <div class="container">

        <div class="infor__store">
            <div class="col-lg-4">
                <div class="infor__store--item">
                    <div class="infor__store--image">
                        <img src="public/image/iconl/fast_ship.jpg" alt="ICONL SHIPPER" style="width:70px;height:70px;">
                    </div>
                    <div class="infor__store--content">
                        <p><strong>Giao hàng miễn phí</strong></p>

                        <p>Với các đơn hàng từ 100.000đ trở lên</p>
                    </div>
                </div>
           </div>

           <div class="col-lg-4">
                <div class="infor__store--item">
                    <div class="infor__store--image">
                        <img src="public/image/iconl/Shiled.png" alt="ICONL SHIPPER" style="width:70px;height:70px;object-fit: contain;">
                    </div>
                    <div class="infor__store--content">
                        <p><strong>Phục vụ giao hàng 24/7</strong></p>

                        <p>8h00 AM -  22h30 PM tất cả các ngày trong tuần</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="infor__store--item">
                    <div class="infor__store--image">
                        <img src="public/image/iconl/tea.png" alt="ICONL SHIPPER" style="width:70px;height:70px;object-fit: contain;">
                    </div>
                    <div class="infor__store--content">
                        <p><strong>Đồ uống đa dạng</strong></p>

                        <p>Matcha,trà đào,sinh tố...</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    
    
</section>

</main>