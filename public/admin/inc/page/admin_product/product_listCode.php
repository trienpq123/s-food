

<div class="navbars__brand">
        <div class="navbars__brand--title">Danh sách mã giảm giá</div>
        <div class="navbars__brand--iconl"><i class="fas fa-bars"></i></div>
    </div>

    <div class="navbars__sidebars">
        <div class="search__form ">
                <!-- <div class="form">
                    <div class="form-group">
                        <div class="input--search ">
                            <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                            <div class="search--iconl"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div> -->

                <div class="form__reload">
                    <a href="#"><i class="fas fa-sync-alt"></i></a>
                </div>
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã giảm giá</th>
                    <th>Phí</th>
                    <th>Ngày hết hạn</th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php 
                    $i = 1;
                    $listcode = select_all_listCode();
                    foreach($listcode as $code){
                        extract($code);
                    
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $ma_uu_dai; ?></td>
                    <td><?php echo number_format($gia_uu_dai) ?> VNĐ</td>
                    <td><?php echo $ngay_het_han ?></td>
                    <td>
                        <a href="?quanly=product_listCode&id=<?php echo $ma_uu_dai; ?>" class="btn btn-primary" id="editProduct">Chi tiết</a>
                        <!-- <a href="?quanly=product_updateCode&id=<?php echo $ma_uu_dai; ?>" class="btn btn-primary" id="editProduct">Chỉnh sửa</a> -->
                        <a href="inc/page/admin_product/product_deletecode.php?id=<?php echo $ma_uu_dai;?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>
        <a  href="?quanly=product_addCode" class="btn btn-primary">Thêm mã ưu đãi</a>

        
      
    </div>

<?php
    if(isset($_GET['id'])){
        $code = $_GET['id'];
        $codeDetailt = select_one_code($code);
        

            if(isset($_POST['btnAddProductCode'])){
                if(isset($_POST['checkbox'])){
                for($i=0;$i<count($_POST['checkbox']);$i++){
                    $id_product =  $_POST['checkbox'][$i];
                 
                    $code_detailt = select_all_detailtcode($code);
                    
                    if(count($code_detailt) < 0){
                        
                        code_insert_product($code,$id_product);
                        
                    }else{
                       extract($code_detailt);
                       if($id_product != $id_san_pham){
                         code_insert_product($code,$id_product);
                       }else{
                           echo "<script>alert('Sản phẩm này đã áp dụng mã code')</script>";
                       }
                    }
                    

                    
                    echo "<script>window.location.href='?quanly=product_listCode&id=$code'</script>";
                }

            }
        }


?>
    
        <div class="container" style="padding-top: 50px">
            <h3>Tất cả sản phẩm áp dụng của mã: <strong> <?php  echo $code ?></strong> </h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th></th>
                        <th>Tên sản phẩm</th>
               

                    </tr>
                </thead>
                
                <tbody class=""> 
                    <?php 
                        $i = 1;
                        $listcode = select_all_giftcode_product($code);
                        foreach($listcode as $codes){
                            extract($codes);
                        
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><img src="../upload/<?php echo $hinh_anh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                        <td><?php echo $ten_san_pham ?></td>
                        <td>
                            <a href="inc/page/admin_product/product_deletecodeproduct.php?id=<?php echo $id_san_pham;?>&code=<?php echo $code ;?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>

            </table>
        </div>

        <button  href="#" class="btn btn-primary" id="add-product">Thêm mã ưu đãi</button>            


        <div class="display__overlay add_product">
            <div class="form__update">
                <div class="box__title">
                    <div class="box__title--name"><h3>Thêm món ăn</h3></div>
                    <div class="box__title--iconl"><i class="fas fa-times"></i></div>
                </div>
                <hr>
                <div class="navbars__sidebars manage__product">
                             
                
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table">       
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th></th>
                                    
                                    <th>Tên sản phẩm</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i =1;
                                    $product_data = product_loadAll();
                                    foreach($product_data as $product){
                                        extract($product);
                                ?>
                                <tr>
                                    <td><?php  echo $i++; ?></td>
                                    <td><img src="../upload/<?php echo $hinh_anh; ?>" alt="" style="width:120px;object-fit:contain"></td>
                                    <th><?php echo $ten_san_pham; ?></th>
                                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $id_san_pham; ?>"></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                            </table>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="btnAddProductCode">
                                <a href="#" class="btn btn-dark">Thêm ưu đãi</a>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>

<?php 
    }
?>