<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }

    $product_data = product_detail($id);
    
    extract($product_data);

    $comment_data = comment_list($id);
    

    $product_list

    // if(isset($_SESSION['mess_error'])){
    //     echo $_SESSION['mess_error'];
    // }else{
    //     echo "123";
    // }
?>

<main>

<div class="container">
  
        <div class="product__detailt box--line">

            <div class="product__detailt--left col-lg-6 col-sm-12 col-md-12 col-12">
                <div class="product__image">
                    <div class="product__image--big col-12 col-md-12 col-sm-12 col-xs-12">
                        <img src="public/upload/<?php echo $hinh_anh; ?>" alt="" style="width: 100%;height: 100%;object-fit: cover;">
                        <?php 
                        if($hot_san_pham == 1 ){
                            echo "      <div class='product--hot'>HOT</div>";
                        }
                    ?>
                    </div>
            
                    <!-- <div class="product__image--slider">
                        <div class="owl-carousel owl-theme">
                            <div class="item" ><img src="image/product/banh_lava.jpeg" alt=""></div>
                            <div class="item" ><img src="image/product/banh_lava.jpeg" alt=""></div>
                            <div class="item" ><img src="image/product/banh_lava.jpeg" alt=""></div>
                            <div class="item" ><img src="image/product/banh_lava.jpeg" alt=""></div>
                        </div>
                    </div> -->
                    
                </div>
            </div>

            <div class="product__detailt--right col-lg-6 col-md-12 col-sm-12 col-12">
                
                <div class="product__text">
                    <h3><?php echo $ten_san_pham; ?></h3>
                    <hr>
                    <?php 
                        if($gia_giam > 0){ 
                    ?>
                    <div class="product__text--item  product__text--price">
                        <div class="product__price--sale"><?php echo $gia_giam; ?>VNĐ</div>
                        <div class="product__price--unit"><?php echo $gia_san_pham; ?>VND</div>
              
                    </div>
                    <?php 
                        }else{
                    ?>
                       <div class="product__text--item  product__text--price">
                        <div class="product__price--sale"><?php echo $gia_san_pham; ?>VNĐ</div>
                        <!-- <div class="product__price--unit">100000VND</div> -->
              
                    </div>
  
                    <?php 
                        }
                    ?>
                    <hr>
                    <div class="product__text--item product__text--promotion">
                        <div class="product__promotion--title">Khuyến Mãi</div>
                        <ul class="product__promotion--list">
                            <li>Được miễn phí ship nội thành bán kính 1km</li>
                            <li>Được tặng ly trà sữa với hóa đơn trên 200k</li>
                            <li></li>
                        </ul>
                    </div>
                    <hr>
                    <form action="public/inc/page/process/process_addCart.php?id=<?php echo $id_san_pham; ?>" method="POST">
                        <div class="product__text--item product__text--count">
                            <!-- <div class="product__count--minus">-</div>
                            <div class="product__count--show" id="product__count--show" name="Quality">1</div>
                            <div class="product__count--plus">+</div> -->
                            <input type="number" class="product__count--show form-control" name="Quality" style="width:120px;" min='1' value="1" >
                        </div>
                        
                        <div class="product__text--item product__text--button">
                            <input type="submit" class="btn btn-primary" value=" Thêm giỏ hàng" name="btn_addCart">
                            <!-- <input type="submit" class="btn btn-danger" Value="Mua Ngay"> -->
                         
                        </div>
                    </form>
                    
                    <!-- <div class=" product__text--item product__code">MSP: 001</div> -->
                </div>
            </div>
        </div>
        

    
        <div class="box__rview">
            <div class="box__review ">
                <div class="box__review--name box__review--description active" id="button--description">
                    Mô tả
                </div>

                <div class="box__review--name box__review--comment" id="button--cmt">Chi tiết bình luận</div>
            </div>
            <div class="review__content " id="desription--text">
                <h3>MÔ TẢ</h3>
                <div>
                    <?php 
                        echo $mo_ta;
                    ?>
                </div>
            </div>

            <div class="box__cmt review__content" id="box__cmt">
                <h3>Chi tiết bình luận</h3>

                <?php 
                    if(isset($_SESSION['user'])){
                ?>
                <div class="box__cmt--item cmt__form">
                    <form action="public/inc/page/process/process_cmt.php?id_product=<?php echo $id_san_pham; ?>" method="POST">

                        <div class="cmt__form--text ">
                            <textarea name="cmt_text" id="" cols="20" rows="3" class="form-control"></textarea>
                        </div>

                 
                            <input type="submit"  name="btn_cmt" class="btn btn-primary cmt__form--text" value="GỬI" >
                       
                    </form>
                </div>
                <?php 
                    }else{
                ?>
                   
                <div class="box__cmt--item cmt__not--login">
                    VUI LÒNG ĐĂNG NHẬP ĐỂ BÌNH LUẬN
                </div>
                <?php 
                    }
                ?>
                <div class="box__cmt--item">
                    <div class="cmt--count">Có <?php echo count($comment_data) ?> Bình luận</div>
                        <?php 
                            foreach($comment_data as $cmt){
                                extract($cmt);
                        ?>
                                <div class="user__cmt">
                                    <div class="user__cmt--avatar">
                                        <img src="public/upload/<?php echo $hinh; ?>" alt="Facebook" style="width: 40px; height:40px;border: 50%;">
                                    </div>

                                    <div class="user__cmt--infor">
                                        <div class="user user--name">
                                            <strong><?php echo $ten; ?></strong>
                                        </div>
                                        <div class="user cmt--text">
                                            <p><?php echo $text_bl; ?>
                                            <?php
                                                if(isset($_SESSION['user']) && $_SESSION['user']['id_khach_hang'] == $id_khach_hang){
                                                    echo "<a href='public/inc/page/process/process_deletecmt.php?id=$ma_binh_luan&id_product=$id_san_pham'>Xóa</a>";
                                                } 
                                            ?>    
                                            </p>
                                        
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                        <?php 
                            }
                        ?>
                </div>
            </div>
        </div>


         <div class="product">
     
        <h3><i class="fas fa-pizza-slice"></i> Sản phẩm liên quan</h3>
       
