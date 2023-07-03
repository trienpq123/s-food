<?php 
    session_start();
    include_once('../../dao/pdo.php');
    include_once('../../dao/dao_admin/product/product__add.php');
    include_once('../../dao/dao_admin/category/category.php');
    include_once('../../dao/dao_admin/customer/customer.php');
    include_once('../../dao/dao_customer/order.php');
    include_once('../../dao/comment.php');
    include_once('../../dao/product_load.php');

    if($_SESSION['user']['vai_tro'] != 1){
        header('location: ../../?');
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <title>Dashboard ADMIN</title>
</head>
<body>
    <div class="row">
        
        <?php 
            include_once('inc/menu.php');

            include_once('inc/content.php');
        ?>
        



    </div>

    <script src="javascript/js.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        CKEDITOR.replace('product_des');
    </script>

    <script>
       
       $(document).ready(function(){
           thongke();
            var chart =  new Morris.Area({

            element: 'chart',
                  


            xkey: 'date',

            ykeys: ['date','order','sales','quality'],

            labels: ['date','order','sales','quality']
            });
           $('.select-date').change(function(){
                var time = $(this).val();
                if(time == '7ngay'){
                    var text = '7 ngày qua';
                }else if(time == '14ngay'){
                    var text = '14 ngày qua';
                }else if(time == '21ngay'){
                    var text = '21 ngày qua';
                }else if(time == '30ngay'){
                    var text = '1 tháng qua';
                };
                $('#text-date').text(text);
                $.ajax({
                   url:"inc/page/admin_statistical/thongke.php",
                   method:"POST",
                   dataType: "JSON",
                   data:{time:time},
                   success:function(data){
                           chart.setData(data);
                           $('#text-date').text(text);
                       
                   }
               });
           });
    
           function thongke(){
               var text = '1 tháng qua';
               $('#text-date').text(text);
               $.ajax({
                   url:"inc/page/admin_statistical/thongke.php",
                   method:"POST",
                   dataType: "JSON",
                   success:function(data){
                           chart.setData(data);
                           $('#text-date').text(text);
                       
                        }
               });  
           };
       });

       



    

    //        $.ajax({    
    //            url:"inc/page/admin_statistical/thongke.php",
    //            method:"POST",
    //            dataType:"JSON",
    //            data:{time:time},
    //            success:function(data){
    //                char.setData(data);
    //                $('#text-date').text(text);
    //            }
    //        })
    //    });

     
   </script>


</body>
</html>