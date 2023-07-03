
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    $data_danhMuc =  list_category();

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
            $addSuccess = "<p style='color:#157347'>Thêm thành công</p>";
        }
    }
?>
<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">Thêm sản phẩm</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Thêm sản phẩm</h3></div>
              
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="" method="POST"   enctype="multipart/form-data">

                                
                                        <div class="form-group">
                                            <label for="">Tên món ăn</label>
                                            <input type="text" class="form-control" name="product_name" ">
                                        </div>

                                                        
                                        <?php 
                                            if(isset($product['productName'])){
                                                echo $product['productName'];
                                            }
                                        ?>
                              

                                        <div class="form-group">
                                            <label for="">Giá</label>
                                            <input type="number" class="form-control" name="product_price" ">

                                        </div>

                                


                                        <div class="form-group">
                                            <label for="">Hình ảnh</label>
                                            <input type="File" class="form-control" name="product_image" ">
                                            
                                        </div>

                                    

                                        <div class="form-group">
                                            <label for="descripttion">Mô tả sản phẩm</label>
                                            <textarea name="product_des" id="" cols="30" rows="5" class="form-control"  ></textarea>
                                        </div>
                                   
                                        
                                   

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
                                                foreach($data_danhMuc as $category){
                                                    extract($category);
                                                
                                            ?>
                                                <option value="<?php echo $id_danh_muc; ?>"><?php echo $ten_danh_muc ?></option>
                                            <?php 
                                                }
                                            ?>
                                               
                                            </select>
                                        </div>
                               
                                        <br>

                                        <div class="form-group">

                                            <input type="submit" class="btn btn-primary" name="btnAddProduct">
                                           
                                        </div>

                                <?php 
                                    
                                ?>
                            </form>
                            <?php
                                if(isset($addSuccess)){
                                    echo $addSuccess;
                                }
                            ?>
                        </div>
                    </div>

            

            </div>

</div>