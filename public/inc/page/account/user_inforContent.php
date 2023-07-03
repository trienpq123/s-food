    
                <div class="col-lg-9">
                     
                     <div class="product__cart--right box--line" style="width: 100%;">
                          
                            <h3>Thông tin cá nhân</h3>
                             
                            <form action="" method="POST" enctype="multipart/form-data">
                            
                                     <div class="row">
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                 <label for="fullname">Họ</label>
                                                 <input type="text" class="form-control" placeholder="Thêm họ tên" value="<?php echo $ho_ten; ?>" name="firstname">
                                             </div>
                                         </div>
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                 <label for="fullname">Tên</label>
                                                 <input type="text" class="form-control" placeholder="Thêm họ tên" value="<?php echo $ten; ?>" name="lastname">
                                             </div>
                                         </div>
                                     </div>
 
                                 <div class="form-group">
                                     <label for="address">Địa chỉ</label>
                                     <input type="text" class="form-control" placeholder="Thêm địa chỉ" value="<?php echo $dia_chi; ?>" name="address">
                                 </div>
 
                                 <div class="form-group">
                                     <label for="email">Email</label>
                                     <input type="text" class="form-control" placeholder="Thêm Email" value="<?php echo $email; ?>" name="email">
                                 </div>
 
                                 <div class="form-group">
                                     <label for="phone">Số điện thoại</label>
                                     <input type="text" class="form-control" placeholder="Thêm số điện thoại" value="<?php echo $sdt; ?>" name="phone">
                                 </div>
 
                         
 
                                 <div class="form-group" style="margin:3px 0">
                                    
                                         <div class="user">
                                             <div class="user--avatar">
                                                 <img src="public/upload/<?php echo $hinh; ?>" alt="Avatar" style="width:80px;height:80px;border-radius: 50%;" ">
                                             </div>
                                            
                                             <div class="user--change">
                                                 <input type="file" class="form-control" value="<?php echo $hinh_anh ?>" name="image">
                                             </div>
                                         </div>
                                   
                                 </div>
 
                                <div class="form-group">
                                     <button class="btn btn-dark" name="btnChange">Lưu thay đổi</button>
                                </div>
                            </form>
                       
                     </div>
                 </div>