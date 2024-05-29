<?php
  $id = $_GET['i'];
  $new_orders = orders($db, $id);
  foreach($new_orders as $order){
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="d-flex align-items-center col-md-9 ">
                            <p class="mb-0">Thông tin đơn hàng</p>
                        </div>
                        <div class="col-md-2 border rounded d-flex justify-content-center align-items-center">
                            <?php 
                                if($order['status'] == 0){
                                    echo '<a class="btn btn-link text-danger d-flex align-items-center justify-content-center text-gradient p-0 mb-0">Chưa nhận</a>';
                                }else{
                                    echo '<a class="btn btn-link text-success d-flex align-items-center justify-content-center text-gradient p-0 mb-0">Đã nhận</a>';
                                }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div id="results"></div> <!-- Changed class to id for unique identification -->
                    <p class="text-uppercase text-sm">Thông tin giao hàng</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tên khách hàng</label>
                                <input class="form-control" type="text" value="<?php echo $order['customer']?>"
                                    readonly>
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
                                <input class="form-control" type="date" value="<?php echo $order['birthday']?>"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <input class="form-control" type="text" value="<?php echo $id?>" id="idbill" hidden>
                    <!-- Removed space in value -->
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
                                <input class="form-control" type="text" value="<?php echo $order['note']?>" readonly>
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
                    <i class="ni education_hat mr-2"></i><sub>Ngày đặt hàng: <?php echo $order['create_at']?></sub>
                    
                </div>
                <div class="card-body pt-0">
                    <form method="post">
                    <div class="row">
    <div class="col">
        <div class="table-responsive-sm"> <!-- Use table-responsive-sm for a responsive table -->
            <table class="table table-bordered table-sm w-auto mx-auto"> <!-- table-sm for smaller padding, w-auto for auto width, mx-auto to center -->
                <thead>
                    <tr>
                        <th class="text-center text-xs p-2">Tên sản phẩm</th>
                        <th class="text-center text-xs p-2">Số lượng</th>
                        <th class="text-center text-xs p-2">Sale(%)</th>
                        <th class="text-center text-xs p-2">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center text-xs p-2"><?php echo $order['product']; ?></td>
                        <td class="text-center text-xs p-2"><?php echo $order['qty']; ?></td>
                        <td class="text-center text-xs p-2"><?php echo $order['discount']; ?></td>
                        <td class="text-center text-xs p-2"><?php echo $order['price']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

                    </form>
                    <div class="text-center mt-2">
                        <div class="h6 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Thanh toán: <?php echo $order['total']?>vnd
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  }?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handling form submission for adding products
        $('#accept').click(function(e) {
            e.preventDefault();
            let idbill = $('#idbill').val();
            var formData = new FormData();
            // Append other form data
            formData.append('idbill', idbill);
            console.log(idbill);

            $.ajax({
                url: '../src/Admin/views/product/action.php?act=accept',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    let res = JSON.parse(response);
                    $('#results').html(
                        `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                    );
                    $('#results').fadeIn('slow', function() {
                        $('#results').delay(5000).fadeOut();
                    });
                    if (res.type == "success") {
                        window.location.href = '/store/quanly';
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('#cancel').click(function(e) {
            e.preventDefault();
            window.location.href = "/store/quanly/?p=product";
        });
    });
    </script>