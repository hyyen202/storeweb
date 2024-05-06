<?php
  $id = $_GET['i'];
  $new_orders = new_orders($db, $id);
  foreach($new_orders as $order){
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Thông tin đơn hàng</p>
                <button class="btn btn-primary btn-sm ms-auto">Xác nhận</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Thông tin giao hàng</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tên khách hàng</label>
                    <input class="form-control" type="text" value="<?php echo $order['customer']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" value="<?php echo $order['email']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                    <input class="form-control" type="text" value="<?php echo $order['phone']?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                    <input class="form-control" type="date" value="<?php echo $order['birthday']?>" readonly>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Thông tin giao hàng</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                    <input class="form-control" type="text" value="<?php echo $order['address']?>" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Ghi chú</label>
                    <input class="form-control" type="text" value="<?php echo $order['note']?>">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-center">
                Đơn hàng: #<?php echo $order['id']?>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-sm opacity-8">Số lượng</span>
                      <span class="text-lg font-weight-bolder"><?php echo $order['qty']?></span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-sm opacity-8">Sale(%)</span>
                      <span class="text-lg font-weight-bolder"><?php echo $order['discount']?></span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-sm opacity-8">Giá</span>
                      <span class="text-lg font-weight-bolder"><?php echo $order['price']?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-2">
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Thanh toán: <?php echo $order['total']?>
                </div>
                <div class="h6 mt-2">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $order['product']?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Ngày đặt hàng: <?php echo $order['create_at']?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php  }?>