<div class="col-lg-9">

<div class="navbars__right">

    <?php 
        if(isset($_GET['quanly'])){
            $qly = $_GET['quanly'];
        }else {
            $qly = '';
        }

        if($qly == "product_sale"){
                include_once('./inc/page/admin_product/product_sale.php');
        }

        else if($qly == "productList"){
            include_once('./inc/page/admin_product/product_list.php');
        }
        
        else if($qly == "product_add"){
                include_once('./inc/page/admin_product/product_add.php');
        }

        else if($qly == "product_update"){
            include_once('./inc/page/admin_product/product_update.php');
        }

        else if($qly == "product_delete"){
            include_once('./inc/page/admin_product/product_delete.php');
        }
        else if($qly =="category"){
            include_once('./inc/page/admin_category/category_list.php');
        }

        else if($qly == "categoryAdd"){
            include_once('./inc/page/admin_category/category_add.php');
        }
        
        else if($qly == "categoryDelete"){
            include_once('./inc/page/admin_category/category_delete.php');
        }

        else if($qly =="customer"){
            include_once('./inc/page/admin_customer/customer_list.php');
        }
        else if($qly == "order"){
            include_once('./inc/page/admin_order/order_list.php');
        }

        else if($qly == "customer_delete"){
            include_once('./inc/page/admin_customer/customer_delete.php');
        }

        else if($qly == "comment"){
            include_once('./inc/page/admin_comment/comment_list.php');
        }

        else if($qly == 'product_listReduce'){
            include_once('./inc/page/admin_product/product_listReduce.php');
        }

        else if($qly =='product_updateReduce'){
            include_once('./inc/page/admin_product/product_updateReduce.php');
        }

        else if($qly =="product_addCode"){
            include_once('./inc/page/admin_product/product_addCode.php');
        }

        else if($qly == "product_listCode"){
            include_once('./inc/page/admin_product/product_listCode.php');
        }
        else if($qly == "product_updateCode"){
            include_once('./inc/page/admin_product/product_updateCode.php');
        }


      
        else{
            include_once('./inc/dashboard.php');
        }
    ?>



</div>

</div>