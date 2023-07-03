
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }

    if(isset($_POST['btnAddProduct'])){
        $categoryName = $_POST['category_name'];
     
        $product = [];
        if(empty($categoryName)){
            $product['categoryName'] = "Không được để trống";

        }

        

        if(empty($product)){
            add_category($categoryName);
            $addSuccess = "<p style='color:#157347'>Thêm thành công</p>";
        }
    }
?>
<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">Thêm danh mục</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Thêm danh mục</h3></div>
              
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="" method="POST"   enctype="multipart/form-data">

                                
                                        <div class="form-group">
                                            <label for="">Tên danh mục</label>
                                            <input type="text" class="form-control" name="category_name" ">
                                        </div>

                                                        
                                        <?php 
                                            if(isset($product['categorytName'])){
                                                echo $product['categorytName'];
                                            }
                                        ?>
                              


                               
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