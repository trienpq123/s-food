
<?php 
    if(isset($_POST['btnAddProduct'])){
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];

        $productImage = $_FILES['product_image']['name'];
        $productImage_tmp = $_FILES['product_image']['tmp_name'];
    
        $taget_dir = "../upload/";

        $productDes = $_POST['product_des'];
        $productHOT = $_POST['product_hot'];
        $product_category = $_POST['product_type'];


        

        $product = [];
        if(empty($productName)){
            $product['productName'] = "Không được để trống";

        }

        if(empty($productPrice)){
            $product['productPrice'] = "Không được để trống";
        }

        if(empty($productImage)){
            $product['productImage'] = "Chưa chọn ảnh";
        }

        if(empty($productDes)){
            $product['productDes'] = "Không được để trống";
        };


        

        if(empty($product)){
            product__add($productName,$productPrice,$productImage,$productDes,$productHOT,$product_category);
            move_uploaded_file($productImage_tmp,$taget_dir.$productImage);
        }


    }
?>

<div class="navbars__brand">
        <div class="navbars__brand--title">Quản lý sản phẩm</div>
        <div class="navbars__brand--iconl"><i class="fas fa-bars"></i></div>
    </div>

    <div class="navbars__sidebars">
        <div class="search__form ">
                <div class="form">
                    <div class="form-group">
                        <div class="input--search ">
                            <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                            <div class="search--iconl"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form__reload">
                    <a href="#"><i class="fas fa-sync-alt"></i></a>
                </div>
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php 
                    $product_data = product_load();
                
                    foreach($product_data as $product){
                        extract($product);
                    
                ?>
                <tr>
                    <td>1</td>
                    <td><img src="../upload/<?php echo $hinh_anh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                    <td><?php echo $ten_san_pham; ?></td>
                    <td><?php echo $gia_san_pham ?>vnđ</td>
                    <td><?php 
                        if($gia_giam > 0){
                            echo number_format( $gia_giam).'VNĐ';
                        }else{
                            echo "0";
                        }
                    ?></td>
                    <td>
                        <a href="?quanly=product_update&id=<?php echo $id_san_pham; ?>" class="btn btn-primary" id="editProduct">Chỉnh sửa</a>
                        <a href="?quanly=product_delete&id=<?php echo $id_san_pham;?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>
        <button  class="btn btn-primary" id="add-product">Thêm món ăn</button>
        <a href="?quanly=product_sale" class="btn btn-dark">Thêm ưu đãi</a>
        <div class="display__overlay add_product">
            <div class="form__update">
                <div class="box__title">
                    <div class="box__title--name"><h3>Thêm món ăn</h3></div>
                    <div class="box__title--iconl"><i class="fas fa-times"></i></div>
                </div>
                <hr>
                <div class="navbars__sidebars manage__product">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Tên món ăn</label>
                            <input type="text" class="form-control" name="product_name">
                        </div>

                        <?php 
                            if(isset($product['productName'])){
                                echo $product['productName'];
                            }
                        ?>

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="number" class="form-control" name="product_price">

                        </div>

                        <?php 
                            if(isset($product['productPrice'])){
                                echo $product['productPrice'];
                            }
                        ?>

                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="File" class="form-control" name="product_image">
                            
                        </div>

                        <?php 
                            if(isset($product['productImage'])){
                                echo $product['productImage'];
                            }
                        ?>

                        <div class="form-group">
                            <label for="descripttion">Mô tả sản phẩm</label>
                            <textarea name="product_des" id="" cols="30" rows="5" class="form-control" ></textarea>
                        </div>

                        <?php 
                            if(isset($product['productDes'])){
                                echo $product['productDes'];
                            }
                        ?>

                        <div class="form-group">
                            <label for="descripttion">Sản phẩm Hot</label>
                            <div class="form-group">
                                <input type="radio" name="product_hot" value="0" checked> <label for="">Có</label>
                                <input type="radio" name="product_hot" value="1"> <label for="">Không</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Thuộc danh mục</label>
                            <select name="product_type" id="" class="form-control">
                                <option value="0">Chưa chọn danh mục</option>
                                <?php 
                                $data_danhMuc =  list_category();
                                 foreach($data_danhMuc as $category){
                                     extract($category);
                                ?>
                                <option value="<?php echo $id_danh_muc; ?>"><?php echo $ten_danh_muc; ?></option>
                                <?php 
                                 }
                                ?>
        
                            </select>
                        </div>
                        
                        <?php 
                            if(isset($product['productCategory'])){
                                echo $product['productCategory'];
                            }
                        ?>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btnAddProduct">
                            <a href="#" class="btn btn-dark">Thêm ưu đãi</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="display__overlay edit_product">
        <div class="form__update">
            <div class="box__title">
                <div class="box__title--name"><h3>Chỉnh sửa món ăn</h3></div>
                <div class="box__title--iconl"><i class="fas fa-times"></i></div>
            </div>
            <hr>
            <div class="navbars__sidebars manage__product">
                <form action="" method="POST"   enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên món ăn</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="File" class="form-control">
                        
                    </div>

                    <div class="form-group">
                        <label for="">Thuộc danh mục</label>
                        <select name="" id="" class="form-control">
                            <option value="0">Thức ăn nhanh</option>
                            <option value="1">Thức ăn nóng</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                        <a href="#" class="btn btn-dark">Thêm ưu đãi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>