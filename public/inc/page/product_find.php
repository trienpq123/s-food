<?php 
    if(isset($_POST['btnSearch'])){
       $keyword = $_POST['word'];
       $search_data = product_search($keyword);
    }
?>

<div class="col-lg-9">
    <h3>Kết quả tìm kiếm: <?php echo $keyword ?> </h3>
    <p>Có <strong><?php echo count($search_data) ?></strong> kết quả</p>
                                <div class="product__list">
                                 
                                <?php 
                                  foreach($search_data as $hot){
                                      extract($hot);
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12">
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
                                                if(isset($gia_giam)){
                                            ?>
                                                <div class="product__price">
                                                    <div class="product__price--old"><?php echo number_format($gia_san_pham); ?> VNĐ</div>
                                                    <span class="product__price--sale"><?php echo number_format($gia_san_pham - $gia_giam); ?> VNĐ</span>
                                                </div>
<!--                     
                                                <div class="product__sale">
                                                    <?php echo ($gia_giam / $gia_san_pham) / $gia_san_pham * $gia_giam ?>%
                                                </div> -->
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
                            
                             


                            </div>