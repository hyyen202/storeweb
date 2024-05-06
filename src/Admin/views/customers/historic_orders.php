<!-- End Navbar -->
<?php 
    $id = $_GET['i'];
    $historic_orders = historic_orders($db, $id);
    $i = 1;
    foreach($historic_orders as $customer){

    
?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Nhật ký mua hàng của <?php echo $customer['name']?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mã hóa đơn</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                       Tên sản phẩm</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Giá</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số lượng</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Discount</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tổng</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày đặt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class ="align-items-center">
                                        <p class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "><?php echo $i; ?></p>
                                    </td>
                                    <td>
                                        <a href= "?p=profile"class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $customer['id'] ?></h6>
                                            </div>
</a>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $customer['product'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['price'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['qty'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['discount'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['total'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($customer['create_at'])) ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>