<!--           
        <div class="product__title">
           
            <div class="product__title--name">
                Giam giá <span>(67 SẢN PHẨM )</span>
            </div>
            <div class="product__title--more">
                <a href="#">Xem thêm</a>
            </div>
        </div> -->
    
    
            <div class="product__list">
            <?php 
                $relations = product_relation($id_danh_muc);
                foreach($relations as $relation){
                    extract($relation);
                
            ?>
                  
                        <div class="product__list--item col-lg-4 col-md-6 .col-sm-12 col-xs-12 col-12">
                        
                                    <div class="product--image">
                                        <img src="public/upload/<?php echo $hinh_anh ?>" alt="Món An" style="width:100%;height:100%;object-fit:contain">
                                        <div class="product--add">
                                        <a href="?quanly=productDetailt&id=<?php echo $id_san_pham; ?>">Thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                <a href="?quanly=productDetailt&id=<?php echo $id_san_pham; ?>">
                                    <div class="product--name">
                                        <?php echo $ten_san_pham; ?>
                                    </div>
                            </a>
                            
                            <div class="product__box">
                               <?php 
                                if($gia_giam < 0 || $gia_giam == ''){
                               ?>
                                    <div class="product__price">
                                        <span class="product__price--sale"><?php echo number_format($gia_san_pham); ?> VNĐ</span>
                                    </div>
                                <?php 
                                }else{
                                ?>
                                   <div class="product__price">
                                        <div class="product__price--old"><?php echo number_format($gia_san_pham); ?> VNĐ</div>
                                        <span class="product__price--sale"><?php echo number_format($gia_san_pham - $gia_giam) ?> VNĐ</span>
                                    </div>

                                    <div class="product__sale">
                                        -<?php echo  $gia_giam ?> VNĐS
                                    </div>
                                <?php 
                                }
                                ?>
                            </div>

                            <div class="product--hot">HOT</div>

                        </div>
                        <?php 
            }
        ?>

                        <!-- DISPLAY GRID  -->
            

                    
        </div>
       
        
    </div>
       
    
</div>

</main>

<script>
    

function productBuyQuality() {
    const countPlus = document.querySelector(".product__count--plus");

    const countMinus = document.querySelector(".product__count--minus");
    const countShow = document.getElementById("product__count--show");

    countPlus.onclick = function() {
        let qlt = Number(countShow.innerHTML) + 1;


        countShow.innerHTML = qlt;
    }


    countMinus.onclick = function() {
        let qlt = Number(countShow.innerHTML) - 1;

        if (Number(countShow.innerHTML) < 1) {
            count_show.innerHTML = 0;
            qlt = Number(countShow.innerHTML);
        }

        countShow.innerHTML = qlt;
    }
}

// productBuyQuality();


function productDetail() {
    const btnDes = document.getElementById("button--description"),
        btnCmt = document.getElementById("button--cmt"),
     textCmt = document.getElementById("box__cmt")



    let textDes = document.getElementById("desription--text");
    btnDes.onclick = function() {

        btnDes.classList.add("active");
        btnCmt.classList.remove("active");
        textCmt.style.display = "none";
        textDes.style.display = "block"
    }



    btnCmt.onclick = function() {

        btnDes.classList.remove("active");
        btnCmt.classList.add("active");
        textCmt.style.display = "block";
        textDes.style.display = "none";
  
    }

}


productDetail();
</script>