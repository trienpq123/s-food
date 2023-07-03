
<?php 
    $comment_list = comment_list_all();
?>

<div class="navbars__brand">
        <div class="navbars__brand--title">Quản lý bình luận</div>
        <div class="navbars__brand--iconl"><i class="fas fa-bars"></i></div>
    </div>

    <div class="navbars__sidebars">
        <div class="search__form ">
                <!-- <div class="form">
                    <div class="form-group">
                        <div class="input--search ">
                            <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                            <div class="search--iconl"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form__reload">
                    <a href="#"><i class="fas fa-sync-alt"></i></a>
                </div> -->
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Tổng bình luận</th>
                    <th>Bình luận mới nhất</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php
                    $i = 1;
                    foreach($comment_list as $comment){
                        extract($comment);
                    
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><img src="../upload/<?php echo $hinh_anh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                    <td><?php echo $ten_san_pham; ?></td>
                    <td><?php echo $tong_binh_luan ?></td>
                    <td><?php echo $bl_date; ?></td>
                    <td>
                        <a href="?quanly=comment&id=<?php echo $id_san_pham; ?>" class="btn btn-primary" id="editProduct">Chi tiết bình luận</a>
                        <!-- <a href="?quanly=product_delete&id=<?php echo $id_san_pham;?>" class="btn btn-danger">Xóa</a> -->
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>


    </div>

<?php 
    if(isset($_GET['id'])){
        $id =$_GET['id'];

        $comment_data = comment_list_text($id);
    
?>
<h3>Bình luận của sản phẩm:</h3>


<div class="navbars__sidebars">
        <div class="search__form ">
                <!-- <div class="form">
                    <div class="form-group">
                        <div class="input--search ">
                            <input type="text" class="form-control" placeholder="Tìm kiếm tại đây">
                            <div class="search--iconl"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form__reload">
                    <a href="#"><i class="fas fa-sync-alt"></i></a>
                </div> -->
        </div>

       

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên khách hàng</th>
                    <th>Bình luận</th>
                    <th>Ngày bình luận</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
                <?php
                    $i = 1;
                    foreach($comment_data as $comment){
                        extract($comment);
                    
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><img src="../upload/<?php echo $hinh; ?>" alt="" style="width:70px;height:70px;border-radius: 50%;object-fit: cover;";></td>
                    <td><?php echo $ho_ten . $ten; ?></td>
                    <td><?php echo $text_bl ?></td>
                    <td><?php echo $bl_date; ?></td>
                    <td>
                        <?php 
                            if($status == 0){
                        ?>
                        <a href="inc/page/admin_comment/process_comment.php?id=<?php echo $ma_binh_luan; ?>" class="btn btn-primary" id="editProduct">Phê duyệt</a>
                        <?php 
                            }else{
                                echo "<p style='color:#198754'>Đã phê duyệt</>";
                            }
                        ?>
                        <a href="inc/page/admin_comment/delete_comment.php?id=<?php echo $ma_binh_luan; ?>" class="btn btn-danger" id="editProduct">Xóa</a>
                        <!-- <a href="?quanly=product_delete&id=<?php echo $id_san_pham;?>" class="btn btn-danger">Xóa</a> -->
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>

        </table>


    </div>
<?php 
    }
?>