
 <?php 
    if(isset($_GET['id_danhMuc'])){
        $id = $_GET['id_danhMuc'];
    }else{
        $id='';
    }
    $category_data = list_category();
    $product_data = product_load_all_one($id);


    if(isset($_GET['id_danhMuc'])){
 ?>  




    <main>
    
                <div class="container">
                    <!-- <div ><a href="#">Trang chủ</a> / Sản phẩm</div> -->
                    <div class="row">
                            <div class="col-lg-3">                                
                                <div class="list">
                               
                                <a href = "#" class = "list-group-item list-group-item-dark">  <img class="img-fluid" src="public/./image/iconl/z2940199432203_a8661b0c3aa877defa96e117d8aac2ab.jpg" alt="" style="width: 20px; height: 25px;"> <b> &ensp; Danh mục sản phẩm </b></a>
                                <a href = "?quanly=productList" class = "list-group-item">Tất cả</a>
                                <?php
                                    foreach($category_data as $category){
                                        extract($category);
                                ?>

                                <a href = "?quanly=productList&id_danhMuc=<?php echo $id_danh_muc; ?>" class = "list-group-item"><?php echo $ten_danh_muc; ?></a>
                                <?php 
                                    }
                                ?>
                                <a href = "?quanly=productList&id_danhMuc=<?php echo 1 ?>" class = "list-group-item">Sản phẩm khuyến mãi</a>
                                </div>
                                <!-- <div class="list">
                                    <a href = "#" class = "list-group-item list-group-item-dark">  <img class="img-fluid" src="public/./image/iconl/z2940199432203_a8661b0c3aa877defa96e117d8aac2ab.jpg" alt="" style="width: 20px; height: 25px;"> <b> &ensp; Món ăn nổi bật </b></a>
                                    <a href = "#" class = "list-group-item">Sản phẩm 1</a>
                                    <a href = "#" class = "list-group-item">Sản phẩm 2</a>
                                    <a href = "#" class = "list-group-item">Sản phẩm 3</a>
                                </div> -->

                        </div>
                        <?php 
                            if(isset($_GET['keyword'])){
                                echo "123";
                                
                            }else{
                        ?>
                             <div class="col-lg-9">
                             <?php 
                             if($id == 1){
                                 $hot_data = product_sale();
                               
                             ?>   
                                <div class="product__list">
                                <?php 
                                  foreach($hot_data as $hot){
                                      extract($hot);
                                ?>
                                    <div class="col-lg-4">
                                        <div class="product__list--item">
                                        
                                                <div class="product--image">
                                                    <img src="public/upload/<?php echo $hinh_anh; ?>" alt="Món An" style="width:100%;height:100%">
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
                                                if(isset($gia_uu_dai)){
                                            ?>
                                                <div class="product__price">
                                                    <div class="product__price--old"><?php echo $gia_san_pham; ?>&nbsp;&nbsp;</div>
                                                    <span class="product__price--sale"><?php echo $gia_uu_dai; ?>&nbsp;&nbsp;</span>
                                                </div>
                    
                                                <div class="product__sale">
                                                    <?php echo number_format($gia_san_pham * ($gia_uu_dai/100)); ?>
                                                </div>
                                            <?php 
                                                }else{
                                            ?>

                                                <div class="product__price">
            
                                                    <span class="product__price--sale"><?php echo number_format($gia_san_pham); ?>VNĐ&nbsp;&nbsp;</span>
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
                            <?php 
                             }else {
                                 $products = product_load_all_one();
                                    extract($products);
                            ?>
                            

                                <div class="product__list">
                                    <?php 
                                    foreach($products as $product){
                                        extract($product);
                                        if($id == $id_danh_muc){
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="product__list--item">
                                        
                                                <div class="product--image">
                                                    <img src="public/upload/<?php echo $hinh_anh; ?>" alt="Món An" style="width:100%;height:100%">
                                                    <div class="product--add">
                                                    <a href="?quanly=productDetailt&&id=<?php echo $id_san_pham; ?>">Thêm giỏ hàng</a>
                                                    </div>
                                                </div>
                                            <a href="?quanly=productDetailt&id=<?php echo $id_san_pham ?>">
                                                <div class="product--name">
                                                    <?php echo $ten_san_pham; ?>
                                                </div>
                                        </a>
                                        
                                            <div class="product__box">
                                                <?php 
                                                    if(isset($gia_giam)){
                                                ?>
                                                    <div class="product__price">
                                                        <div class="product__price--old"><?php echo number_format($gia_san_pham) ?> VNĐ&nbsp;&nbsp;</div>
                                                        <span class="product__price--sale"><?php echo number_format($gia_san_pham - $gia_uu_dai )?> VNĐ&nbsp;&nbsp;</span>
                                                    </div>
                        
                                                 
                                                <?php 
                                                    }else{
                                                ?>

                                                    <div class="product__price">
                
                                                        <span class="product__price--sale"><?php echo number_format($gia_san_pham); ?> VNĐ&nbsp;&nbsp;</span>
                                                    </div>
                        

                                                <?php 
                                                    }
                                                ?>
                                            </div>
                    
                                        </div>
                              
                                    </div>

                                <?php 
                                        }
                                    }
                                ?>

                         
                    
                                </div>      

                            <?php 
                             }
                            ?>



                            </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
    </main>
<?php 
    }else{
        include_once('public/inc/page/product_filter.php');
    }
?>