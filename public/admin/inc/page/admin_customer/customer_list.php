

<div class="navbars__brand">
        <div class="navbars__brand--title">Danh sách khách hàng</div>
        <div class="navbars__brand--iconl"><i class="fas fa-bars"></i></div>
</div>

    <div class="navbars__sidebars">
        <div class="search__form ">
                <div class="form">
                    <div class="form-group">
                        <div class="input--search ">
                            <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                            <div class="search--iconl"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form__reload">
                    <a href="#"><i class="fas fa-sync-alt"></i></a>
                </div>
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php 
                    $i=1;
                    $customer_data = customer_load();
                
                    foreach($customer_data as $customer){
                        extract($customer);
                    
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><img src="../upload/<?php echo $hinh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                    <td><?php echo $ho_ten.$ten; ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $sdt?></td>
                     <td><?php echo $dia_chi; ?></td>   
                    <td>
                        <a href="?quanly=customer&id_cus=<?php echo $id_khach_hang;?>" class="btn btn-primary">Vai trò</a>
                        <a href="?quanly=customer_delete&id=<?php echo $id_khach_hang;?>" class="btn btn-danger">Xóa</a>
                      
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>


    </div>



    
<?php
   
   if(isset($_GET['id_cus'])){
       $id = $_GET['id_cus'];
   
       if(isset($_POST['btnVaiTro'])){
        $vaitro = $_POST['vaitro'];

        customer_vaitro($id,$vaitro);
    }
    
    $customer_data = customer_one($id);

?>


<div class="navbars__brand">
        <div class="navbars__brand--title">Vài trò của khách hàng: <?php  echo $ho_ten.$ten; ?> </div>

    
</div>

<div class="container">
    <form action="" method="POST">
          <div class="form-group">
                <select name="vaitro" id="" class="form-control">
                    <option value="0">Vai trò khách hàng</option>
                    <option value="1">Vai trò admin</option>
                </select>
          </div>
          <br>
          <div class="form-group">
                <button class="btn btn-primary" name="btnVaiTro">Xác nhận</button>
          </div>
    </form>
</div>
<?php 
   }
?>