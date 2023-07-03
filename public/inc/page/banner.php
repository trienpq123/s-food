<?php 
  $data_hot = product_sale();
?>
<div class="container">
        <div class="banner__real">

  
           

            
            <div class="col-lg-12">
                
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                  
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              
                    <?php 
                    $i = 1;
                    foreach($data_hot as $hot ){
                    ?>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php  echo $i++; ?>" aria-label="Slide 3"></button>
                    <?php 
                    }
                    ?>
                   
                    </div>
                    <div class="carousel-inner">
                 
                      <div class="carousel-item active">
                        <img src="public/image/food-banner.jpg" class="d-block w-100" alt="...">
                      </div>
                    <?php 
                    foreach($data_hot as $hot){
                      extract($hot);
                    ?>
                      <div class="carousel-item ">
                        <img src="public/upload/<?php echo $hinh_anh; ?>" class="d-block w-100" alt="..." style="width:100%;object-fit:contain">
                      </div>
                    <?php 
                    }
                    ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>



            
 
            <!-- <div class="col-lg-4">
                <div class="banner__left">
                    <div class="col-lg-12">
                        <div class="banner__left--top">
                            <img src="public/image/product/banner_3.PNG" alt="" style="width: 100%; height: 230px; object-fit: cover; object-position: center;">
                        </div>
    
                        <div class="banner__left--bottom">
                            <img src="public/image/product/banner_2.jpg" alt="" style="width: 100%; height: 230px; object-fit: cover; object-position: center;">
                        </div>
                    </div>
                </div> 
    
            </div> -->
        </div>
</div>