
<?php 

    if(isset($_POST['btnAddCategory'])){
        $categoryName = $_POST['category_name'];
        $category = [];
        
        if(empty($categoryName)){
            $category['categoryName'] = "Không được để trống tên danh mục";
        };

        if(empty($category)){
            add_category($categoryName);
        }
    }

?>

<div class="navbars__brand">
        <div class="navbars__brand--title">Quản lý danh mục</div>
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
                    <th>Tên danh mục</th>
                 
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            
            <tbody class=""> 
             <?php 
                $category_data = list_category();
                $i = 1;
                foreach($category_data as $categorys){
                    extract($categorys);
             ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $ten_danh_muc; ?></td>
                    <td>
                        <button class="btn btn-primary" id="editProduct">Chỉnh sửa</button>
                        <a href="?quanly=categoryDelete&id=<?php echo $id_danh_muc; ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>

        </table>
        <button  class="btn btn-primary" id="add-product">Thêm danh mục</button>
        <div class="display__overlay add_product">
            <div class="form__update">
                <div class="box__title">
                    <div class="box__title--name"><h3>Thêm danh mục</h3></div>
                    <div class="box__title--iconl"><i class="fas fa-times"></i></div>
                </div>
                <hr>
                <div class="navbars__sidebars manage__product">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>

                        <?php 
                            if(isset($category['categoryName'])){
                                echo $category['categoryName'];
                            }
                        ?>

            
                    <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btnAddCategory" value="Thêm danh mục">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="display__overlay edit_product">
        <div class="form__update">
            <div class="box__title">
                <div class="box__title--name"><h3>Chỉnh sửa món ăn</h3></div>
                <div class="box__title--iconl"><i class="fas fa-times"></i></div>
            </div>
            <hr>
            <div class="navbars__sidebars manage__product">
                <form action="" method="POST"   enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên món ăn</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="File" class="form-control">
                        
                    </div>

                    <div class="form-group">
                        <label for="">Thuộc danh mục</label>
                        <select name="" id="" class="form-control">
                            <option value="0">Thức ăn nhanh</option>
                            <option value="1">Thức ăn nóng</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                        <a href="#" class="btn btn-dark">Thêm ưu đãi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>