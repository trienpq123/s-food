
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    if(isset($_POST['btnUpdateProduct'])){
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
            product_update($productName,$productPrice,$productImage,$productDes,$productHOT,$product_category,$id);
            move_uploaded_file($productImage_tmp,$taget_dir.$productImage);
        }
    }
?>
<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">Cập nhật sản phẩm</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Cập nhât sản phẩm</h3></div>
              
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="" method="POST"   enctype="multipart/form-data">

                                <?php 
                                    $product_data = product_load_one($id);
                                    if(is_array($product_data)){
                                        extract($product_data)
                                ?>                
                                        <div class="form-group">
                                            <label for="">Tên món ăn</label>
                                            <input type="text" class="form-control" name="product_name" value="<?php echo  $ten_san_pham; ?>">
                                        </div>

                                                        
                                        <?php 
                                            if(isset($product['productName'])){
                                                echo $product['productName'];
                                            }
                                        ?>
                              

                                        <div class="form-group">
                                            <label for="">Giá</label>
                                            <input type="number" class="form-control" name="product_price" value="<?php echo $gia_san_pham ?>">

                                        </div>

                                        <?php 
                                            if(isset($product['productPrice'])){
                                                echo $product['productPrice'];
                                            }
                                        ?>


                                        <div class="form-group">
                                            <label for="">Hình ảnh</label>
                                            <input type="File" class="form-control" name="product_image" value="<?php echo $gia_san_pham ?>">
                                            
                                        </div>

                                        <?php 
                                            if(isset($product['productImage'])){
                                                echo $product['productImage'];
                                            }
                                        ?>

                                        <div class="form-group">
                                            <label for="descripttion">Mô tả sản phẩm</label>
                                            <textarea name="product_des" id="" cols="30" rows="5" class="form-control"  ><?php echo $mo_ta; ?></textarea>
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
                                                <option value="1">Thức ăn </option>
                                                <option value="2">Đồ uống</option>
                                            </select>
                                        </div>
                                        <?php 
                                            if(isset($product['productCategory'])){
                                                echo $product['productCategory'];
                                            }
                                        ?>
                                        <br>

                                        <div class="form-group">

                                            <input type="submit" class="btn btn-primary" name="btnUpdateProduct">
                                           
                                        </div>

                                <?php 
                                    }
                                ?>
                            </form>
                        </div>
                    </div>

            

            </div>

</div>