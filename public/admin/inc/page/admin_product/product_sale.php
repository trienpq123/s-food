

<div class="container">
    <div class="navbars__brand">
            <div class="navbars__brand--title">Thêm ưu đãi sản phẩm</div>

    </div>

            <div class="navbars__sidebars product__sale">


                    <div class="form__update">
                        <div class="box__title">
                            <div class="box__title--name"><h3>Thêm ưu đãi món ăn</h3></div>
                            <div class="box__title--iconl"><i class="fas fa-times"></i></div>
                        </div>
                        <hr>
                        <div class="navbars__sidebars ">
                            <form action="inc/page/admin_product/product_discount.php" method="POST"   enctype="multipart/form-data">

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
                                    <button class="btn btn-primary" name="btnDiscount">Thêm</button>
                                </div>


                            </form>
                        </div>
                    </div>

            

            </div>

</div>