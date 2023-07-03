<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }
    if(isset($_POST['btn_updateReduce'])){
        $id = $_POST['id_product'];
        $discount = $_POST['discount'];
        $date = $_POST['date'];

        product_updateReduce($id,$discount,$date);
    }
?>

<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">CẬP NHẬT GIẢM GIÁ SẢN PHẨM</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Cập nhật giá giảm món ăn</h3></div>
                            <div class="box__title--iconl"><i class="fas fa-times"></i></div>
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="" method="POST"   enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="">Tên món ăn</label>
                                    <select name="id_product" id="" class="form-control">
                                        <?php 
                                            $data_product  = product_loadAll();
                                            $i = 1;
                                            foreach($data_product as $data){
                                                extract($data);
                                        ?>
                                                <option value="<?php echo $id_san_pham ?>"><?php echo $i++.'. '.$ten_san_pham; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Giảm giá</label>
                                    <input type="number" class="form-control" name="discount">
                                </div>

                                <div class="form-group">
                                    <label for="">Ngày hết hạn</label>
                                    <input type="date" class="form-control" name="date">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" name="btn_updateReduce">CẬP NHẬT</button>
                                </div>


                            </form>
                        </div>
                    </div>

            

            </div>

</div>