<?php 
    
    session_start();
    include_once('dao/pdo.php');
    include_once('dao/signUp.php');
    include_once('dao/checkLogin.php');
    include_once('dao/product_load.php');
    include_once('dao/dao_customer/customer.php');
    include_once('dao/dao_customer/order.php');
    include_once('dao/dao_admin/customer/customer.php');
    include_once('dao/dao_admin/category/category.php');
    include_once('dao/comment.php');
    include_once('dao/cart.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/lien_he.css">
    <title>CAKE HEALTHY</title>
</head>
<body>
    
    <?php 
        include_once('public/inc/header.php');



     
        
        
        include_once('public/inc/home.php');
        

       


        include_once('public/inc/footer.php');

    ?>

  

 
    


    <script src="public/javascript/js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
                $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                    loop:true,
                    margin:4,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                 });
                });


                // $(document).ready(function(){
                //     $(".signup--title").toggle({
                //         $("")
                //     });
                // });


                
    </script>
</body>
</html>