<!-- End Navbar -->
<?php 
    $id = $_GET['i'];
    $historic_orders = historic_orders($db, $id);
    $i = 0;
    $rowOpen = false;
    foreach($historic_orders as $customer){
        if ($i % 2 == 0) {
            if ($rowOpen) {
                echo '</div>'; // Đóng hàng trước đó nếu có
            }
            echo '<div class="row">'; // Mở hàng mới
            $rowOpen = true;
        }
?>
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Khách hàng: <?php echo $customer['name'];?></h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">Mã hóa đơn: <?php echo $customer['id']; ?></h6>
                            <span class="mb-2 text-xs">Sản phẩm: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $customer['product']; ?></span></span>
                            <span class="mb-2 text-xs">Số lượng: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $customer['qty']; ?></span></span>
                            <span class="mb-2 text-xs">Tổng: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customer['total']; ?>vnd</span></span>
                            <span class="text-xs">Thời gian: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customer['create_at']; ?></span></span>
                        </div>
                        <div class="ms-auto text-end">
                        <?php if($customer['status'] == 0){
                            echo '<a class="btn btn-link text-danger text-gradient px-3 mb-0">Chưa nhận</a>';
                        }else{
                            echo '<a class="btn btn-link text-success text-gradient px-3 mb-0">Đã nhận</a>';
                        }
                        ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php
        $i++;
    }
    if ($rowOpen) {
        echo '</div>'; // Đóng hàng cuối cùng
    }
?>
<div id="pagination" class="text-center my-4"></div>
