
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    $data_product =  product_loadAll();

    if(isset($_POST['btnAddProduct'])){
        $productPrice = $_POST['product_price'];
        $productCode = $_POST['product_code'];
        $date = $_POST['product_date'];

        $productName = $_POST['product'];

        $product = [];

        if(empty($productCode)){
            $product['productCode'] = "Không được để trống";
        }

        if(empty($productName)){
            $product['productName'] = "Không được để trống";

        }

        if(empty($productPrice)){
            $product['productPrice'] = "Không được để trống";
        }


        if(empty($date)){
            $product['date'] = "Không được để trống";
        }


        

        if(empty($product)){
            code_insert($productCode,$productPrice,$date);
            // code_insert_product($productCode,$productName);
            $addSuccess = "<p style='color:#157347'>Thêm thành công</p>";
        }
    }
?>
<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">Thêm GIFT CODE</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Thêm GIFT CODE</h3></div>
              
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="" method="POST"   enctype="multipart/form-data">

                                
                                        <div class="form-group">
                                            <label for="">Mã Code</label>
                                            <input type="text" class="form-control" name="product_code" >
                                        </div>

                                        
                                                        
                                        <?php 
                                            if(isset($product['productName'])){
                                                echo $product['productName'];
                                            }
                                        ?>
                              

                                        
                                        <div class="form-group">
                                            <label for="">Phí Giảm</label>
                                            <input type="number" class="form-control" min="0" value="0" name="product_price" >
                                        </div>


                                        <div class="form-group">
                                            <label for="">Ngày hết hạn</label>
                                            <input type="date" class="form-control" name="product_date" ">

                                        </div>


                                        <!-- <div class="form-group">
                                            <label for="">Sản phẩm Áp dụng</label>
                                            <select name="product" id="" class="form-control">
                                                    <option value="">Chưa chọn sản phẩm</option>
                                                    <?php
                                                        foreach($data_product as $product){
                                                            extract($product);
                                                    ?>
                                                    <option value="<?php echo $id_san_pham ?>"><?php echo $ten_san_pham; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                            </select>

                                        </div> -->

                                



                           
                                        
        
                               
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