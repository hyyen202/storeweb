<?php
  $id = $_GET['i'];
  $profile = profile_customer($db, $id);
  foreach($profile as $item){
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div id="results"></div> <!-- Changed class to id for unique identification -->
              <p class="text-uppercase text-sm">Thông tin khách hàng</p>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tên khách hàng</label>
                    <input class="form-control" type="text" value="<?php echo $item['name']?>" readonly>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" value="<?php echo $item['email']?>" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                    <input class="form-control" type="text" value="<?php echo $item['phone']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                    <input class="form-control" type="date" value="<?php echo $item['birthday']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Giới tính</label>
                    <input class="form-control" type="text" value="<?php 
                                                            if($item['gender'] == 0)
                                                            {  echo 'Nam';}
                                                            else{
                                                              echo 'Nữ';
                                                            }?>" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                    <input class="form-control" type="text" value="<?php echo $item['address']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Số lần hủy đơn</label>
                    <input class="form-control" type="text" value="<?php echo $item['scam']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Ngày tạo tài khoản</label>
                    <input class="form-control" type="text" value="<?php echo $item['create_at']?>" readonly>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
            </div>
          </div>
        </div>
      </div>
<?php  }?>