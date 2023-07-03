

<div class="navbars__brand">
        <div class="navbars__brand--title">Bảng giảm giá sản phẩm</div>
        <div class="navbars__brand--iconl"><i class="fas fa-bars"></i></div>
    </div>

    <div class="navbars__sidebars">
        <div class="search__form ">
                <div class="form">
                    
                </div>

                <div class="form__reload">
                    <a href="?quanly=product_listReduce"><i class="fas fa-sync-alt"></i></a>
                </div>
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Ngày kết thúc</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php 
                    $product_data = product_all_reduce();
                    $i=1;
                    foreach($product_data as $product){
                        extract($product);
                    
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><img src="../upload/<?php echo $hinh_anh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                    <td><?php echo $ten_san_pham; ?></td>
                    <td><?php  echo number_format($gia_san_pham).'VNĐ'?></td>
                    <td><?php echo number_format($gia_giam).'VNĐ' ?>vnđ</td>
                    <td><?php 
                        echo $ngay_het_han;
                    ?></td>
                    <td>
                        <a href="?quanly=product_updateReduce&id=<?php echo $id_san_pham; ?>" class="btn btn-primary" id="editProduct">Chỉnh sửa</a>
                        <a href="inc/page/admin_product/product_deleteReduce.php?id=<?php echo $id_san_pham;?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>

        <?php 
            if(count($product_data) <= 0 ){
                echo "<p style='text-align:center'>Chưa có sản phẩm nào giảm</p>";
            }
        ?>



        <a href="?quanly=product_sale" class="btn btn-primary">THÊM</a>



    </div>